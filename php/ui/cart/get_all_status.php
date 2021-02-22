<?php
  $base_path = dirname(dirname(__FILE__));
  include_once($base_path."/user/checksession.php");

    $response = array();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
		exit();
	}

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/admin/db/Database.php");
    require_once($base_path."/model/Cstatus.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }


    $cstatus = new Cstatus($dbcon);
    $cstatus_result = $cstatus->get_all();
    
    if($cstatus_result->num_rows>0)
    {
      $cstatus_array = array();
      while ($cstatus_row = $cstatus_result->fetch_array(MYSQLI_ASSOC)) {
        $cstatus_array[] = $cstatus_row;
      }
      $response['cstatus'] = $cstatus_array;
    }

  else{
          $response['error'] = true;
          $response['message'] = "Null results!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
