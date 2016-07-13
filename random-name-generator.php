<?php
	$adjectives= fopen("txt/adjectives.php",'r');
	$adjectiveList=fread($adjectives,filesize("txt/adjectives.php"));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1><?php echo $adjectiveList; ?><h1>
</body>
</html>