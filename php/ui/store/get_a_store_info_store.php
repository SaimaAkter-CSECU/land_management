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
    require_once($base_path."/model/Store.php");
    require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $select = new Store($dbcon);
    $utility = new Utility();

    $result = $select->getAStoreInfo($storeno);


    $storeInfoArray = array();

    if ($result->num_rows>0) {
          $response['error'] = false;
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              $imagename = $row['storeimage'];
              $row['storeimage'] = $utility->getStoreImageDirectory($imagename);
              $storeInfoArray[] = $row;
          }
          $response['store_info'] = $storeInfoArray;
    }else{
          $response['error'] = true;
          $response['message'] = "Null results!";
    }

	echo json_encode($response);

    $dbcon->close();
?>
