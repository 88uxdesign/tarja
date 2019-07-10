
<?php

// Put your MailChimp API and List ID hehe
$api_key = '203ce56766a7d0c48cd6ad309723e416-us18';
$list_id = 'f22fd13e3e';

// Let's start by including the MailChimp API wrapper
include('MailChimp.php');
// Then call/use the class
use \DrewM\MailChimp\MailChimp;
$MailChimp = new MailChimp($api_key);

$name = $_POST['name'];

// Submit subscriber data to MailChimp
// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
$result = $MailChimp->post("lists/$list_id/members", [
						'email_address' => $_POST["email"],
						'merge_fields'  => ['FNAME'=>$_POST["name"]],
						'status'        => 'subscribed',
					]);

if ($MailChimp->success()) {
	// Success message
	echo "$name enviei um e-mail para confirmar sua inscrição em minha newsletter, obrigrado!<br>
<i>Se não o recebeu confirme os dados fornecidos e tente novamente.";
} else {
	// Display error
	echo "Você já assinou ou ocorreu algum erro";
	// Alternatively you can use a generic error message like:
	// echo "<h4>Please try again.</h4>";
}
?>
