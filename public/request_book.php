<?php
require "templates/header.php";
include 'classes/Database.php';

/*if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');
}

$obj1 = new Database();
$table = 'requested_books';
$result ='';

if (isset($_POST['request'])) {

    $bookname = $_POST['bookname'];
    $username = $_SESSION['username'];

    $field = " `request_id`,`bookname`, `username`";
    $value = " '', '$bookname', '$username'";
    // echo '<pre>'; print_r($data);
    $result = $obj1->createData($table,$field,$value);
    echo "book request sent";
    echo "<script>location.href='view_book.php';</script>";
    // echo '<pre>'; print_r($result);
}
*/?><!--
<hr>

<h3>Welcome :  <span style="color: red"><?php /*echo $_SESSION['username']  */?> </span></h3>
<hr>
<form method="post">
    <label for="bookname">Book Name</label>
    <input type="text" name="bookname">

   <!-- <label for="author">Author</label>
    <input type="text" name="author" id="author">

    <label for="department">Department</label>
    <input type="text" name="department" id="department">-->

    <input type="submit" name="request" value="Request Book">
</form>

<br>
<hr>
<a href="view_book.php">View Books</a>
-->