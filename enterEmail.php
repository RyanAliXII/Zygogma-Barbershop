
<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


<?php

require_once 'gauth.php';
$ga = new GoogAuth();

$email = (isset($_POST['email'])) ? strtolower(trim($_POST['email'])) : false;
$code = (isset($_POST['code'])) ? strtolower(trim($_POST['code'])) : false;
$action =  (isset($_GET['action'])) ? strtolower(trim($_GET['action'])) : '' ;

$app_name = "Zygoma";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

		<div class="shadow w-450 p-3"  >
				<?php
					 if ($action == 'part3') {
						if (!file_exists(md5($email))) { show_error("unknown account"); }
						if (!$code) { show_error("code cannot be empty"); }

						$secret_key = file_get_contents(md5($email));
						$checkResult = $ga->verifyCode($secret_key, $code, 2);    // 2 = 2*30sec clock tolerance

						if ($checkResult) {
							header("Location:login.php");
						} else {
							header("Location:enterEmail.php");
						}

					// if registered, request for code, if not, register user
					} elseif ($action == 'part2') {
						if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
							if (file_exists(md5($email))) { // registered in the past
								echo "Enter the code for $app_name from Google Authenticator<br>";
								echo "<form action='enterEmail.php?action=part3' method='post'>";
								echo "<input type='text' name='email' value='$email' readonly /><br />";
								echo "<input type='text' name='code' required/><br />";
								echo "<button type='submit'>SUBMIT</button>";
								echo "</form>";

							} else { // new registration scan authenticator
								$secret_key = $ga->createSecret();
								$account = $email.'-'.$app_name;
								file_put_contents(md5($email), $secret_key);
								echo "This is your first time using $app_name.<br/>";
								echo "Scan the QR code below with Google Authenticator app.<br/>";
								$qrCodeUrl = $ga->getQRCodeGoogleUrl($account, $secret_key);
								echo "<img src='$qrCodeUrl' /><br />";
								echo "or enter this code manually into Google Authenticator<br/>";
								echo "Your Account : $account<br/>";
								echo "Your Key : $secret_key<br/>";
								echo "When you are ready, click the button below.<br />";
								echo "<form action='enterEmail.php?action=part2' method='post'>";
								echo "<input type='hidden' name='email' value='$email' />";
								echo "<button type='submit'>CONTINUE</button>";
								echo "</form>";
							}
						} else {
							header("Location:enterEmail.php");
						}
					} else {
						// login
						echo "Enter email address to proceed for verification.";
						echo "<form action='enterEmail.php?action=part2' method='post'>";
						echo "<input type='text' name='email' value='' required/>";
						echo "<button type='submit'>submit</button>";
						echo "</form>";
					}
					function show_error($errmessage){
						echo $errmessage.'<br/>';
						header("Location:enterEmail.php");
					}

				?>
		</div>
    </div>
</body>
</html>
<?php
}else{
     header("Location: index.php");
     exit();
}
 ?>