<?php
namespace Ylem\Test\Models;

//use PHPUnit\Framework\TestCase;
use Poing\Ylem\Models\Organization;
use Orchestra\Testbench\TestCase;

/**
 * @coversDefaultClass Poing\Ylem\Models\Organization
 */
class OrganizationTest extends TestCase
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
