<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\TimePeriod;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\TimePeriod
 */
class TimePeriodTest extends TestCase
{

  /**
   * @covers Poing\Ylem\Models\TimePeriod::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\TimePeriod::test();
	$this->assertTrue(TimePeriod::test());
  }

}
