<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  // $storeno =  $_SESSION['storeno'];
?>

<?php
  $response = array();
  if($_SERVER['REQUEST_METHOD']!='POST'){
      $response['error'] = true;
      $response['message'] = "Invalid Request method";
      echo json_encode($response);
      exit();
  }

  if(!isset($_POST['storeno']) ){
      $response['error'] = true;
      $response['message'] = "Error! Required fields are missing!";
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

  $storeno = strip_tags($_POST['storeno']);
  // session_start();
  $_SESSION['storeno'] = $storeno;

  $response['error'] = false;
  echo json_encode($response);
?>
