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

    if(!isset($_POST['orderno'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Order.php");
    // require_once($base_path."/model/Orderdelivery.php");
    require_once($base_path."/model/Orderstatus.php");
    require_once($base_path."/model/Ostatus.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $orderno = (int)$_POST['orderno'];

    $order = new Order($dbcon);

    $order_result = $order->get_order_primary_info($storeno,$orderno);

    if($order_result->num_rows>0)
    {
      $order_row = $order_result->fetch_array(MYSQLI_ASSOC);

      $response['error'] = false;
      $response['order'] = $order_row;

      $order_detail = $order->get_order_details($orderno);
      if($order_detail->num_rows>0)
      {
        $order_detail_array = array();
        while ($order_detail_row = $order_detail->fetch_array(MYSQLI_ASSOC)) {
          $order_detail_array[] = $order_detail_row;
        }
        $response['orderdetail'] = $order_detail_array;
      }

      $order_delivery_details = $order->get_order_delivery_details($orderno);
      if($order_delivery_details->num_rows>0)
      {
        $order_delivery_details_row = $order_delivery_details->fetch_array(MYSQLI_ASSOC);
        $response['orderdeliverydetails'] = $order_delivery_details_row;
      }

      $order_delivery_rate = $order->get_order_delivery_rate($storeno);
      if($order_delivery_rate->num_rows>0)
      {
        $order_delivery_rate_row = $order_delivery_rate->fetch_array(MYSQLI_ASSOC);
        $response['orderdeliveryrate'] = $order_delivery_rate_row;
      }

      $order_status = new Orderstatus($dbcon);
      $order_status_result = $order_status->get_order_status($orderno);

      if($order_status_result->num_rows>0)
      {
        $order_status_array = array();
        while ($order_status_row=$order_status_result->fetch_array(MYSQLI_ASSOC)) {
          $order_status_array[] = $order_status_row;
        }
        $response['orderstatus'] = $order_status_array;
      }


      $ostatus = new Ostatus($dbcon);
      $ostatus_result = $ostatus->get_all();
      if($ostatus_result->num_rows>0)
      {
        $cstatus_array = array();
        while ($ostatus_row = $ostatus_result->fetch_array(MYSQLI_ASSOC)) {
          $ostatus_array[] = $ostatus_row;
        }
        $response['ostatus'] = $ostatus_array;
      }
    }
    else {
      $response['error'] = true;
      $response['message'] = "No data found!";
    }

    echo json_encode($response);
 ?>
