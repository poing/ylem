<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\Individual;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\Individual
 */
class IndividualTest extends TestCase
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
