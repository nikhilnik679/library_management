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
?>

<h1>USER PAGE   <?php echo $_SESSION['username']; ?></h1>
<hr>
<ul>
    <li><a href="view_book.php"><strong>View Books</strong></a> - view a book</li>
</ul>

<?php include "templates/footer.php"; ?>

