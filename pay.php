<?php 

// Credit Card Billing 
require_once('lib/Stripe.php');  // change this path to wherever you put the Stripe PHP library!
 
$trialAPIKey = "sk_test_5UEW8vga7xU1AtrTgpEnN6XF";  // These are the SECRET keys!
$liveAPIKey = "";
 
Stripe::setApiKey($trialAPIKey);  // Switch to change between live and test environments
 
// Get all the values from the form
$token = $_POST['stripeToken'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$price = $_POST['price'];
 
$priceInCents = $price * 100;   // Stripe requires the amount to be expressed in cents

try
{
    // We must have all of this information to proceed. If it's missing, balk.
    if (!isset($token)) throw new Exception("Website Error: The Stripe token was not generated correctly or passed to the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
    if (!isset($email)) throw new Exception("Website Error: The email address was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
    if (!isset($firstName)) throw new Exception("Website Error: FirstName was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
    if (!isset($lastName)) throw new Exception("Website Error: LastName was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
    if (!isset($priceInCents)) throw new Exception("Website Error: Price was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
 
    try
    {
        // create the charge on Stripe's servers. THIS WILL CHARGE THE CARD!
        $charge = Stripe_Charge::create(array(
            "amount" => $priceInCents,
            "currency" => "usd",
            "card" => $token,
            "description" => $email)
        );
 
        // If no exception was thrown, the charge was successful! 
        // Here, you might record the user's info in a database, email a receipt, etc.
 
        // Return a result code of '0' and whatever other information you'd like.
        // This is accessible to the jQuery Ajax call return-handler in "<span class="skimlinks-unlinked">buy-controller.js</span>"
        $array = array('result' => 0, 'email' => $email, 'price' => $price, 'message' => 'Thank you; your transaction was successful!');
        echo json_encode($array);
    }
    catch (Stripe_Error $e)
    {
        // The charge failed for some reason. Stripe's message will explain why.
        $message = $e->getMessage();
        returnErrorWithMessage($message);
    }
}
catch (Exception $e) 
{
    // One or more variables was NULL
    $message = $e->getMessage();
    returnErrorWithMessage($message);
}


if ($_POST) {
	$to_Email       = "your.email@here.com"; //Replace with recipient email address
	$subject        = 'Message from your website'; //Subject line for emails

	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

		//exit script outputting json data
		$output = json_encode(
			array(
				'type'=>'error', 
				'text' => 'Request must come from Ajax'
			));

		die($output);
	}

	//check $_POST vars are set, exit if any missing
	if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userHuman"]) || !isset($_POST["userMessage"]))
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>Input fields are empty!</span>'));
		die($output);
	}


	//Sanitize input data using PHP filter_var().
	$user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
	$user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
	$user_Human       = filter_var($_POST["userHuman"], FILTER_SANITIZE_STRING);
	$user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);


	$body = '<html><body>';
	$body .= '<h2>Hello, you have an email from your website!</h2>';
	$body .= '<p><strong>Sender:</strong> '.$user_Name.'</p>';
	$body .= '<p><strong>Email:</strong> '.$user_Email.'</p>';
	$body .= '<h3>Message:</h3>';
	$body .= '<p>'.strip_tags($user_Message).'</p>';
	$body .= '</body></html>';

	//additional php validation
	if (strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>Name is too short or empty!</span>'));
		die($output);
	}
	if (!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>Please enter a valid email!</span>'));
		die($output);
	}
	if (!is_numeric($user_Human) || $user_Human !== '7') //check entered data is numbers
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>The captcha value is incorrect.</span>'));
		die($output);
	}
		if(strlen($user_Message)<5) //check emtpy message
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>Too short message! Please enter something.</span>'));
		die($output);
	}

	//proceed with PHP email.
	$headers = "From: " . $user_Email . "\r\n";
	$headers .= "Reply-To: ". $user_Email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
	// send mail
	$sentMail = @mail($to_Email, $subject, $body, $headers);
    
	if (!$sentMail)
	{
		$output = json_encode(array('type'=>'error', 'text' => '<i class="fa fa-exclamation-circle fa-2x"></i><span>Could not send mail! Please check your PHP mail configuration.</span>'));
		die($output);
	} else {
		$output = json_encode(array('type'=>'message', 'text' => '<i class="fa fa-thumbs-o-up fa-2x"></i><span>Hi, '.$user_Name .'! Thank you for your email</span>'));
		die($output);
	}
}

?>