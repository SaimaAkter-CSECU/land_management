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

  if(!isset($_POST['catno'])){
      $response['error'] = true;
      $response['message'] = "Error! Required field is missing!";
      echo json_encode($response);
      exit();
  }


  $base_path = dirname(dirname(dirname(__FILE__)));

  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Slider.php");
  require_once($base_path."/utility/Utility.php");

  $db = new Database();
  $dbcon = $db->db_connect();

  if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
  }

  $catno = (int)$_POST['catno'];
  $slider = new Slider($dbcon);
  $result = $slider->getDisplayCategoryImages($storeno, $catno);

  if($result->num_rows > 0){
    $response['error'] = false;

    $result_array = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $result_array[] = $row;
    }
    $response['data'] = $result_array;
  }
  else{
    $response['error'] = true;
    $response['message'] = "No Data Found";
  }

  echo json_encode($response);
  $dbcon->close();
?>
