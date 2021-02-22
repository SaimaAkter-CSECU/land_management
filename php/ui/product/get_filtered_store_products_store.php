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

    if(!isset($_POST['pageno'])){
        $response['error'] = true;
        $response['message'] = "Error! Required fields are missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Product.php");
    require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $pageno = (int)$_POST['pageno'];

    if($pageno<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    if(!isset($_POST['productname'])){
        $productname = NULL;
    }else{
        $productname = strip_tags($_POST['productname']);
    }

    if(!isset($_POST['limit'])){
        $limit = 10;
    }else{
        $limit = (int)$_POST['limit'];
        if($limit<=0){
            $response['error'] = true;
            $response['message'] = "Limit must be greater than zero!";
            echo json_encode($response);
            exit();
        }
    }

    $select = new Product($dbcon);
    $utility = new Utility();

    $result = $select->get_filtered_store_products($pageno, $productname, $storeno, $limit);

    $filteredStoreProductsArray = array();

    if ($result->num_rows>0) {
          $response['error'] = false;

          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              $imageName = $row['imageurl'];
              $row['imageurl'] = $utility->getImageDirectory($imageName);
              $filteredStoreProductsArray[] = $row;
          }
          $response['filtered_store_products_store'] = $filteredStoreProductsArray;
    }else{
          $response['error'] = true;
          $response['message'] = "Null results!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
