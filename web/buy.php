<?php

/*
curl https://api-3t.sandbox.paypal.com/nvp 
     -X POST 
     --data "METHOD=SetExpressCheckout
            &USER=paypal_api1.bluetens.fr
            &PWD=1405517943
            &SIGNATURE=AFcWxV21C7fd0v3bYYYRCpSSRl31AruWWYVo2EdUK4qwhWfeNyYzIdtu
            &VERSION=78
            &AMT=10
            &returnUrl=http://miou.com
            &cancelUrl=http://miou.com"

>>>
 TOKEN=EC%2d6AF35934HN945913W
&TIMESTAMP=2014%2d11%2d06T11%3a08%3a18Z
&CORRELATIONID=7e3b8314dd442
&ACK=Success
&VERSION=78
&BUILD=13630372


https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=


curl -s --insecure https://api-3t.sandbox.paypal.com/nvp -d 
"USER=<callerID>
&PWD=<callerPswd>
&SIGNATURE=<callerSig>
&METHOD=GetExpressCheckoutDetails
&VERSION=93
&TOKEN=<tokenValue>"

>>>
 TOKEN=EC%2d4RX1920730957200V
&PAYERID=6B9DKHQRKW4SG


curl -s --insecure https://api-3t.sandbox.paypal.com/nvp -d 
"USER=<callerID>
&PWD=<callerPswd>
&SIGNATURE=<callerSig>
&METHOD=DoExpressCheckoutPayment
&VERSION=93
&TOKEN=<tokenValue>
&PAYERID=<payerID>                      # customer's unique PayPal ID
&PAYMENTREQUEST_0_PAYMENTACTION=SALE    # payment type
&PAYMENTREQUEST_0_AMT=19.95             # transaction amount
&PAYMENTREQUEST_0_CURRENCYCODE=USD"     # transaction currency, e.g. US dollars

>>
ACK=Success
&VERSION=XX%2e000000
&BUILD=1%2e0006
&TOKEN=EC%2d1NK66318YB717835M
&PAYMENTREQUEST_0_TRANSACTIONID=043144440L487742J
*/