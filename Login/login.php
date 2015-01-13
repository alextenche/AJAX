<?php

$name = $_GET['name'];
$password = $_GET['password'];

if($name && $password){
	$link = mysqli_connect('localhost','root', '', 'login');

	$result = mysqli_query($link, "SELECT * FROM users WHERE username='$name'");
	$numrows = mysqli_num_rows($result);

	if($numrows != 0){
		while($row = mysqli_fetch_assoc($result)){
			$dbname = $row['username'];
			$dbpassword = $row['password'];
		}

		if($name == $dbname){
			if($password == $dbpassword){
				echo "you are in!";
			} else {
				echo "your password is incorrect";
			}
		} else {
			echo "your name is incorrect";
		}
	} else {
		echo "this name is not registred";
	}

} else {
	echo 'Please retype a username and password';
}

?>