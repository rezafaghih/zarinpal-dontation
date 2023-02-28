<?php
  if (!isset($_POST['submit-donate'])){
    header("Location: ../../");
    exit;
  }

  if(!isset($_SESSION)){
    session_start();
  }

    // include php files  
  include_once "./info.php";
  include_once "./account.php";


  //   insert all variable and objects
  $obj = new payment(getInfo("username"), getInfo("password"), getInfo("min"), getInfo('zarinpal'));

  $price= htmlspecialchars($_POST['input-price']);
  $name= htmlspecialchars($_POST['input-name']);
  $des= htmlspecialchars($_POST['input-des']);
  $email= htmlspecialchars($_POST['input-email']);


    // this function will check var and return false if variable is empty   
  function checkVar($var){
    if ($var == "" or empty($var)){
        return false;
    }else{
        return true;
    }
  }
  // this function can check price and makesure if price is not number or lower than min price
  function checkPrice($num){
    global $obj;
    if (preg_match("/^[0-9]+$/", $num) or $obj->get_min() > $num){
        return true;
    }else{
        return false;
    }
  }

  // start checking all variables
  if (checkVar($price) == false or checkVar($name) == false){
        header("Location: ../../?v=inf");
    exit;
  }
  if (checkVar($des)){
    $des_output = "";
  }else{
    $des_output = $des." توضیحات : ";
  }
  
  if (checkVar($email)){
    $mail_output = "NO EMAIL INSERTED";
  }else{
    $mail_output = $email;
  }
  
  if (checkPrice($price) == false){
    header("Location: ../../?v=price");
    exit;
  }

  if ($obj->checkZarinPal() == false){
    header("Location: ../../");
    exit;
  }
//   finish checking process


//   create description output format with name and text
  $format_des = "
    $name تراکنش توسط  

    $des_output
  ";
  
  $obj->set_tempInformation([$name, $format_des, $price, $email]);
  $price = $price."0";


    // send shaparak data from zarinpal api   
  $data = array("merchant_id" => $obj->get_zarinpal(),
      "amount" => $price,
      "callback_url" => "https://".$_SERVER['SERVER_NAME']."/paymen-generator/callback",
      "description" => $format_des,
      "metadata" => [ "email" => $mail_output,"mobile"=>"0912345678"],
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