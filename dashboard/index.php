<!DOCTYPE html>
<html>
<head>
	<title>LOGIN - Zygoma Barbershop</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	
	<form  action="login.php" method="post" >
			<img src="image/logo.png" >
			<h2>Admin Login </h2>
			<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<label>User Name :</label>
			<input type="text" name="uname" placeholder="User Name" ><br>
			

			<label>Password :</label>
			<input type="password" name="password" placeholder="Password" ><br>
			

			<div class="g-recaptcha"  data-sitekey="6LdCi_0fAAAAAGdCFIa9iNMC_hAIF7w-EbNl50VT"></div>
			
		    

			<button type="submit" name="submit">Login</button>
			
	</form>
</body>
</html>
