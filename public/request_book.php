<?php
require "templates/header.php";
//session_start();
/*if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');
}*/
if (isset($_POST['request'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $requestBook = " insert into requested_books(bookname,username) values(:bookname, :username) ";
        $statement = $connection->prepare($requestBook);
        $statement->bindparam(':bookname', $bookname);
        $statement->bindparam(':username', $username);

        $bookname= $_POST['bookname'] ;
        $username =  "some user";

        $statement->execute();
        echo "book request sent";

    } catch(PDOException $error) {
        echo  $error->getMessage();
    }
}
?>
<hr>
<!--<h3> Here you can request a book. </h3>-->
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
