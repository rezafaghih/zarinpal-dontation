<?php 

    include_once '../src/php/info.php';
    include_once '../src/php/account.php';

    if (!isset($_SESSION)){
      session_start();
    }
    //   insert all variable and objects
    $obj = new payment(getInfo("username"), getInfo("password"), getInfo("min"), getInfo('zarinpal'));

    $status = $_GET['Status'];

    if ($status == "OK"){
      $Condition = "موفق";
      $Condition_Icon = '<svg style = "color:green;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
    </svg>    
    ';
    }else{
      $Condition = "ناموفق";
      $Condition_Icon = '<svg style = "color:red;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    ';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>پایان تراکنش</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="../src/styles/global.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="../src/styles/style.css?v=<?php echo time();?>">
</head>
<body>
  <div class="container flex-row center">
    <div id="finish-payment-container" class = "flex-col center">
      <h1>پایان تراکنش</h1>

      <p class = "flex-row center">
        <span>پرداخت کننده</span>
        <span class = "flex-row center">
                      
        </span>
        <span><?php echo $obj->get_tempInformation()[0]?></span>
      </p>
      <p class = "flex-row center">
        <span>وضعیت</span>
        <span class = "flex-row center">
             <?php echo $Condition_Icon;?>
        </span>
        <span><?php echo $Condition;?></span>
      </p>
      <p class = "flex-row center">
        <span>مبلغ تراکنش</span>
        <span class = "flex-row center">
                      
        </span>
        <span><?php echo number_format($obj->get_tempInformation()[2])?></span>
      </p>
      <a href="../">
        بازگشت
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
</svg>

      </a>
    </div>  
  </div>
</body>
</html>