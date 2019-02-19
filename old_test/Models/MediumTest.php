<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Medium;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Medium
 */
class MediumTest extends AbstractTest
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
