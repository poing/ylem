<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Characteristic;
use Poing\Ylem\Models\Individual;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class CharacteristicTest extends AbstractTest
{

    /**
     * @covers Poing\Ylem\Models\Individual::trait()
     */
    public function testTrait()
    {
        $trait = factory(Characteristic::class)
            ->make();

        $person = factory(Individual::class)
            ->create();
        $person->trait()->updateOrCreate(
            ['name' => $trait->name,],
            $trait->toArray()
        );

        $data = Characteristic::first();

        $this->assertEquals(
            $person->nationality,
            $data->trait()->get()->first()->nationality
        );
    }

  /**
   * @covers Poing\Ylem\Models\Characteristic::probe()
   */
  public function testCharacteristicClass()
  {
	$this->assertTrue(Characteristic::probe());
  }

}
