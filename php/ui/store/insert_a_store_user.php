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

    if(!isset($_POST['userid']) || !isset($_POST['roleid'])){
        $response['error'] = true;
        $response['message'] = "Error! Required fields are missing!";
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


    $userid = strip_tags($_POST['userid']);
    $roleid = (int)$_POST['roleid'];


    if($roleid<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }
    else if($userid==NULL){
        $response['error'] = true;
        $response['message'] = "Contact No can not be empty!";
        echo json_encode($response);
        exit();
    }

    $store = new Store($dbcon);

    $checkUseridRes = $store->checkUseridExists($userid);

    if($checkUseridRes->num_rows>0){
        $userno = $checkUseridRes->fetch_array(MYSQLI_ASSOC)['userno'];

        $result = $store->insert_a_store_user($userno, $roleid, $storeno);

        if ($result) {
              $response['error'] = false;
              $response['message'] = "Brand user is inserted successfully!";
        }else{
              $response['error'] = true;
              $response['message'] = "Brand user insertion Failed!";
        }
    }
    else{
        $response['error'] = true;
        $response['message'] = "User does not exist!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
