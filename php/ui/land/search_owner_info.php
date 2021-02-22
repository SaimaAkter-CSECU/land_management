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

  if(!isset($_POST['nid'])  ){
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

  $nid = strip_tags($_POST['nid']);

  $select = new Land($dbcon);
  $result = $select->getOwnerInfo($nid);

  $ownerInfo = array();
  if($result->num_rows > 0){
    $response['error'] = false;
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $ownerInfo[] = $row;
      $owner_id = $row['owner_id'];

      $OwnerlandInfo = $select-> getOwnerLandInfo($owner_id);
      $landInfo = array();
      if($OwnerlandInfo->num_rows > 0){
        $response['error'] = false;
        while($row2 = $OwnerlandInfo->fetch_array(MYSQLI_ASSOC)){
          $landInfo[] = $row2;
        }
        $response['landInfo'] = $landInfo;
      }
       
      $landTransactionInfo = $select-> getOwnerTransactionInfo($nid);
      $ownerTransaction = array();
      if($landTransactionInfo->num_rows > 0){
        $response['error'] = false;
        while($row3 = $landTransactionInfo->fetch_array(MYSQLI_ASSOC)){
          $ownerTransaction[] = $row3;
        }
        $response['ownerTransaction'] = $ownerTransaction;
      }
    }
    $response['ownerInfo'] = $ownerInfo;
  }
  else{
    $response['error'] = true;
    $response['message'] = "No such Land Owner Information Found!";
  }

  echo json_encode($response);
  $dbcon->close();
?>
