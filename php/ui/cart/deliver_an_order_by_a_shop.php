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

    if(!isset($_POST['orderno']) ){
        $response['error'] = true;
        $response['message'] = "Required field missing!";
        echo json_encode($response);
		    exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Order.php");

    $orderno = (int)$_POST['orderno'];

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $order = new Order($dbcon);

    $statuscheck = $order->check_ongoing_status_of_an_order($orderno);
    if($statuscheck->num_rows>0)
    {
      $statusrow = $statuscheck->fetch_array(MYSQLI_ASSOC);
      $orderstatus = $statusrow['statusno'];
      if($orderstatus==4)
      {
        $orderupdate = $order->insert_order_status($orderno,5);

        if($orderupdate)
        {
          $response['error'] = false;
          $response['message'] = "Order is delivered.";

          $oInfoResult = $order->get_customerinfo_of_an_order($orderno);
          $oInfoRow = $oInfoResult->fetch_array(MYSQLI_ASSOC);
          $response['email'] = $oInfoRow['email'];
        }
        else {
          $response['error'] = true;
          $response['message'] = "53: Internal error. Please try later.";
        }
      }
      else {
        $response['error'] = true;
        $response['message'] = "58: You cannot deliver this order.";
      }
    }
    else {
      $response['error'] = true;
      $response['message'] = "63: Internal error. Please try later.";
    }

    echo json_encode($response);
    $dbcon->close();
  ?>
