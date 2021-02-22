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

    if(!isset($_POST['pageno'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Order.php");
    require_once($base_path."/model/Ostatus.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $pageno = (int)$_POST['pageno'];

    if($pageno<=0){
        $response['error'] = true;
        $response['message'] = "pageno must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    if(!isset($_POST['orderno']))
    {
      $orderno = -1;
    }
    else {
      $orderno = (int)$_POST['orderno'];
    }

    // if(!isset($_POST['userid'])){
    //     $userid = -1;
    // }else{
    //     $userid = (int)$_POST['userid'];
    // }

    // if(!isset($_POST['deliverydate'])){
    //     $deliverydate = 'null';
    // }else{
    //     $deliverydate = strip_tags($_POST['deliverydate']);
    // }

    if(!isset($_POST['limit'])){
        $limit = 10;
    }else{
        $limit = (int)$_POST['limit'];
        if($limit<=0){
            $response['error'] = true;
            $response['message'] = "Limit must be greater than zero!";
            echo json_encode($response);
            exit();
        }
    }


    $order = new Order($dbcon);
    $ostatus = new Ostatus($dbcon);

    $result = $order->get_filtered_orders_for_store($orderno,$pageno,$limit,$storeno);

    if($result->num_rows>0)
    {
      $response['error'] = false;
      $result_array = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $result_array[] = $row;
      }
      $response['data'] = $result_array;

      $status_result = $ostatus->get_all();
      if($status_result->num_rows>0)
      {
        $ostatus_result_array = array();
        while ($ostatus_row = $status_result->fetch_array(MYSQLI_ASSOC)) {
          $ostatus_result_array[] = $ostatus_row;
        }
        $response['status']=$ostatus_result_array;
      }
    }
    else {
      $response['error'] = true;
      $response['message'] = 'No data found';
    }

    echo json_encode($response);
    $dbcon->close();
    ?>
