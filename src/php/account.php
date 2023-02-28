<?php 

class payment {
  private $admin_username;
  private $admin_password;
  private $min_amount;
  private $zarinpal;

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