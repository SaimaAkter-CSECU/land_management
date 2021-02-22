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

    if(!isset($_POST['productno']) || !isset($_POST['productimage'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }

    $productno = (int)$_POST['productno'];
    $productimage = strip_tags($_POST['productimage']);


    if($productno<=0 || $storeno<=0){
        $response['error'] = true;
        $response['message'] = "Required fields must be greater than zero!";
        echo json_encode($response);
        exit();
    }

    if($productimage==NULL){
        $response['error'] = true;
        $response['message'] = "Null image!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Product.php");
    require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();
    $product = new Product($dbcon);
    $utility = new Utility();

    try {
      $dbcon->begin_transaction();

      $randomnumber = $utility->generateRandomString(10);
      $productimagename = $storeno."_".$productno."_".$randomnumber.".jpg";
      $updatename = $product->updateProductImageName($productimagename, $productno, $storeno);

      if(!$updatename){
        throw new \Exception("Cannot Update.", 1);
      }

      $path = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/assets/images/product/".$productimagename;
      $replaced = $utility->saveImageToServer($path, $productimage);

      if(!$replaced){
        throw new \Exception("Cannot Upload image", 1);
      }

      if($dbcon->commit()){
        $response['error'] = false;
        $response['message'] = "Image uploaded successfully!";
      }else{
        throw new \Exception("Something went wrong. Please try again.", 1);
      }

    } catch (\Exception $e) {
      $dbcon->rollback();
      $response['error'] = true;
      $response['message'] = $e->getMessage();
    }

    echo json_encode($response);
    $dbcon->close();

?>
