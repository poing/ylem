<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\PartyRelationship;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class PartyRelationshipTest extends AbstractTest
{

  /**
   * @covers Poing\Ylem\Models\PartyRelationship::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\PartyRelationship::test();
	$this->assertTrue(PartyRelationship::test());
  }

}
