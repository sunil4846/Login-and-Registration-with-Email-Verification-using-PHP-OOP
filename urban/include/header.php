<?php 
session_start(); 
$current_url = $_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];
include("include/user.php");
$user = new User();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Urban Work</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php  
if (strpos($current_url, "activate.php") === false) {
	include("include/nav.php");
}
?>
