<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\PartyRelationship;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class PartyRelationshipTest extends TestCase
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
