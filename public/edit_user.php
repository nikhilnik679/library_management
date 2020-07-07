<?php
require "templates/header.php";
include('classes/Database.php');


$obj = new Database();

$temp = '';
$user_id = '';
$firstname = $lastname = $class = $grno = $username = $password = '' ;

if(isset($_POST))
{
    $temp = $_POST;
    /*echo "<pre>";
    print_r($temp);*/
    $user_id = $temp['user_id'];
    $firstname = $temp['firstname'];
    $lastname = $temp['lastname'];
    $class = $temp['class'];
    $grno = $temp['grno'];
    $username = $temp['username'];
}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $class = $_POST['class'];
    $grno = $_POST['grno'];
    $username = $_POST['username'];
    $password = $username;

    $query = "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `class` = '$class', `gr_no` = '$grno', `username` = '$username', `password` = '$password', `user_role` = '0' 
                  WHERE `user`.`user_id` = '$user_id' ";
        echo "update $query";
        $obj->updateData($query);
        echo "<script>location.href='view_users.php';</script>";
}
?>
<hr>
<table>
    <tr>
        <th>Sr. No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Class</th>
        <th>Gr No</th>
        <th>Username</th>
    </tr>
    <tr>
        <form  method='post'>
            <td><input type='text' name='user_id' id='user_id'  value='<?php echo $user_id;?>' size='1' ></td>
            <td><input type='text' name='firstname'  value='<?php echo $firstname ;?>' size='1' ></td>
            <td><input type='text' name='lastname'   value='<?php echo $lastname;?>'  ></td>
            <td><input type='text' name='class'  value='<?php echo $class;?>'></td>
            <td><input type='text' name='grno'   value='<?php echo $grno;?>'></td>
            <td><input type='text' name='username'   value='<?php echo $username;?>'  ></td>
            <!--<td><input type='text' name='password'   value='<?php /*echo $password;*/?>'  hidden></td>-->
            <td><input type='submit' class='button'   name='update_user' value='Update'> </td>
        </form>
    </tr>
</table>
<br>
<hr>
<a href="view_users.php">View Users</a>
<?php require "templates/footer.php"; ?>
