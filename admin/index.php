<?php 
session_start();
ob_start();
if($_SESSION) { 
header("location:admin.php");
}
else {
?>
<!DOCTYPE html>

<html lang="tr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin-css/login.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">
ADMIN PANEL</div>
<form action="" method="POST">
        <div class="field">
        <input type="text" name="username" required>
          <label>Username</label>
        </div>
<div class="field">
      <input type="password" name="password" required>
          <label>Password</label>
        </div>
<div class="field">
          <input type="submit" value="Giriş Yap">
        </div>
</form>
<?php
if($_POST) {
include("../messages/message-settings.php");
	$username = $_POST["username"];
	$password = $_POST["password"];
	$gpassword = md5($password);
	if(!$username || !$password) {
		echo "Username or password is incorrect !";
	}
	else {
		
		$select = $db->prepare("select * from users where username=? and password=?");
		$select->execute(array($username,$gpassword));
		$c = $select->fetch(PDO::FETCH_ASSOC);
		$x = $select->rowCount();
		if($x) { 
				$_SESSION["username"] = $c["username"];
				$_SESSION["password"] = $c["password"];
			    echo "Signed In.";
				header("refresh:1; url=admin.php"); 
			}
		else 
		{
			echo "Username or password is incorrect !";
			}
}
}
?>
</div>






</body>
</html>
<?php
} 
?>