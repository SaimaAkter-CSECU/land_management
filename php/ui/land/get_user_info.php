<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
?>

<?php

  $response = array();
  $response['error'] = false;
  $response['data'] = array();
  $response['data']['name']=$_SESSION['name'];
  $response['data']['userno']=$_SESSION['userno'];
  $response['data']['email']=$_SESSION['email'];
  $response['data']['contactno']=$_SESSION['contactno'];
  $response['data']['user_role_id']=$_SESSION['user_role_id'];


  echo json_encode($response);
?>
