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

    if(!isset($_POST['customer']) || !isset($_POST['pageno']) ){
        $response['error'] = true;
        $response['message'] = "Error! Required fields are missing!";
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

    $customer = (int)$_POST['customer'];
    $pageno = (int)$_POST['pageno'];
    if(isset($_POST['limit']))
    {
      $limit = (int)$_POST['limit'];
    }
    else {
      $limit = 15;
    }
    $message = new Message($dbcon);
    $result = $message->get_messages($customer,$storeno,$pageno,$limit);

    if($result->num_rows>0)
    {
      $i=0;
      $result_array = array();
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        if($i==0)
        {
          $seenslno = $row['slno'];
          $updateresult = $message->update_lastseen_store($storeno,$customer,$seenslno);
          $updatesenttostore = $message->update_senttostore_of_a_conversation($storeno,$customer,1);
        }
        $i++;
        $result_array[] = $row;
      }
      $response['error'] = false;
      $response['data'] = $result_array;
    }
    else {
      $response['error'] = true;
      $response['message'] = "No Message found!";
    }

    echo json_encode($response);
    $dbcon->close();
?>
