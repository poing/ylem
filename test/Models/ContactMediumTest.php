<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\ContactMedium;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\ContactMedium
 */
class ContactMediumTest extends TestCase
{

  /**
   * @covers Poing\Ylem\Models\ContactMedium::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\ContactMedium::test();
	$this->assertTrue(ContactMedium::test());
  }

}
