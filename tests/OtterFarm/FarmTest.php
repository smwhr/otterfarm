<?php
namespace OtterFarm\Tests;

use OtterFarm\Farm;

class FarmTest extends \PHPUnit_Framework_TestCase
{

  // public function testHelloMessage()
  // {
  //     $farm = new Farm();
  //     $result = $farm->helloMessage();
  //     $expectedMessage = "Bonjour les loutrons";

  //     $this->assertEquals($expectedMessage, $result);

  // }

  /**
   * @test
   */

  public function helloMessage(){
    $farm = new Farm();
    $result = $farm->helloMessage();
    $expectedMessage = "Bonjour les loutrons !";

    $this->assertEquals($expectedMessage, $result);
  }
}