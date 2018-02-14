<?php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;
if($_SERVER['REQUEST_METHOD'] == 'POST') {

			print_r($_POST);

		$phoneNumber = $_POST['phoneNumber'];
		$message = $_POST['message'];
		
		

		echo "Sending SMS! <br>";
		// Your Account SID and Auth Token from twilio.com/console
		$account_sid = 'AC1e090bcf1ee31c2615d3fa0382b69fc3';
		$auth_token = 'b089ee1478a3f585c8dcf3b39695a639';

		// A Twilio number you own with SMS capabilities
		$twilio_number = "+12898040571 ";

		$client = new Client($account_sid, $auth_token);
		$client->messages->create(
			// Where to send a text message (your cell phone?)
			'+1'.$phoneNumber,
			array(
				'from' => $twilio_number,
				'body' => $message
			)
		);

		echo "Done sending SMS! <br>";
		header("Location: " . "admin/index.php");
		exit();
		}
?>