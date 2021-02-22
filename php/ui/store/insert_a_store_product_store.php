<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php

    // From session
    // $storeno = 2;

    $response = array();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
		    exit();
	  }

    if(!isset($_POST['productno']) || !isset($_POST['rate'])  ||!isset($_POST['imageurl'])){
        $response['error'] = true;
        $response['message'] = "Error! Required fields are missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Store.php");
    require_once($base_path."/utility/Utility.php");


    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }


    $productno = (int)$_POST['productno'];
    $rate = strip_tags($_POST['rate']);
    $drate = (double)$_POST['productdrate'];


    $storeProductImage = strip_tags($_POST['imageurl']);


    if($rate==NULL || $storeProductImage==NULL){
        $response['error'] = true;
        $response['message'] = "Field can't be empty!";
        echo json_encode($response);
        exit();
    }else if($productno<=0 || $rate<=0.0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    $utility = new Utility();

    $randomnumber = $utility->generateRandomString(10);
    $storeProductImageName = $storeno."_".$productno."_".$randomnumber.".jpg";

    $path = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/assets/images/product/".$storeProductImageName;
    $successStatus = $utility->saveImageToServer($path, $storeProductImage);

    if($successStatus === FALSE){
        $response['error'] = true;
        $response['message'] = "Image insertion failed!";
        echo json_encode($response);
        exit();
    }

    $insert = new Store($dbcon);

    $result = $insert->insert_a_store_product($productno, $rate, $storeno, $storeProductImageName);

    if ($result) {
      $response['error'] = false;
      $response['message'] = "Store product is inserted successfully!";
      if($drate>0.0)
      {
        $insert->insert_store_product_discount($storeno,$productno,$drate);
      }
    }
    else{
      $response['error'] = true;
      $response['data'] = $result; 
      $response['message'] = "Store product insertion failed!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
