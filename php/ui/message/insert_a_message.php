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

    if(!isset($_POST['customer']) || !isset($_POST['msgdatetime']) || !isset($_POST['message'])){
        $response['error'] = true;
        $response['message'] = "Error! Required fields are missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Message.php");
    require_once($base_path."/model/Store.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
    }

    $customer = (int)$_POST['customer'];
    $msgdatetime = strip_tags($_POST['msgdatetime']);
    $message = strip_tags($_POST['message']);

    $messageob = new Message($dbcon);
    $result = $messageob->insert_a_message($message,$customer,$storeno,$msgdatetime);

    if($result!=-1)
    {
      $response['error'] = false;
      $response['message'] = "Message sent.";
      $updateresult = $messageob->update_lastseen_store($storeno,$customer,$result);
      $updatesenttocustomer = $messageob->update_senttocustomer_of_a_conversation($storeno,$customer,0);

      $store = new Store($dbcon);
      $store_info_result = $store->getAStoreInfo($storeno);
      if($store_info_result->num_rows>0)
      {
        $store_info_row = $store_info_result->fetch_array(MYSQLI_ASSOC);
        $response['storeno'] = $storeno;
        $response['storename'] = $store_info_row['name'];
        $response['storeimage'] = 'http://aamiribeta.agamilabs.com/assets/images/storeimages/'.$store_info_row['storeimage'];
      }

      $cInfoResult = $messageob->get_customerinfo($customer);
      $cInfoRow = $cInfoResult->fetch_array(MYSQLI_ASSOC);
      $response['userid'] = $cInfoRow['userid'];
    }
    else {
      $response['error'] = true;
      $response['message'] = "Message not sent. Try again.";
    }

    echo json_encode($response);
    $dbcon->close();
?>
