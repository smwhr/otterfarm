<?php

namespace OtterFarm;

class Store{

  public function __construct(){
    
    $this->url = "https://api-3t.sandbox.paypal.com/nvp";

    $this->email = "julienzamor-facilitator_api1.gmail.com";
    $this->password = "1370009121";
    $this->signature = "AsfDksnALQtfAi3TNnRo0-QTsFxvANeXM63Sg0BP955mX1XZAZlq0gKE";
  }

  public function requestPayment($amount){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$this->url);
    curl_setopt($ch, CURLOPT_POST, 1);

    $post_var = array(
            "METHOD"=>"SetExpressCheckout",
            "USER" => $this->email,
            "PWD" =>  $this->password,
            "SIGNATURE" => $this->signature,
            "VERSION" => 78,
            "AMT" => $amount,
            "returnUrl" => "http://myotterfarm.com",
            "cancelUrl"  => "http://myotterfarm.com"
            );

    curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query( $post_var ));
    
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);

    if(empty($server_output)){
      throw new \Exception(curl_error($ch));
    }

    curl_close ($ch);
    $response = array();
    parse_str($server_output, $response);
    return $response;
  }

  function getPaypalRedirectUrl($token){
    return "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=".$token;
  }
}