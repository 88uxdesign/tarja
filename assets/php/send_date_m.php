<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

//form fields
$name = $_POST['name'];
$message = $_POST['message'];
$email =  $_POST["email"];
$m_to = $_POST["m_to"];
$subject = "Atendimento- Mensagem de $name";
$from = "From: $name <$email>";


wp_mail( $m_to, $email, $message, $from );

// Put your MailChimp API and List ID hehe
$api_key = 'f71dd4881fcf34145a64d8a86ee7ef77-us17';
$list_id = 'e74e0d4569';
// Let's start by including the MailChimp API wrapper
include('MailChimp.php');
// Then call/use the class
use \DrewM\MailChimp\MailChimp;
$MailChimp = new MailChimp($api_key);

// Submit subscriber data to MailChimp
// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
$result = $MailChimp->post("lists/$list_id/members", [
						'email_address' => $email,
						'merge_fields'  => ['FNAME'=>$_POST["name"]],
						'status'        => 'subscribed',
					]);

		if ($MailChimp->success()) {
			// Success message
			echo "$name recebemos sua mensagem, em breve retornaremos!";
		} else {
			// Display error
			echo $MailChimp->getLastError();
			// Alternatively you can use a generic error message like:
			// echo "<h4>Please try again.</h4>";
		}

?>
