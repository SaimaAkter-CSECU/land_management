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

    if(!isset($_POST['storeimage'])){
        $response['error'] = true;
        $response['message'] = "Error! Required field is missing!";
        echo json_encode($response);
        exit();
    }


    $storeimage = strip_tags($_POST['storeimage']);


    if($storeimage==NULL){
        $response['error'] = true;
        $response['message'] = "Null image!";
        echo json_encode($response);
        exit();
    }

    $base_path = dirname(dirname(dirname(__FILE__)));

    require_once($base_path."/db/Database.php");
    require_once($base_path."/model/Store.php");
    require_once($base_path."/utility/Utility.php");

    $db = new Database();
    $dbcon = $db->db_connect();
    $store = new Store($dbcon);
    $utility = new Utility();

    try {
      $dbcon->begin_transaction();

      $randomnumber = $utility->generateRandomString(10);
      $storeimagename = $storeno."_".$randomnumber.".jpg";
      $updatename = $store->updateStoreImageName($storeimagename, $storeno);

      if(!$updatename){
        throw new \Exception("Cannot Update.", 1);
      }

      $path = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/assets/images/storeimages/".$storeimagename;
      $replaced = $utility->saveImageToServer($path, $storeimage);

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


    // $base_path = dirname(dirname(dirname(__FILE__)));
    //
    // require_once($base_path."/utility/Utility.php");
    // $utility = new Utility();
    // $randomnumber = $utility->generateRandomString(10);
    //
    // $storeimagename = $storeno.$randomnumber.".jpg";
    //
    // $path = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/assets/images/storeimages/".$storeimagename;
    //
    // $replaced = $utility->saveImageToServer($path, $storeimage);
    //
    // if($replaced === FALSE){
    //     $response['error'] = true;
    //     $response['message'] = "Image update failed!";
    //     echo json_encode($response);
    // }else{
    //     $response['error'] = false;
    //     $response['message'] = "Image updated!";
    //     echo json_encode($response);
    // }


?>
