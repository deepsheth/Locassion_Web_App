<?php

$error = "";
if (isset($_POST['submit']) and isset($_GET['userid']) and isset($_GET['token']) and $_POST['password'] == $_POST['password2']){
	$response = file_get_contents("https://meet-up-1097.appspot.com/?command=newPassword&args=".$_GET['userid'].";".$_GET['token'].";".$_POST['password']."&token=none");
}
else if (isset($_POST['submit'] and $_POST['password'] != $_POST['password2'])){
	$error = "Passwords don't match!";
}
else{
	if (isset($_GET['u'])){
		$userid = $_GET['u'];
		if (isset($_GET['t'])){
			$token = $_GET['t'];
		}
		else{
			$error = "Incorrect token!";
		}
	}
	else{
		$error = "Incorrect userid!";
	}
}

?>

<!DOCTYPE html>
<html>
<b>Missing:</b> Actual site that looks good

</br>At least there's some functonality

<?php 

if ($error == "" and !isset($_POST['submit'])){
	echo('
<form action="" method="post">
<div class="input-field">
    <input id="icon_password" name="password" type="password">
    <label for="icon_password">Password</label>
</div>
<div class="input-field">
    <input id="icon_password" name="password2" type="password">
    <label for="icon_password">Re-type Password</label>
</div>

<input name="submit" type="submit" value="submit">
</form>');

}
else{
	if (isset($_POST['submit'])){
		echo("</br>New Password Submitted!");
	}
	else{
		echo("</br>ERROR: ".$error);
	}
}
?>

</html>