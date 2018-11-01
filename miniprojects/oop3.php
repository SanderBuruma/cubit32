<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Object Oriented 2</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
<pre>
<?php

interface StandardPaymentInterface{
  public function pay();
}
interface FraudCheckInterface{
  public function fraudCheck();
}
interface ThreeDSecureCheck{
  public function ThreeDSecureCheck();
}
interface PaymentProcessInterface{
  public function process();
}

class PayFee implements StandardPaymentInterface, PaymentProcessInterface, ThreeDSecureCheck{
  public function pay(){}
  public function ThreeDSecureCheck(){}
  public function process(){
    $this->pay();
  }
}
class WorldFee implements StandardPaymentInterface, PaymentProcessInterface{
  public function pay(){}
  public function process(){
    $this->pay();
  }
}
class MintFee implements StandardPaymentInterface, PaymentProcessInterface, FraudCheckInterface{
  public function pay(){}
  public function fraudCheck(){}
  public function process(){
    $this->fraudCheck();
    $this->pay();
  }
}

class PaymentGateway{
  public function takePayment(StandardPaymentInterface $paymentType){
    $paymentType->fraudCheck();
    $paymentType->pay();
  }
}

$paymentType = new Payfee();
$gateway = new PaymentGateway();
$gateway->takePayment($paymentType);

?>
</pre>
</body>
</html>