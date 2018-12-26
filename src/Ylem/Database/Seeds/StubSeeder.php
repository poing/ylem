<?php

namespace Ylem\Database\Seeds;

use Ylem\Models\Stub;
use Illuminate\Database\Seeder;
//use Faker\Generator as Faker;

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

        $faker = \Faker\Factory::create();
        for( $i = 0; $i<$number; $i++ ) {
            $root = Stub::create([
                'name' => $faker->company
            ]);
            $child = Stub::create([
                'name' => strtoupper($faker->jobTitle)
            ]);
            $child->makeChildOf($root);
            $this->people($child);
        }

    }

    private function unit($parent)
    {
        $faker = \Faker\Factory::create();

        $child = Stub::create(['name' => strtoupper($faker->jobTitle)]);
        if (rand(0, 10) > 5) {
            $child->makeLastChildOf($parent);
            //$this->people($child);
        } else {
            $child->makeSiblingOf($parent);
        }
        $this->people($child);
    }

    private function people($parent)
    {
        $faker = \Faker\Factory::create();
        $child = Stub::create(['name' => $faker->name]);
        $child->makeChildOf($parent);

        //$mail = Stub::create(['name' => $faker->email]);
        //$mail->makeChildOf($child);


        if (rand(0, 10) > 5)
        {
            $child = Stub::create(['name' => $faker->name]);
            $child->makeChildOf($parent);

            //$mail = Stub::create(['name' => $faker->email]);
            //$mail->makeChildOf($child);

            $this->people($parent);
        }
        if (rand(0, 10) > 5)
        {
            $this->unit($parent);
        }
    }
}
