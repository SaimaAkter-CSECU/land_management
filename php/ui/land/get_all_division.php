<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  // include_once($base_path."/ui/user/checksession.php");
?>

<?php

  $response = array();
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    $response['error'] = true;
    $response['message'] = "Invalid Request Method";
    echo json_encode($response);
    exit();
  }

  $base_path = dirname(dirname(dirname(__FILE__)));
  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Land.php");

  $db = new Database();
  $dbcon = $db->db_connect();
  if(!$db->is_connected()){
    $response['error'] = true;
    $response['message'] = "Database is not connected.";
    echo json_encode($response);
    exit();
  }


  $select = new Land($dbcon);
  $result = $select->getAllDivision();

  if($result->num_rows > 0){
    
    $division = array();
    while($division_row = $result->fetch_array(MYSQLI_ASSOC)){
        $division[] = $division_row; 
    }
    $response['error'] = false;
    $response['division'] = $division;
  }
  else{
    $response['error'] = true;
    $response['message'] = "No such Land Information Found!";
  }

  echo json_encode($response);
  $dbcon->close();
?>
