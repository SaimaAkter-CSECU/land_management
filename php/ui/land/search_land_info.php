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

  if(!isset($_POST['div']) || !isset($_POST['dist']) || !isset($_POST['thana']) || !isset($_POST['sheet']) || !isset($_POST['mouza']) || !isset($_POST['daag']) ){
    $response['error'] = true;
    $response['message'] = "Error! Required field is missing!";
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

  $div = (int)$_POST['div'];
  $dist = (int)$_POST['dist'];
  $thana = (int)$_POST['thana'];
  $sheet = strip_tags($_POST['sheet']);
  $mouza = strip_tags($_POST['mouza']);
  $daag = strip_tags($_POST['daag']);

  $select = new Land($dbcon);
  $result = $select->getlandInfo($div, $dist, $thana, $sheet, $mouza, $daag);

  $landInfo = array();
  if($result->num_rows > 0){
    $response['error'] = false;
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $landInfo[] = $row;
      $land_id = $row['land_id'];

      $landOwnerInfo = $select-> getLandOwnerInfo($land_id);
      $landOwner = array();
      if($landOwnerInfo->num_rows > 0){
        $response['error'] = false;
        while($row2 = $landOwnerInfo->fetch_array(MYSQLI_ASSOC)){
          $landOwner[] = $row2;
        }
        $response['landOwner'] = $landOwner;
      }
       
      $landTransactionInfo = $select-> getLandTransactionInfo($land_id);
      $landTransaction = array();
      if($landTransactionInfo->num_rows > 0){
        $response['error'] = false;
        while($row3 = $landTransactionInfo->fetch_array(MYSQLI_ASSOC)){
          $landTransaction[] = $row3;
        }
        $response['landTransaction'] = $landTransaction;
      }
    }
    $response['landInfo'] = $landInfo;
  }
  else{
    $response['error'] = true;
    $response['message'] = "No such Land Information Found!";
  }

  echo json_encode($response);
  $dbcon->close();
?>
