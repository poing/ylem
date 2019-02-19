<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\TimePeriod;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\TimePeriod
 */
class TimePeriodTest extends AbstractTest
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
