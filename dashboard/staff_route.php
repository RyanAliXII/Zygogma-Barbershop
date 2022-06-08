<?php 

include "db_conn.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){  
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO clientusers(name, email, password, type, last_login) VALUES('$name', '$email', '$password', 'staff', 'null')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    // if (mysqli_query($connect, $sql)) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    //   }
    header("Location: staff.php");
}


?>