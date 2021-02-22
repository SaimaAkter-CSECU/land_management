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

    if(!isset($_POST['owner_name']) || !isset($_POST['owner_nid']) ){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $owner_name = strip_tags($_POST['owner_name']);
    $owner_father_name = strip_tags($_POST['owner_father_name']);
    $owner_mother_name = strip_tags($_POST['owner_mother_name']);
    $owner_spouse_name = strip_tags($_POST['owner_spouse_name']);
    $owner_email = strip_tags($_POST['owner_email']);
    $owner_contactno = strip_tags($_POST['owner_contactno']);
    $owner_birthdate = strip_tags($_POST['owner_birthdate']);
    $owner_present_address = strip_tags($_POST['owner_present_address']);
    $owner_permanent_address = strip_tags($_POST['owner_permanent_address']);
    $owner_nid = strip_tags($_POST['owner_nid']);

    $owner_gender = (int)$_POST['owner_gender'];
    $owner_religion = (int)$_POST['owner_religion'];
    $owner_present_division = (int)$_POST['owner_present_division'];
    $owner_permanent_division = (int)$_POST['owner_permanent_division'];
    $owner_present_district = (int)$_POST['owner_present_district'];
    $owner_permanent_district = (int)$_POST['owner_permanent_district'];
    $owner_present_thana = (int)$_POST['owner_present_thana'];
    $owner_permanent_thana = (int)$_POST['owner_permanent_thana'];


    $base_path = dirname(dirname(dirname(__FILE__)));
    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Land.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $land_owner = new Land($dbcon);

        $add_owner_result = $land_owner->insertALandOwnerInfo($owner_name, $owner_father_name, $owner_mother_name, $owner_spouse_name, $owner_birthdate, $owner_gender, $owner_religion, $owner_nid, $owner_contactno, $owner_email, $owner_present_division, $owner_present_district, $owner_present_thana, $owner_present_address, $owner_permanent_division, $owner_permanent_district, $owner_permanent_thana, $owner_permanent_address);

        if($add_owner_result)
        {
          $response['error'] = false;
          $response['message'] = "New Owner Inserted Successfully.!";
        }
        else {
          $response['error'] = true;
          $response['message'] = "New Owner is not Inserted. Please try later!";
        }

	  echo json_encode($response);
    $dbcon->close();
?>
