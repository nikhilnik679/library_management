<?php
require "templates/header.php";
session_unset();
session_destroy();
echo "<script>location.href='index.php';</script>";

//echo "<script> location.href='index.php'; </script>";
