<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
?>

<?php
$response = array();
$response['error'] = false;
$response['data'] = array();
$response['data']['name']=$_SESSION['name'];
$response['data']['userid']=$_SESSION['userid'];
$response['data']['email']=$_SESSION['email'];
$response['data']['contactno']=$_SESSION['contactno'];
$response['data']['imageurl']=$_SESSION['imageurl'];

echo json_encode($response);
?>
