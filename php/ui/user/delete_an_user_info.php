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

    if(!isset($_POST['user_id']) ){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $user_id = (int)$_POST['user_id'];

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

        $add_user_result = $login->deleteAnUser($user_id);

        if($add_user_result)
        {
          $response['error'] = false;
          $response['message'] = "User Deleted Successfully.!";
        }
        else {
          $response['error'] = true;
          $response['message'] = "User is not Deleted. Please try later!";
        }

	  echo json_encode($response);
    $dbcon->close();
?>
