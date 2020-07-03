
<?php
include "templates/header.php";
/*session_start();
if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');
}*/

?>

    <h1 align="center">ADMIN PAGE</h1>
<hr>

    <ul>
        <li><a href="add_book.php"><strong>Add  a book</strong></a>  </li><br>
        <li><a href="view_book.php"><strong>View  a book</strong></a> </li><br>
        <li><a href="requested_book.php"><strong> List of Requested Books</strong></a>  </li><br>
        <li><a href="add_user.php"><strong>Create New Account Here </strong></a></li><br>
        <li><a href="view_users.php"><strong>View All users</strong></a> </li><br>
    </ul>

<?php include "templates/footer.php"; ?>

