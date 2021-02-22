<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php
// From session
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');

$response = array();
$base_path = dirname(dirname(dirname(__FILE__)));

require_once($base_path."/db/Database.php");
require_once($base_path."/model/Cartstatus.php");

$db = new Database();
$dbcon = $db->db_connect();

if(!$db->is_connected()){
    $response['error'] = true;
    $response['message'] = "Database is not connected!";
    echo "data:".json_encode($response)."\n\n";
    @ob_flush();
    @flush();
    exit();
}

// $customerno = $userno;

$os = new Orderstatus($dbcon);
$result= $os->get_order_status_not_sent_to_store($storeno);

if($result->num_rows>0)
{
  $result_array = array();
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $result_array[] = $row;
  }
  $response['error'] = false;
  $response['data'] = $result_array;
  // $update_result = $cs->update_senttostore_of_all_status_of_all_cart_of_a_store($storeno,1);
  echo "data:".json_encode($response)."\n\n";
  @ob_flush();
  @flush();
}
 ?>
