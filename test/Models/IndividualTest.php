<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Individual;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Individual
 */
class IndividualTest extends AbstractTest
{

  /**
   * @covers Poing\Ylem\Models\Individual::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\Individual::test();
	$this->assertTrue(Individual::test());
  }

}
