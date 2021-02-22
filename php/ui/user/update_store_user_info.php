<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  // $storeno =  $_SESSION['storeno'];
?>

<?php
  $response = array();
  if($_SERVER['REQUEST_METHOD'] != "POST"){
    $response['error'] = true;
    $response['message'] = "Invalid Request";
    echo json_encode($response);
    exit();
  }

  $base_path = dirname(dirname(dirname(__FILE__)));
  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Store.php");

  $db = new Database();
  $dbcon = $db->db_connect();
  if(!$db->is_connected()){
    $response['error'] = true;
    $response['message'] = "Error! Database is not connected!";
    echo json_encode($response);
    exit();
  }
  $store = new Store($dbcon);

  if(!isset($_POST['ufirstname'])){
    $ufirstname = NULL;
  }else{
    $ufirstname = strip_tags($_POST['ufirstname']);
    if(empty($ufirstname)){
      $ufirstname = NULL;
    }
  }

  if(!isset($_POST['ulastname'])){
    $ulastname = NULL;
  }else{
    $ulastname = strip_tags($_POST['ulastname']);
    if(empty($ulastname)){
      $ulastname = NULL;
    }
  }

  if(!isset($_POST['email'])){
    $email = NULL;
  }else{
    $email = strip_tags($_POST['email']);
    if(empty($email)){
      $email = NULL;
    }
  }

  // if(!isset($_POST['contactno'])){
  //   $contactno = NULL;
  // }else{
  //   $contactno = strip_tags($_POST['contactno']);
  //   if(empty($contactno)){
  //     $contactno = NULL;
  //   }
  // }

  $updateresult = $store->updateUserInfo($ufirstname,$ulastname,$email, $userno);

  if($updateresult){
    $response['error'] = false;
    $response['message'] = "User Information Successfully Updated.";
  }
  else{
    $response['error'] = true;
    $response['message'] = "Failed to Update User Information.";
  }

  echo json_encode($response);
  $dbcon->close();
?>
