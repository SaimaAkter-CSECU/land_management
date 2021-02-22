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

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Product.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
    }


    $select = new Product($dbcon);

    $result = $select->getAllProducts();


    $storeProductArray = array();

    if ($result->num_rows>0) {
        $response['error'] = false;
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $storeProductArray[] = $row;
        }
        $response['productsnotinthestore'] = $storeProductArray;
    }else{
        $response['error'] = true;
        $response['message'] = "There are no products which are not in this store!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
