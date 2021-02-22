<?php
  $base_path = dirname(dirname(dirname(__FILE__)));
  include_once($base_path."/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<?php
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');

$response = array();
$base_path = dirname(dirname(dirname(__FILE__)));

require_once($base_path."/db/Database.php");
require_once($base_path."/model/Message.php");

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


$message = new Message($dbcon);
$result= $message->get_total_new_message_counts_between_store_and_customer($storeno);

if($result->num_rows>0)
{
  $result_array = array();
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $result_array[] = $row;
  }
  $response['error'] = false;
  $response['data'] = $result_array;
  $update_result = $message->update_senttostore_of_conversations($storeno,1);
  echo "data:".json_encode($response)."\n\n";
  @ob_flush();
  @flush();
}


?>
