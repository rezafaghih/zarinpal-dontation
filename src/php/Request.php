<?php

  if(!isset($_SESSION)){
    session_start();
  }

  include_once "./info.php";
  include_once "./account.php";

  if (!isset($_POST['submit-donate'])){
    header("Location: ../");
    exit;
  }

  $price= htmlspecialchars($_POST['input-price']);
  $name= htmlspecialchars($_POST['input-name']);
  $des= htmlspecialchars($_POST['input-des']);

  

  $obj = new payment(getInfo("username"), getInfo("password"), getInfo("min"), getInfo('zarinpal'));


  if ($obj->get_min() < $price){

  }
  $data = array("merchant_id" => "984b85a8-c228-11e8-af87-005056a205be",
      "amount" => $price,
      "callback_url" => "https://".$_SERVER['SERVER_NAME']."/parscode.xyz/finish-payment",
      "description" => $format_des,
      "metadata" => [ "email" => $accountInfo['email'],"mobile"=>$accountInfo['phone']],
      );
  $jsonData = json_encode($data);
  $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
  curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($jsonData)
  ));

  $result = curl_exec($ch);
  $err = curl_error($ch);
  $result = json_decode($result, true, JSON_PRETTY_PRINT);
  curl_close($ch);



  if ($err) {
      echo "cURL Error #:" . $err;
  } else {
      if (empty($result['errors'])) {
          if ($result['data']['code'] == 100) {
              header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
          }
      } else {
          echo'Error Code: ' . $result['errors']['code'];
          echo'message: ' .  $result['errors']['message'];

      }
  }
?>