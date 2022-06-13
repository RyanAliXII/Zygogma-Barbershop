
<?php

if(session_id() == ''){
    session_start();
}
if((!isset($_SESSION['id']) && empty($_SESSION['id'])) && (!isset($_SESSION['type']) && empty($_SESSION['type']) )){

    
    header("Location: index.php");
  
}
else{
    if( $_SESSION['type'] != 'admin'){
        header("Location: index.php");
    }
}


?>