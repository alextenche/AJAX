<?php

$name = $_GET['name'];
$password = $_GET['password'];

if($name && $password){
	$link = mysqli_connect("localhost","root","termopane","testsite");
	
	$query = mysqli_query($link, "SELECT * FROM users WHERE name='".$name."'");
	$numrows = mysqli_num_rows($query);
	
	if($numrows != 0){
		while($row = mysqli_fetch_assoc($query)){
			$dbname = $row['name'];
			$dbpassword = $row['password'];
		}
		if($name == $dbname){
			if($password == $dbpassword){
				echo "You are in!";
			} else {
				echo "Your password is incorrect!";
			}
		} else {
			echo "Your name is incorrect!";
		}
	} else {
		echo "This name is not registered!";
	}
	
} else {
	echo "You have to type a username and a password";
}


?>