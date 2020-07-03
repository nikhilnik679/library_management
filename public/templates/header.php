<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Welcome  " . $_SESSION['username'] ;
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    echo "<a href='index.php'>Login</a>";
}

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Library Management App</title>

	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<h1>Library Management App</h1>
