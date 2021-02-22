<?php
  $base_path = dirname(dirname(__FILE__));
  include_once($base_path."/user/checksession.php");
?>

<?php

    $response = array();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
		exit();
	}

    if(!isset($_POST['oldpassword']) || !isset($_POST['newpassword'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }
    $oldpassword = strip_tags($_POST['oldpassword']);
    $new_password = strip_tags($_POST['newpassword']);
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

    $user_info_result = $login->get_a_user_password_by_userno($userno);

    if($user_info_result->num_rows!=1)
    {
      $response['error'] = true;
      $response['message'] = "Internal error. Please try later!";
    }else {
      $user_info_row = $user_info_result->fetch_array(MYSQLI_ASSOC);
      $existing_hash = $user_info_row['passphrase'];
      $vrify_old_pass = password_verify ( $oldpassword , $existing_hash );
      if(!$vrify_old_pass)
      {
        $response['error'] = true;
        $response['message'] = "Old password doesn't match!";
      }
      else {
        $update_pass_result = $login->update_password_of_admin($userno,password_hash($new_password,PASSWORD_DEFAULT));
        if($update_pass_result<=0)
        {
          $response['error'] = true;
          $response['message'] = "Password is not updated. Please try later!";
        }
        else {
          $response['error'] = false;
          $response['message'] = "Password is updated Successfully.!";
        }
      }
    }

	  echo json_encode($response);
    $dbcon->close();
?>
