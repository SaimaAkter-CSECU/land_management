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

    if(!isset($_POST['userno']) || !isset($_POST['roleid'])){
        $response['error'] = true;
        $response['message'] = "Required fields are missing!";
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

    $userno = (int)$_POST['userno'];
    $roleid = (int)$_POST['roleid'];

    if($userno<=0 || $roleid<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    $update = new Store($dbcon);

    $result = $update->updateRoleOfAStoreUser($storeno, $userno, $roleid);

    if ($result) {
        $response['error'] = false;
        $response['message'] = "Brand user update successful!";
    }else{
        $response['error'] = false;
        $response['message'] = "Brand user update failed!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
