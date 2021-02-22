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

     if(!isset($_POST['catno']) || !isset($_POST['displayno']) ){
         $response['error'] = true;
         $response['message'] = "Error! required data is missing!";
         echo json_encode($response);
 		    exit();
 	   }

    try{
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

        $catno = (int)$_POST['catno'];
        $displayno = (int)$_POST['displayno'];

    	  $select = new Display($dbcon);

        $result = $select->insertStoreDisplayCategoryToStore($storeno, $catno, $displayno);

      	if ($result) {
              $response['error'] = false;
              $response['message'] = "Display Category added successfully";
      	}else{
              $response['error'] = true;
              $response['message'] = "Internal Error! Data is not inserted";
        }

    }
    catch(Exception $e){
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }

	echo json_encode($response);

    $dbcon->close();
?>
