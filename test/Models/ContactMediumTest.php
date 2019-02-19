<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\ContactMedium;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\ContactMedium
 */
class ContactMediumTest extends AbstractTest
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
