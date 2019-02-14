<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\Medium;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\Medium
 */
class MediumTest extends TestCase
{

  /**
   * @covers Poing\Ylem\Models\Medium::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\Medium::test();
	$this->assertTrue(Medium::test());
  }

}
