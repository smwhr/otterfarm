<?php

namespace OtterFarm;


class Otter{

  private $sex = null;

  public function __construct($sex="m"){
    $this->sex = $sex;
  }

  public function getSexe(){
    return $this->sex;
  }
}