<?php

$info = [
  'username' => 'root',
  'password' => 'root',
  'min' => 5000,
  'zarinpal' => "984b85a8-c228-11e8-af87-005056a205be",
];


function getInfo($infoName){
  global $info;

  if (isset($info[$infoName])){
    return $info[$infoName];
  }
}