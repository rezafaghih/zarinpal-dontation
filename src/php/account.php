<?php 

if (!isset($_SESSION)){
  session_start();
}


class payment {
  private $admin_username;
  private $admin_password;
  private $min_amount;
  private $zarinpal;

  public $temp_name;
  public $temp_price;
  public $temp_des;
  public $temp_email;

  function __construct($username, $password, $min, $zp)
  {
    $this->admin_username = $username;
    $this->admin_password = $password;
    $this->min_amount = $min;
    $this->zarinpal = $zp;
  }

  function set_admin($username, $password){
    $this->admin_username = $username;
    $this->admin_password = $password;
  }

  function set_tempInformation($data){
    $this->temp_name = $data[0];
    $this->temp_des = $data[1];
    $this->temp_price = $data[2];
    $this->temp_email = $data[3];

    // save infromation in php session
    $_SESSION['temp_name'] = $data[0];
    $_SESSION['temp_des'] = $data[1];
    $_SESSION['temp_price'] = $data[2];
    $_SESSION['temp_email'] = $data[3];
  }
  
  function get_tempInformation(){
    $this->temp_name = $_SESSION['temp_name'];
    $this->temp_des = $_SESSION['temp_des'];
    $this->temp_price = $_SESSION['temp_price'];
    $this->temp_email = $_SESSION['temp_email'];

   return [$this->temp_name, $this->temp_des, $this->temp_price, $this->temp_email];
  }

  function get_username(){
   return $this->admin_username ;
  }
  function get_min(){
    return $this->min_amount ;
   }

  function checkZarinPal(){
    if ($this->zarinpal == "" or empty($this->zarinpal)){
      return false;
    }else{
      return true;
    }
  }
  function get_zarinpal(){
    if ($this->checkZarinPal() == true){
      return $this->zarinpal; 
    }
   }
}