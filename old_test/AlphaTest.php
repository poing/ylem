<?php
namespace Ylem\Test;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Alpha\Overlord;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Alpha\Overlord
 */
class AlphaTest extends TestCase
{

  /**
   * @covers Poing\Ylem\Alpha\Overlord::baseline()
   */
  public function testOverlord()
  {
   // $test = \Poing\Ylem\Alpha\Overlord::baseline();
	$this->assertTrue(Overlord::baseline());
  }

}