<?php
use PHPUnit\Framework\TestCase;
use Poing\Ylem\Alpha\Overlord;

/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author yourname
*/

  /**
   * @coversDefaultClass Poing\Ylem\Alpha\Overlord
   */
class MyTestCase extends TestCase
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
