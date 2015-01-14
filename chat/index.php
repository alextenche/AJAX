<?php
	session_start();
	$_SESSION['user'] = (isset($_GET['user']) === true) ? (int)$_GET['user'] : 0;

	//require('core/classes/Core.php');
	//require('core/classes/Chat.php');

	//$chat = new Chat();
	// echo '<pre>'. print_r($chat->fetchMessages(), true).'</pre>';
	//$chat->throwMessage(1, 'This is a test');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Alex Tenche">
	<title>Chat with AJAX</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

	<div class="chat">
		<div class="messages"></div>
		<textarea class="entry" placeholder="type here and hit return"></textarea>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>
</body>

</html>