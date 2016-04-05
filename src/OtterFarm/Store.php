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
            "AMT" => 123.00,
            "returnUrl" => "http://myotterfarm.com",
            "cancelUrl"  => "http://myotterfarm.com"
            );

      $post_var['L_PAYMENTREQUEST_0_NAME0']="Une Loutre";
      $post_var['L_PAYMENTREQUEST_0_DESC0']="Une loutre mignonne";
      $post_var['L_PAYMENTREQUEST_0_AMT0']=99.17;
      $post_var['L_PAYMENTREQUEST_0_QTY0']=1;
      $post_var['PAYMENTREQUEST_0_ITEMAMT']=99.17;
      $post_var['PAYMENTREQUEST_0_TAXAMT']=19.83;
      $post_var['PAYMENTREQUEST_0_SHIPPINGAMT']=4.00;
      $post_var['PAYMENTREQUEST_0_HANDLINGAMT']=0.00;
      $post_var['PAYMENTREQUEST_0_AMT']=123.00;
      $post_var['PAYMENTREQUEST_0_CURRENCYCODE']="EUR";
      $post_var['ALLOWNOTE']=1;

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

  function getPayment($tokenID, $payerID){
      /*
       USER=<callerID>
      &PWD=<callerPswd>
      &SIGNATURE=<callerSig>
      &METHOD=GetExpressCheckoutDetails
      &VERSION=78
      &TOKEN=<tokenValue>"

      >>>
       TOKEN=EC%2d4RX1920730957200V
      &PAYERID=6B9DKHQRKW4SG
      */
  }


  function capturePayment($payerID){
    /*
    USER=<callerID>
    &PWD=<callerPswd>
    &SIGNATURE=<callerSig>
    &METHOD=DoExpressCheckoutPayment
    &VERSION=78
    &TOKEN=<tokenValue>
    &PAYERID=<payerID>                      # customer's unique PayPal ID
    &PAYMENTREQUEST_0_PAYMENTACTION=SALE    # payment type
    &PAYMENTREQUEST_0_AMT=123.00             # transaction amount
    &PAYMENTREQUEST_0_CURRENCYCODE=EUR"     # transaction currency, e.g. US dollars
  */

  /*
  ACK=Success
  &VERSION=XX%2e000000
  &BUILD=1%2e0006
  &TOKEN=EC%2d1NK66318YB717835M
  &PAYMENTREQUEST_0_TRANSACTIONID=043144440L487742J
  */
  }
}