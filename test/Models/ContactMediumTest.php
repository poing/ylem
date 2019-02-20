<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\ContactMedium;
use Poing\Ylem\Models\Individual;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\ContactMedium
 */
class ContactMediumTest extends AbstractTest
{

    /**
     * @covers Poing\Ylem\Models\ContactMedium::contact()
     */
    public function testMedium()
    {
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

    }

  /**
   * @covers Poing\Ylem\Models\ContactMedium::probe()
   */
  public function testClass()
  {
	$this->assertTrue(ContactMedium::probe());
  }

}
