<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\ContactMedium;
use Poing\Ylem\Models\Medium;
use Poing\Ylem\Models\Individual;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Medium
 */
class MediumTest extends AbstractTest
{

    /**
     * @covers Poing\Ylem\Models\ContactMedium::contact()
     */
/*    public function testMedium()
    {

        $status = ContactMedium::all();
        $this->assertTrue($status->isEmpty());


        $type = 'email';
        $person = factory(Individual::class)
            ->create();
        $data = $person->contactMedium()->create([
            'preferred' => true,
            'type' => $type,
        ]);

        $data = ContactMedium::first();

        $this->assertEquals(
            $person->nationality,
            $data->contact()->get()->first()->nationality
        );

        //$this->assertStringEndsWith('individual/1', $data->href);
        //$this->assertNotEmpty($data->party->id);
        $this->assertTrue(true);

    }*/

  /**
   * @covers Poing\Ylem\Models\Medium::probe()
   */
  public function testClass()
  {
	$this->assertTrue(Medium::probe());
  }

}
