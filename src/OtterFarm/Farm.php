<?php

namespace OtterFarm;

class Farm{

  public $family;

  public function __construct($f = array()){
    $this->family = $f;
  }

  public function helloMessage(){
    return "Bonjour les loutrons";
  }

  public function getFamily(){
    return $this->family;
  }

  public function nbFamily(){
    return count($this->family);
  }

  public function reproduce($o1, $o2){
    if($o1->getSexe() == $o2->getSexe()){
      throw new \Exception("ONLR");
    }
    $kid = new Otter(rand(0,1)?"m":"f");
    $this->family[] = $kid;
    return $kid;
  }
}
