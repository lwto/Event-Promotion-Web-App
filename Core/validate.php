<?php      
include("connection.php");

$username = $_POST['username'];  
$password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($mysqli, $username);  
        $password = mysqli_real_escape_string($mysqli, $password);  
      
        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($mysqli, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
          header('Location: admin/dashboard.php');
          exit;
        }  
        else{  
          header('Location: loginfailed.php');
          exit;
        }     
	

?>
      
      