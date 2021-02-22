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

  if(!isset($_FILES['storeimage']) || !isset($_POST['typeno']) ){
      $response['error'] = true;
      $response['message'] = "Required fields missing!";
      echo json_encode($response);
      exit();
  }

  $base_path = dirname(dirname(dirname(__FILE__)));

  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Slider.php");
  require_once($base_path."/utility/Utility.php");

  $db = new Database();
  $dbcon = $db->db_connect();

  if(!$db->is_connected()){
      $response['error'] = true;
      $response['message'] = "Database is not connected!";
      echo json_encode($response);
      exit();
  }

  $slider = new Slider($dbcon);
  $utility = new Utility();

  $images = $_FILES['storeimage'];
  //var_dump($images);

  $file_posted = array();
  $file_posted = reArrayFiles($images);
  //var_dump($file_posted);

  $total_image = count($file_posted);
  $typeno  = (int)$_POST['typeno'];

  $totalImageCountRes = $slider->geTotalImagesOfAType($storeno, $typeno);
  if($totalImageCountRes->num_rows==1){
    $row = $totalImageCountRes->fetch_array(MYSQLI_ASSOC);
    $totalImage = $row['totalimages'];
  }else{
    $totalImage = 0;
  }

  try {
    $dbcon->begin_transaction();
    for ($i=0; $i <$total_image ; $i++) {

      $file = $file_posted[$i];

      $response[$i]=array();


        $path = $file['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $randomnumber = $utility->generateRandomString(10);
        $simagename = $storeno."_".($totalImage+1+$i).'_'.$randomnumber.'.'.$ext;
        $target_dir = dirname(dirname(dirname(dirname(__FILE__))))."/assets/images/storetypeslider/";
        $target_file = $target_dir.$simagename;

        $insertImageRes = $slider->inserttypeSliderImages($storeno, $typeno, $simagename);

        if(!$insertImageRes){
          throw new \Exception("Cannot add image.", 1);
        }

        $upload_responnse = $utility->upload_image($target_file, $target_dir, $file);



        if($upload_responnse['error']){
          throw new \Exception($upload_responnse['message'], 1);
        }

        if($dbcon->commit()){
          $response[$i]['error'] = false;
          $response[$i]['message'] = "Image uploaded successfully!";
        }else{
          throw new \Exception("Something went wrong. Please try again.", 1);
        }
    }
  } catch (\Exception $e) {
    $dbcon->rollback();
    $response[$i]['error'] = true;
    $response[$i]['message'] = $e->getMessage();
  }

  echo json_encode($response);
  $dbcon->close();


  function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
  }
 ?>
