<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
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
    require_once($base_path."/model/Store.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }


    if(!isset($_POST['storename'])){
        $storename = NULL;
    }else{
        $storename = strip_tags($_POST['storename']);
    }

    if(!isset($_POST['storecontact'])){
        $storecontact = NULL;
    }else{
        $storecontact = strip_tags($_POST['storecontact']);
    }

    if(!isset($_POST['street'])){
        $street = NULL;
    }else{
        $street = strip_tags($_POST['street']);
    }

    if(!isset($_POST['city'])){
        $city = NULL;
    }else{
        $city = strip_tags($_POST['city']);
    }

    if(!isset($_POST['openingtime'])){
        $openingtime = NULL;
    }else{
        $openingtime = strip_tags($_POST['openingtime']);
    }

    if(!isset($_POST['closingtime'])){
        $closingtime = NULL;
    }else{
        $closingtime = strip_tags($_POST['closingtime']);
    }

    if(!isset($_POST['weekend1'])){
        $weekend1 = NULL;
    }else{
        $weekend1 = strip_tags($_POST['weekend1']);
    }

    if(!isset($_POST['weekend2'])){
        $weekend2 = NULL;
    }else{
        $weekend2 = strip_tags($_POST['weekend2']);
    }

    if(!isset($_POST['statusno'])){
        $statusno = 0;
    }else{
        $statusno = (int)$_POST['statusno'];
    }

    if(!isset($_POST['homedelivaryrate'])){
        $homedelivaryrate = NULL;
    }else{
        $homedelivaryrate = strip_tags($_POST['homedelivaryrate']);
    }

    if(!isset($_POST['homedelivaryrange'])){
        $homedelivaryrange = NULL;
    }else{
        $homedelivaryrange = strip_tags($_POST['homedelivaryrange']);
    }

    if(!isset($_POST['postdelivary'])){
        $postdelivary = 0;
    }else{
        $postdelivary = (int)$_POST['postdelivary'];
    }


    $update = new Store($dbcon);

    $result = $update->updateAStoreInfo($storeno, $storename, $storecontact, $street, $city, $openingtime, $closingtime, $weekend1, $weekend2, $statusno, $homedelivaryrate, $postdelivary);

    if ($result == "N") {
         $response['error'] = true;
         $response['message'] = "Nothing to update!";

    }else{
         if($result == "true"){
             $response['error'] = false;
             $response['message'] = "Update successful!";
         }else{
             $response['error'] = false;
             $response['message'] = "Update failed!";
         }
    }

    echo json_encode($response);

    $dbcon->close();
?>
