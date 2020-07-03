<?php
/*session_start();
if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');
}*/


$temp = $_POST;
echo "<pre>";
print_r($temp);
//echo $_POST['update_user'];
$user_id = $_POST['user_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class = $_POST['class'];
$grno = $_POST['grno'];
$u_username = $_POST['username'];
$u_password = $_POST['password'];
//$x = "firstname=:firstname,lastname=:lastname,class=:class,gr_no=:grno,username=:username,password=:password";


$x = '';
if($temp['firstname '] != $_POST['firstname ']){
    $x = "firstname =:".$_POST['firstname '];
    // echo "jojo";
}
if($temp['lastname'] != $_POST['lastname']){
    $x = "lastname=:".$_POST['lastname'];
}
if($temp['class'] != $_POST['class']){
    $x = "class=:".$_POST['class'];
}

if($temp['grno'] != $_POST['grno']){
    $x = "grno=:".$_POST['grno'];
}

if($temp['username'] != $_POST['username']){
    $x = "username=:".$_POST['username'];
}

if($temp['password'] != $_POST['password']){
    $x = "password=:".$_POST['password'];
}

if(isset($_POST['update_user'])){
    require "../config.php";
    require "../common.php";


    try{
        $connection = new PDO($dsn, $username, $password, $options);




        $editBook = "update user set  $x  where user_id=:user_id";
        $statement = $connection->prepare($editBook);
        $statement->execute(['firstname'=>$firstname, 'lastname'=>$lastname ,'class'=>$class,'gr_no'=>$grno,'username'=>$u_username,'password'=>$u_password]);

        echo "User updated successfully";

    }catch (PDOException $error){
        echo $error->getMessage();
    }

}

require "templates/header.php";
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
            <td><input type='text' name='firstname'  value='<?php echo $firstname ;?>' size='1' ></td>
            <td><input type='text' name='lastname'   value='<?php echo $lastname;?>'  ></td>
            <td><input type='text' name='class'  value='<?php echo $class;?>'></td>
            <td><input type='text' name='grno'   value='<?php echo $grno;?>'></td>
            <td><input type='text' name='username'   value='<?php echo $u_username;?>'  ></td>
            <td><input type='text' name='password'   value='<?php echo $u_password;?>'  hidden></td>
            <td><input type='submit' class='button'   name='update_user' value='Update'> </td>
        </form>
    </tr>
</table>
<br>
<hr>
<a href="view_users.php">View Books</a>
<?php require "templates/footer.php"; ?>
