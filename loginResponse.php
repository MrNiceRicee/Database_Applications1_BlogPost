<?php
    require_once 'functions.php';
    include 'header.php';

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Login Success</title>
	<style type="text/css">
		body {
			text-align: center;
		}
	}
	
	</style>
</head>

<body>
<!-- DISPLAY WELCOME MESSAGE -->
<h2> Welcome back, <?php echo " " .getFirstName() ?></h2>

<!-- Display a link to the who am I page -->
<a href="whoAmI.php">Go to your page <?php echo " ".getFirstName()?></a>
</body>

</html>