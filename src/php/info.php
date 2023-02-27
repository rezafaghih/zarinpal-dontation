<?php

$info = [
  'username' => 'root',
  'password' => 'root',
  'min' => 5000,
  'zarinpal' => "",
];


function getInfo($infoName){
  global $infoName;

  if (isset($info[$infoName])){
    return $info[$infoName];
  }
}