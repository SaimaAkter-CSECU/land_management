<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php
    // $storeno = 2;
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

    $result = $select->getStoreDisplayNo($storeno, $catno);
    if($result)
    {
        if($result->num_rows>0){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $storedisplayno = $row['storepagedisplayno'];

            $delete = $select->deleteAStoreProductFromDispaly($storedisplayno, $productno);
            if ($delete) {
                  $response['error'] = false;
                  $response['data'] = $storedisplayno;
                  $response['message'] = "Successfully Deleted";
            }
        }
        else{
            $response['data'] = $result;
            $response['error'] = true;
            $response['message'] = "Error! Not Deleted Try Again";
  
        }
    }
    else{
          $response['error'] = true;
          $response['message'] = "Error! Not Deleted";
    }

    echo json_encode($response);

    $dbcon->close();
?>
