<?php
require "templates/header.php";
/*session_start();
if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');

}*/
if (isset($_POST['submitUser'])) {
require "../config.php";
require "../common.php";

try  {
$connection = new PDO($dsn, $username, $password, $options);

    $u_firstname = $_POST['first-name'] ;
    $u_lastname =  $_POST['last-name'];
    $username =  $_POST['username'];
    $gr_no = $_POST['gr_no'];
    $class = $_POST['class'];
    $password =  $_POST['password'];
    $role =  $_POST['role'];

$addUser = " insert into user(firstname,lastname,class,username,gr_no,password,role) values(:u_firstname,:u_lastname,:class,:username,:gr_no,:password,:role) ";
$statement = $connection->prepare($addUser);
$statement->bindparam(':firstname', $u_firstname);
$statement->bindparam(':lastname', $u_lastname);
$statement->bindparam(':class', $class);
$statement->bindparam(':username', $username);
$statement->bindparam(':gr_no', $gr_no);
$statement->bindparam(':password', $password);
$statement->bindparam(':role', $role);

$statement->execute();
echo "user added successfully";
} catch(PDOException $error) {
echo  $error->getMessage();
}
}

 require "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['username'] ; ?> added successfully.</blockquote> <?php } ?>
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
