<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\PartyRelationship;
use Poing\Ylem\Models\Individual;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class PartyRelationshipTest extends AbstractTest
{

    /**
     * @covers Poing\Ylem\Models\PartyRelationship::party()
     */
    public function testParty()
    {
        $person = factory(Individual::class)
            ->create();
        $person->party()->create();
        $data = PartyRelationship::first();

        //$this->assertStringEndsWith('individual/1', $data->href);
        $this->assertNotEmpty($data->party->id);
        //$this->assertTrue(true);

    }

  /**
   * @covers Poing\Ylem\Models\PartyRelationship::probe()
   */
  public function testPartyRelationshipClass()
  {
	$this->assertTrue(PartyRelationship::probe());
  }

}
