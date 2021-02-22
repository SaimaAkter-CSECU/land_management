<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php

  $response = array();
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    $response['error'] = true;
    $response['message'] = 'Required field is missing.';
    echo json_encode($response);
    exit();
  }

  if(!isset($_POST['slno']) || !isset($_POST['typeno']) ){
    $response['error'] = true;
    $response['message'] = 'Error! Required field is missing.';
    echo json_encode($response);
    exit();
  }

  $base_path = dirname(dirname(dirname(__FILE__)));

  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Slider.php");

  $db = new Database();
  $dbcon = $db->db_connect();

  if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
  }
  $typeno  = (int)$_POST['typeno'];
  $slno = (int)$_POST['slno'];
  $slider = new Slider($dbcon);
  $result = $slider->deleteAnImageFromTypeSlider($storeno, $typeno, $slno);

  if($result){
    $response['error'] = false;
    $response['message'] = "Successfully deleted.";
  }
  else{
    $response['error'] = true;
    $response['message'] = "Couldn't Delete.";
  }

  echo json_encode($response);
  $dbcon->close();
?>
