<?php
	if(!empty($_FILES['file'])){
		foreach ($_FILES['file']['name'] as $key => $name) {
			if($_FILES['file']['error'][$key] == 0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], "files/{$name}")){
				$uploaded[] = $name;
			}
		}
		//print_r($uploaded);
		if(!empty($_POST['ajax'])){
			die(json_encode($uploaded));
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload with Progress Bar</title>
	<script type="text/javascript" src="upload.js"></script>
	<style type="text/css">
		#upload_progress{display: none;}
	</style>
</head>

<body>

	<div id="uploaded">
		<?php
			if(!empty($uploaded)){
				foreach ($uploaded as $name) {
					echo '<div><a href="files/', $name ,'">', $name ,'</div>';
				}
			}

		?>
	</div>

	<div id="upload_progress"></div>

	<div id="message"></div>

	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<input type="file" id="file" name="file[]" multiple="multiple">
			<input type="submit" id="submit" value="Upload">
		</div>

	</form>

</body>
</html>