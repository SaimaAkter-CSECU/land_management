<?php
  $response = array();
  if($_SERVER['REQUEST_METHOD']!='POST'){
      $response['error'] = true;
      $response['message'] = "Invalid Request method";
      echo json_encode($response);
  exit();
  }

  if(!isset($_POST['username']) || !isset($_POST['password'])){
      $response['error'] = true;
      $response['message'] = "Error! Required fields are missing!";
      echo json_encode($response);
      exit();
  }

  $base_path = dirname(dirname(dirname(__FILE__)));

  require_once($base_path."/db/Database.php");
  require_once($base_path."/model/Login.php");


  $db = new Database();
  $dbcon = $db->db_connect();

  if(!$db->is_connected()){
        $response['error'] = true;
        $response['message'] = "Database is not connected!";
        echo json_encode($response);
        exit();
  }

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  $login = new Login($dbcon);

  $user_result = $login->get_existance_of_an_store_user($username);

  if($user_result->num_rows<=0)
  {
    $response['error'] = true;
    $response['message'] = 'Invalid user.';
  }
  else {
    $user = $user_result->fetch_array(MYSQLI_ASSOC);
    // $given_password_hash = password_hash($password, PASSWORD_DEFAULT);
    if(password_verify($password, $user['user_password']))
    {
      session_start();
      $_SESSION['userno'] = $user['user_id'];
      $_SESSION['name'] = $user['user_name'];
      $_SESSION['email'] = $user['user_email'];
      $_SESSION['contactno'] = $user['user_mobile_no'];
      $_SESSION['user_role_id'] = $user['user_role_id'];

      $response['error'] = false;
      $response['message'] = 'Login Successfull.';
      $response['data'] = array();
      $response['data']['name']=$_SESSION['name'];
      $response['data']['email']=$_SESSION['email'];
      $response['data']['contactno']=$_SESSION['contactno'];
      $response['data']['user_role_id']=$_SESSION['user_role_id'];
      // header('location: ')
    }
    else {
      $response['error'] = true;
      $response['message'] = 'Invalid user.';
    }
  }

  echo json_encode($response);
 ?>
