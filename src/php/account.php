<?php 

class payment {
  private $admin_username;
  private $admin_password;
  private $min_amount;


  function __construct($username, $password, $min)
  {
    $this->admin_username = $username;
    $this->admin_password = $password;
    $this->min_amount = $min;
  }

  function set_admin($username, $password){
    $this->admin_username = $username;
    $this->admin_password = $password;
  }

  function get_username(){
   return $this->admin_username ;
  }
}