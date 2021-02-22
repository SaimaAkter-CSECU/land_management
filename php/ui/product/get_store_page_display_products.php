<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php
    // $storeno = 2;
    $response = array();
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $response['error'] = true;
        $response['message'] = "Invalid Request method";
        echo json_encode($response);
	      exit();
     }

    if(!isset($_POST['catno']) ){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Store.php");
    // require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $catno = (int)$_POST['catno'];

    if($catno<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    $select = new Store($dbcon);
    // $utility = new Utility();

    $result1 = $select->getProductsOfAStoreOfACategory($storeno, $catno);

    $displayProductArray = array();

    if ($result1->num_rows>0) {
          $response['error'] = false;
          while($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
            //   $imagename = $row1['imageurl'];
              $displayProductArray[] = $row1;
          }
          $response['storedisplayproducts'] = $displayProductArray;
    }else{
          $response['error'] = true;
          $response['message'] = "No Product Found!";
    }

    echo json_encode($response);

    $dbcon->close();
?>
