<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Characteristic;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class CharacteristicTest extends AbstractTest
{

  /**
   * @covers Poing\Ylem\Models\Characteristic::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\Characteristic::test();
	$this->assertTrue(Characteristic::test());
  }

}
