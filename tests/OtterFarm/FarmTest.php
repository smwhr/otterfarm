<?php
namespace OtterFarm\Tests;

use OtterFarm\Farm;
use OtterFarm\Otter;

class FarmTest extends \PHPUnit_Framework_TestCase
{

  public function testHelloMessage()
    {
      $farm = new Farm();
      $result = $farm->helloMessage();
      $expectedMessage = "Bonjour les loutrons";
      
      $this->assertEquals($expectedMessage, $result);

    }

  /**
   * @test
   */
  public function familyIsArray(){
    $farm = new Farm();
    $result = $farm->getFamily();
    $this->assertInternalType('array', $result);
  }
  
  /**
   * @test
   */
  public function kidIsOtter(){
    $o1 = new Otter("m");
    $o2 = new Otter("f");
    $f = new Farm();

    $kid = $f->reproduce($o1, $o2);
    $this->assertInstanceOf('OtterFarm\Otter', $kid);

  }
  /**
   * @test
   * @expectedException        \Exception
   * @expectedExceptionMessage ONLR
   */
  public function unPapaUneMaman(){
    $o1 = new Otter("m");
    $o2 = new Otter("m");
    $f = new Farm();

    $this->setExpectedException('\Exception','ONLR');

    $kid = $f->reproduce($o1, $o2);
  }

  /**
   * @test
   */
  public function familyCountIncrease(){
    $o1 = new Otter("m");
    $o2 = new Otter("f");
    $farm = new Farm([$o1, $o2]);
    $farm->reproduce($o1,$o2);
    $this->assertCount(3,$farm->family);
  }

  /**
   * @test
   */
  public function failToutLeTemps(){
      //$this->fail("Normal");
  }

  public function provideFamilies(){
    return array(
      [array()],
      [array(new Otter("f"), new Otter("f"), new Otter("f"))],
      [array(new Otter("f"), new Otter("f"), new Otter("m"))]
      );
  }

  /**
   * @test
   * @dataProvider provideFamilies
   */
  public function toutLeMondeEstLa($liste){

      $f = new Farm($liste);
      $this->assertEquals(count($liste),$f->nbFamily() );

  }

  public function provideCouples(){
    return [
        [new Otter("f"), new Otter("m")],
        [new Otter("f"), new Otter("f")],
        [new Otter("m"), new Otter("m")],
        [new Otter("m"), new Otter("f")]
    ];
  }

  /**
   * @test
   * @dataProvider provideCouples
   */
  public function testRepro2($o1, $o2){
    //do something to test all possible couples
  }

}