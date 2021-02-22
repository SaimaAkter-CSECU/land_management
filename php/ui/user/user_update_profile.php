<?php
  $base_path = dirname(dirname(__FILE__));
  include_once($base_path."/user/checksession.php");
  $userno =  $_SESSION['userno'];
?>

<?php

    $response = array();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
		  exit();
	  }

    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['contactno']) || !isset($_POST['role']) || !isset($_POST['institute']) || !isset($_POST['designation'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $contactno = strip_tags($_POST['contactno']);
    $designation = strip_tags($_POST['designation']);
    $institute = strip_tags($_POST['institute']);
    $role = (int)$_POST['role'];

    $base_path = dirname(dirname(dirname(__FILE__)));
    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Login.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $login = new Login($dbcon);

        $update_profile_result = $login->update_profile_of_user($userno, $name, $email, $contactno, password_hash($password,PASSWORD_DEFAULT), $institute, $designation, $role);

        if($update_profile_result)
        {
          $response['error'] = false;
          $response['message'] = "Profile Information is updated Successfully.!";
        }
        else {
          $response['error'] = true;
          $response['message'] = "Profile is not updated. Please try later!";
        }

	  echo json_encode($response);
    $dbcon->close();
?>
