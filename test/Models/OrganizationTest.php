<?php
namespace Ylem\Test\Models;

use Poing\Ylem\Models\Organization;
use Ylem\Test\Models\AbstractTest;

/**
 * @coversDefaultClass Poing\Ylem\Models\Organization
 */
class OrganizationTest extends AbstractTest
{

  /**
   * @covers Poing\Ylem\Models\Organization::test()
   */
  public function testClass()
  {
   // $test = \Poing\Ylem\Alpha\Organization::test();
	$this->assertTrue(Organization::test());
  }

}
