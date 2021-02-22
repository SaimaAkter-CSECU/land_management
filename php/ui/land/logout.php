<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
      session_unset();
      session_destroy();
  }else{
  session_unset();
  session_destroy();
  }

  $host = $_SERVER['HTTP_HOST'];
  $path = $host."/store/index.php";
  header('Location: '.'http://'. $path);
  exit();
?>
