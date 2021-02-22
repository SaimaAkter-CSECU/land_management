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

    $user_result = $login->getAllUser();
    $userList = array();
    if($user_result->num_rows > 0){
      $response['error'] = false;
      while($row = $user_result->fetch_array(MYSQLI_ASSOC)){
        $userlist[] = $row;
      }
      $response['userList'] = $userlist;
    }
    else{
      $response['error'] = true;
      $response['message'] = "Null results!";
    }

	  echo json_encode($response);
    $dbcon->close();
?>
