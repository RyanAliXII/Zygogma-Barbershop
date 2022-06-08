<?php 
session_start(); 
include "db_config.php";


if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
	
	
	
	
	}


		$sql = "SELECT * FROM adminusers WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql) or die(mysqli_error($res));
	
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['user_name'] === $uname && $row['password'] === $pass) {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['type'] = 'admin';
				$_SESSION['isAvailable'] = $row['isAvailable'];
				header("Location: dashboard.php");
				exit();
			}
		}

			$hashed_pass = md5($pass);
			$query ="SELECT * FROM clientusers WHERE email='$uname' AND type='staff'";
			$staff_result = mysqli_query($conn, $query) or die(mysqli_error($res));
			if (mysqli_num_rows($staff_result) === 1) {
				$row = mysqli_fetch_assoc($staff_result);
				if ($row['email'] === $uname && $row['password'] === $hashed_pass) {
					$_SESSION['user_name'] = $row['email'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['type'] = 'staff';
					$_SESSION['isAvailable'] = $row['isAvailable'];
					header("Location: dashboard.php");
					exit();
				}


			}

			header("Location: index.php?error=Incorect User name or password");
			exit();
			
		// if(isset($_POST['g-recaptcha-response'])){

			
		// 	$secretkey = "6LdCi_0fAAAAAIYUbo_VWXvT-LUV9VGSFodmmTFU";
		// 	$ip = $_SERVER['REMOTE_ADDR'];
		// 	$response = $_POST['g-recaptcha-response'];
		// 	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
		// 	$fire = file_get_contents($url);
		// 	$data = json_decode($fire);
		// 	if($data->success==true){
		// 		$sql = "SELECT * FROM adminusers WHERE user_name='$uname' AND password='$pass'";

		// 		$result = mysqli_query($conn, $sql) or die(mysqli_error($res));
			
		// 		if (mysqli_num_rows($result) === 1) {
		// 			$row = mysqli_fetch_assoc($result);
		// 			if ($row['user_name'] === $uname && $row['password'] === $pass) {
		// 				$_SESSION['user_name'] = $row['user_name'];
		// 				$_SESSION['name'] = $row['name'];
		// 				$_SESSION['id'] = $row['id'];
		// 				header("Location: dashboard.php");
		// 				exit();
		// 			}else{
		// 				header("Location: index.php?error=Incorect User name or password");
		// 				exit();
		// 			}
		// 		}else{
		// 			header("Location: index.php?error=Incorect User name or password");
		// 			exit();
		// 		}
		// 	}else{
		// 		header("Location: index.php?error=Please Fill Recaptcha");
		// 		exit();
		// 	}
			
		// }else{
		// 	header("Location: index.php?error=Incorect User name or password");
		// 				exit();
		// }
		
	
// else{
// 	header("Location: index.php");
// 	exit();
// }
}
