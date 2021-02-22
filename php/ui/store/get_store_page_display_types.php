<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php
    $response = array();
    // $storeno = 2;
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
		    exit();
	  }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Display.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    if($storeno<=0){
        $response['error'] = true;
        $response['message'] = "Storeno must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    $display = new Display($dbcon);
    $result = $display->getStoreDisplayTypes($storeno);

    $storeDisplayTypesArray = array();

    if ($result->num_rows>0) {
          $response['error'] = false;
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              $storeDisplayTypesArray[] = $row;
          }
          $response['storedisplaytypes'] = $storeDisplayTypesArray;
    }else{
          $response['error'] = true;
          $response['message'] = "No store page display types!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
