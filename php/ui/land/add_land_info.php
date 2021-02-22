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
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $div = (int)$_POST['div'];
    $dist = (int)$_POST['dist'];
    $thana = (int)$_POST['thana'];
    $sheet = strip_tags($_POST['sheet']);
    $mouza = strip_tags($_POST['mouza']);
    $daag = strip_tags($_POST['daag']);
    $total_land_area = strip_tags($_POST['total_land_area']);
    $land_type = strip_tags($_POST['land_type']);

    $select = new Land($dbcon);

    $result1 = $select->insertALandInfo($div, $dist, $thana, $sheet, $mouza, $daag, $total_land_area, $land_type);
    if($result1){
        $response['error'] = false;
        // response['data'] = $result1 ; 
        $response['message'] = "Land Info Added Successfully";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Insertion failed";
    }

    echo json_encode($response);

    $dbcon->close();
?>
