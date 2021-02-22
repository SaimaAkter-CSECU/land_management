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

    if(!isset($_POST['catno']) || !isset($_POST['productno']) ){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
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

    $catno = (int)$_POST['catno'];
    $productno = (int)$_POST['productno'];

    if($catno<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    $select = new Store($dbcon);

    $result1 = $select->getStoreDisplayNo($storeno, $catno);
    if($result1->num_rows>0){
        $row = $result1->fetch_array(MYSQLI_ASSOC);
        $storepagedisplayno = $row['storepagedisplayno'];

        $result2 = $select->insertStoreProductsToDispaly($storepagedisplayno, $productno);
        if ($result2) {
              $response['error'] = false;
              $response['message'] = "Display Product Added Successfully";
        }else{
              $response['error'] = true;
              $response['message'] = "Insertion failed";
        }
    }
    else{
        $response['error'] = true;
        $response['message'] = "No Display Category Found";
    }

    echo json_encode($response);

    $dbcon->close();
?>
