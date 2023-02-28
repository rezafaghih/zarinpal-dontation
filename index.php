<?php 
  include_once "src/php/account.php";
  include_once "src/php/info.php";

  $obj = new payment(getInfo("username"), getInfo("password"), getInfo("min"), getInfo('zarinpal'));

    
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>درگاه پرداخت رضافقیه</title>
  <link rel="stylesheet" href="src/styles/style.css">
  <link rel="stylesheet" href="src/styles/global.css">
</head>
<body>
    <div class="container flex-row center">
      <?php   if ($obj->checkZarinPal() == true){?>
        <form action="src/php/Request.php" method="POST">
        <div class="payment-container flex-col center">
        <h1>درگاه پرداخت همراز مشاور</h1>
        <div class="input-box flex-row center wrap" >
          <label for="">
            نام حامی
          </label>
          <input type="text" name="input-name" id="" placeholder="نام خود را وارد کنید">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
          </svg>
          
        </div>
        <div class="input-box flex-row center wrap" >
          <label for="">
            مبلغ حمایت (به تومان)
          </label>
          <input type="text" name="input-price" id="" placeholder="(حداقل 5 هزار تومان)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          
          
        </div>
        <div class="input-box flex-row center wrap" >
          <label for="">
            ایمیل
          </label>
          <input type="text" name="input-email" id="" placeholder="(حداقل 5 هزار تومان)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          
          
        </div>
        <div class="input-box flex-row center wrap" >
          <label for="">
            توضیحات حمایت
          </label>
          <textarea name="input-des" id="" cols="30" rows="10"></textarea>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg> 
        </div>
        <button name = "submit-donate">پرداخت</button>
      </div>
        </form>
     

      <?php }?>
    </div>
</body>
</html>