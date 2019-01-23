<?php

use Illuminate\Database\Seeder;
use Poing\Ylem\Organization as Organization;
use Poing\Ylem\Individual as Individual;

class StubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->company(10);
    }

    private function company($number)
    {

        $this->command->info('Creating random tree data.');
        $this->command->info('This may take a while...');

        for( $i = 1; $i<=$number; $i++ ) {
            $this->command->info('Generating set ' . $i . ' of ' . $number);
            /*
            $org = Organization::create([
                'tradingName' => $faker->company,
                'nameType' => 'Co., Ltd',
                'type' => 'Company',
                'isLegalEntity' => true,
            ]);
            */
            $org = factory(Ylem\Organization::class)->states('org')->create();
            $org->existsDuring()->create(['startDate' => $org->created_at,]);
            $this->trait($org);
            $parent = $org->party()->create();
        //$org->contactMedium()->create();
        $this->contact($org);
            /*
            $unit = Organization::create([
                'tradingName' => strtoupper($faker->jobTitle),
                'type' => 'Unit',
                'isLegalEntity' => false,
            ]);
            */


            $unit = factory(Ylem\Organization::class)->states('unit')->create();
            $this->trait($unit);
            $child = $unit->party()->create();
        //$unit->contactMedium()->create();
        $this->contact($unit);


            $child->makeChildOf($parent);
            $this->individual($parent, false);
            $this->individual($child);

        }

        // Create a few users as root
        for( $i = 1; $i<=rand(1,$number); $i++ ) {
            $person = factory(Ylem\Individual::class)->create();
            $person->party()->create();
        }

    }

    private function trait($parent)
    {
        $number = rand(0,3);
        for( $i = 0; $i<=$number; $i++ ) {

            $trait = factory(Ylem\Characteristic::class)->make();
            $parent->trait()->updateOrCreate(
                ['name' => $trait->name,],
                $trait->toArray()
            );

        }

    }

    private function contact($parent) {

        $this->contact_items($parent, 'phone');
        $this->contact_items($parent, 'email');
        $this->contact_items($parent, 'postal');

    }

    private function contact_items($parent, $type) {

        $number = rand(1,5);
        $default = true;
        for( $i = 0; $i<=$number; $i++ ) {

            $factory = factory(Ylem\Medium::class)->states($type)->make();

            $data = $parent->contactMedium()->create([
                'preferred' => $default,
                'type' => $type,
            ]);
            $data->medium()->create($factory->toArray());
            $default = false;
        }

    }


    private function unit($parent)
    {

        $unit = factory(Ylem\Organization::class)->states('unit')->create();
        $this->trait($unit);
        $child = $unit->party()->create();
    //$unit->contactMedium()->create();
    $this->contact($unit);


        // Make child or sibling
        if (rand(1, 10) > 5) {
            $child->makeLastChildOf($parent);
            //$this->people($child);
        } else {
            $child->makeSiblingOf($parent);
        }

        // Add at least one individual to child
        $this->individual($child);


    }

    private function individual($parent, $skip = true)
    {
        // Add at least one individual to parent
        $person = factory(Ylem\Individual::class)->create();
        $this->trait($person);

        //$person = Individual::create(['name' => $faker->name]);
        $child = $person->party()->create();
    //$person->contactMedium()->create();
    $this->contact($person);

        $child->makeChildOf($parent);



        // Add a random number of individuals to parent
        if (rand(0, 10) > 5) // 3~5
        {
            $this->individual($parent, $skip);
        }
        if ($skip) {
            // Randomly add another unit
            if (rand(0, 10) > 5) // 4~5
            {
                $this->unit($parent);
            }
        }
    }


}


