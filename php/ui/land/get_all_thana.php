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
  $result = $select->getAllThana();

  if($result->num_rows > 0){
    $thana = array();
    while($thana_row = $result->fetch_array(MYSQLI_ASSOC)){
        $thana[] = $thana_row; 
    }
    $response['error'] = false;
    $response['thana'] = $thana;
  }
  else{
    $response['error'] = true;
    $response['message'] = "No such Land Information Found!";
  }

  echo json_encode($response);
  $dbcon->close();
?>
