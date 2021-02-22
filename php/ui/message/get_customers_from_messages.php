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
    require_once($base_path."/model/Message.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
    }


    $message = new Message($dbcon);
    $result = $message->get_customer_from_messages($storeno);

    if($result->num_rows>0)
    {
      $result_array = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $result_array[] = $row;
      }

      $unseen_array = array();
      $unseen_result = $message->get_total_unseen_message_counts_between_store_and_customer($storeno);
      if($unseen_result->num_rows>0)
      {
        while ($row=$unseen_result->fetch_array(MYSQLI_ASSOC)) {
          $unseen_array[] = $row;
        }

        $response['unseen_message_count'] = $unseen_array;
      }

      $response['error'] = false;
      $response['data'] = $result_array;

    }
    else {
      $response['error'] = true;
      $response['message'] = "No Customer found!";
    }

    echo json_encode($response);
    $dbcon->close();
?>
