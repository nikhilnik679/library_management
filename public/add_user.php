<?php
require "templates/header.php";
include "classes/Database.php";

$obj = new Database();
$table = 'user';

if (isset($_POST['submitUser'])) {

    $firstname = $_POST['first-name'] ;
    $lastname =  $_POST['last-name'];
    $username =  $_POST['username'];
    $gr_no = $_POST['gr_no'];
    $class = $_POST['class'];
    $password =  $_POST['password'];
    $role =  $_POST['role'];

    $field = " `user_id`, `firstname`, `lastname`, `class`, `gr_no`, `username`, `password`, `user_role` ";
    $value = " '', '$firstname', '$lastname', '$class', '$gr_no', '$username', '$password', '$role' ";

    $result = $obj->createData($table,$field,$value);

    echo "<script>location.href='view_users.php';</script>";

}
?>

<h2>Add a User</h2>
<hr>
<form method="post">
    <label for="first-name">First Name</label>
    <input type="text" name="first-name" >

    <label for="last-name">Last Name</label>
    <input type="text" name="last-name" >
    
    <label for="class">class</label>
    <input type="text" name="class" >
    
    <label for="gr_no">gr_no</label>
    <input type="text" name="gr_no" >

    <label for="username">User Name</label>
    <input type="text" name="username" >

    <input type="text" name="password" value="" hidden>
    <input type="text" name="role" value="0" hidden>

    <br>  <br>
    <input type="submit" name="submitUser" value="ADD USER">
</form>
<br><hr>
<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
