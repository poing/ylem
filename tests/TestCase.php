<?php
use PHPUnit\Framework\TestCase;
//use \Poing\Ylem\Test\Stub;

/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author yourname
*/

  /**
   * @coversDefaultClass Poing\Ylem\Test\Stub
   */
class MyTestCase extends TestCase
{

  /**
   * @covers Poing\Ylem\Test\Stub::baseline()
   */
  public function testStub()
  {
   // $test = \Poing\Ylem\Test\Stub::baseline();
	$this->assertTrue(Poing\Ylem\Tests\Stub::baseline());
  }

}
