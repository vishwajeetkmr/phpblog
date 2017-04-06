<?php 
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>

      <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1>Welcome - Admin</h1>
		
		<form class="form" action="login.php" method="post">
			<input type="text" placeholder="User Email" name="email">
			<input type="password" placeholder="Password" name="pass">
			<button name="login" type="submit" id="login-button">Login</button>
		</form>
	</div>

</body>
</html>
<?php

include "../libs/config.php";
include "../libs/database.php";

$db = new database();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM admin WHERE email='$email' AND pass='$pass'";
    
    $user = $db->select($query);
    
    $check = $user->num_rows;
    
    if($check > 0){
       $_SESSION['email'] = $email;
       header("location: index.php?msg= Successfully Logged in!");    
    }else{
        echo "<script>alert('Password or Email is nor correct');</script>";
    }
    
}

?>