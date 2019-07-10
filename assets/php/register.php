
<?php

// Put your MailChimp API and List ID hehe
$api_key = 'f71dd4881fcf34145a64d8a86ee7ef77-us17';
$list_id = 'a805546f9b';

// Let's start by including the MailChimp API wrapper
include('MailChimp.php');
// Then call/use the class
use \DrewM\MailChimp\MailChimp;
$MailChimp = new MailChimp($api_key);

$name = $_POST['n_name'];

// Submit subscriber data to MailChimp
// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
$result = $MailChimp->post("lists/$list_id/members", [
						'email_address' => $_POST["n_email"],
						'merge_fields'  => ['FNAME'=>$_POST["n_name"]],
						'status'        => 'subscribed',
					]);

if ($MailChimp->success()) {
	// Success message
	echo "$name enviamos um e-mail para confirmar sua inscrição em nossa newsletter, obrigrado!<br>
<i>Se não o recebeu confirme os dados fornecidos e tente novamente.";
} else {
	// Display error
	echo $MailChimp->getLastError();
	// Alternatively you can use a generic error message like:
	// echo "<h4>Please try again.</h4>";
}
?>
