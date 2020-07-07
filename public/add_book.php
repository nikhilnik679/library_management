<?php
require "templates/header.php";
include 'classes/Database.php';

$obj1 = new Database();
$table = 'book';
$data = '';
$result ='';
    if (isset($_POST['submit']))
    {
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $department = $_POST['department'];
        $field = " `book_id`,`bookname`, `author`, `department` ";
        $value = " '', '$bookname', '$author', '$department'";
       // echo '<pre>'; print_r($data);
        $result = $obj1->createData($table,$field,$value);
        echo "<script>location.href='view_book.php';</script>";
       // echo '<pre>'; print_r($result);
    }
?>
<?php if (isset($_POST['submit']) ) { ?>
    <blockquote><?php echo $_POST['bookname'] , $_POST['author'], $_POST['department']; ?> added successfully.</blockquote> <?php } ?>
<?php

if(   $_SESSION['role']   ) {
    echo '<h3>Welcome :  <span style="color: red"></span></h3>
<h2>Add a book</h2>
<hr>
<form method="post">
    <label for="bookname">Book Name</label>
    <input type="text" name="bookname" id="bookname">

    <label for="author">Author</label>
    <input type="text" name="author" id="author">

    <label for="department">Department</label>
    <input type="text" name="department" id="department">

    <input type="submit" name="submit" value="Submit">
</form>

<br>
<hr>
<a href="view_book.php">View Books</a>';
}else{
    echo "admin can view this page only";
}
 require "templates/footer.php"; ?>
