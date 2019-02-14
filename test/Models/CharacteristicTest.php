<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\Characteristic;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\Characteristic
 */
class CharacteristicTest extends TestCase
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
