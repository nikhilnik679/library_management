<?php
session_start();
session_unset();
session_destroy();
header('location:index.php');
die();

//echo "<script> location.href='index.php'; </script>";
