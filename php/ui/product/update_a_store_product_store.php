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

    if(!isset($_POST['productno'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Product.php");
    // require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();

    if(!$db->is_connected()){
          $response['error'] = true;
          $response['message'] = "Database is not connected!";
          echo json_encode($response);
          exit();
    }

    $productno = (int)$_POST['productno'];

    if($productno<=0 || $storeno<=0){
        $response['error'] = true;
        $response['message'] = "Fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    if(!isset($_POST['rate'])){
        $rate = NULL;
    }else{
        $rate = strip_tags($_POST['rate']);
        if(empty($rate)){
            $rate = NULL;
        }
    }

    //echo $_POST['availability'];
    if(!isset($_POST['availability'])){
        $availability = -1;
    }else{
        $availability = (int)$_POST['availability'];
    }
    
    $drate = (double)$_POST['drate'];
    //echo $availability;
    $update = new Product($dbcon);


    $result = $update->update_a_store_product($storeno, $productno, $rate, $availability);

    if ($result == "N") {
         $response['error'] = true;
         $response['message'] = "Nothing to update!";

    }else
    {
        if($result == "true"){
            $response['error'] = false;
            $response['message'] = "Store product update successful!";
        }else{
            $response['error'] = false;
            $response['message'] = "Store product update failed! May be You hasve not change anything other than discount rate.";
        }
         
        $hasDiscount = $update->check_if_product_has_discount($storeno,$productno);
        if($hasDiscount)
        {
            $du = $update->update_store_product_discount($storeno,$productno,$drate);
            if($du)
            {
                $response['message'] .= 'Discount rate updated';
            }
        }
        else
    {
            if($drate>0.0)
            {
                $di = $update->insert_store_product_discount($storeno,$productno,$drate);
                if($di)
                {
                    $response['message'] .= 'Discount rate updated';
                }
            }
        }
    }

    echo json_encode($response);

    $dbcon->close();
?>
