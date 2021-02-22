<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['userno']) || !isset($_SESSION['usertype'])){
  exit();
}else{
  if(strcmp($_SESSION['usertype'], "storeadmin") != 0){
    exit();
  }
}

$userno = $_SESSION['userno'];

?>
