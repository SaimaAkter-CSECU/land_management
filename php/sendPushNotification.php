<?php

$data = strip_tags($_POST['data']);

echo sendPushNotification($data);

function sendPushNotification($data){

  $data = json_decode($data, true);

  $email = explode("@", $data['collection']);
  if(count($email)<1){
    return "ERROR";
  }

  $topicName = $email[0];

  define( "API_ACCESS_KEY", "AAAAt8u5HTw:APA91bHErgf5R2VZJrVGyw2wAjmeAg5EBYdf3mz1RNqYtae91OQ0P2ePBLb9wRsikz8viuggczc0OnC1aMJeQOCes0IMeiKeyMkXJ7j3UnkjM-sfiTTrcuJn68IZevRboYCCu34_hR-b");

	$registrationIds = array();
	$fields = array
	(
        'to'  => '/topics/'.$topicName,
		    'data' => [
                "userid" => $data['collection'],
                "message" => $data['message'],
                "title" => $data['title'],
                "timestamp" => $data['document'],
                "flag" => $data['flag'],
                "type" => $data['type'],
                "storename" => $data['storename'],
                "storeno" => $data['storeno']
            ]
	);

	$headers = array
	(
		'Authorization: key=' . API_ACCESS_KEY,
		//'Authorization: key=AAAAlj2PVzE:APA91bEmS6VVrHw7OXKRYfyX4Ae-WJn0hm7ehkYKEPGV9y-z1blKYafHFZ7t-NPmJGV6yhWeC3O1qEPf0OYLyMkX7FoJCqJAyzR37K5sgaiL9geIfVV7EtvnbJ8HEv9NIG06bc_2jng6',
		'Content-Type: application/json'
	);

	$ch = curl_init();
	curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
	curl_setopt( $ch,CURLOPT_POST, true );
	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	//curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch );
	$error_msg = "NO ERROR";
	if (curl_error($ch)) {
        $error_msg = curl_error($ch);
    }
	curl_close( $ch );
	return "OK";
}

 ?>
