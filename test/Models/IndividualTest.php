<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Individual;
use Poing\Ylem\Models\Characteristic;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Individual
 */
class IndividualTest extends AbstractTest
{

    /**
     * @covers Poing\Ylem\Models\Individual::getnameAttribute()
     */
    public function testGetNameAttribute()
    {

        $status = Individual::all();
        $this->assertTrue($status->isEmpty());

        $person = factory(Individual::class)
            ->create();
        $data = Individual::first();

        $this->assertNotEmpty($data->getnameAttribute());
    }

    /**
     * @covers Poing\Ylem\Models\Individual::gethrefAttribute()
     */
    public function testGetHrefAttribute()
    {
        $status = Individual::all();
        $this->assertTrue($status->isEmpty());

        $person = factory(Individual::class)
            ->create();
        $data = Individual::first();

        $this->assertStringEndsWith('individual/1', $data->href);
        $this->assertNotEmpty($data->gethrefAttribute());
    }

    /**
     * @covers Poing\Ylem\Models\Individual::party()
     */
    public function testParty()
    {
        $status = Individual::all();
        $this->assertTrue($status->isEmpty());

        $person = factory(Individual::class)
            ->create();
        $person->party()->create();
        $data = Individual::first();

        //$this->assertStringEndsWith('individual/1', $data->href);
        $this->assertNotEmpty($data->party->id);
        $this->assertTrue(true);

    }

    /**
     * @covers Poing\Ylem\Models\Individual::trait()
     */
    public function testTrait()
    {

        $status = Individual::all();
        $this->assertTrue($status->isEmpty());

        $trait = factory(Characteristic::class)
            ->make();

        $person = factory(Individual::class)
            ->create();
        $person->trait()->updateOrCreate(
            ['name' => $trait->name,],
            $trait->toArray()
        );

        $data = Individual::first();

        $this->assertEquals($trait->name, $data->trait()->get()->first()->name);
        $this->assertEquals(
            $trait->value,
            $data->trait()->get()->first()->value
        );

    }

    /**
     * @covers Poing\Ylem\Models\Individual::contactMedium()
     */
    public function testContactMedium()
    {

        $status = Individual::all();
        $this->assertTrue($status->isEmpty());

        $type = 'email';
        $person = factory(Individual::class)
            ->create();
        $data = $person->contactMedium()->create([
            'preferred' => true,
            'type' => $type,
        ]);

        $data = Individual::first();

        $this->assertEquals(
            $type,
            $data->contactMedium()->get()->first()->type
        );

        //$this->assertStringEndsWith('individual/1', $data->href);
        //$this->assertNotEmpty($data->party->id);
        $this->assertTrue(true);

    }

  /**
   * @covers Poing\Ylem\Models\Individual::probe()
   */
  public function testIndividualClass()
  {
	$this->assertTrue(Individual::probe());
  }

}
