<?php
require "templates/header.php";
include 'classes/Database.php';
/*session_start();
if(isset($_SESSION['username'])){
    echo "Welcome";
    echo "<br/>";
    echo "<a href='logout.php'>Logout</a>";
}else{
    header('location:index.php');

}*/
$obj1 = new Database();
$table = 'book';
$data = '';
$result ='';
    if (isset($_POST['submit'])) {

        $data =  $_POST;
        echo '<pre>';
        print_r($data);
        $result = $obj1->createData($table,$data);

       echo '<pre>';
       print_r($result);

        /*  try {
              $connection = new PDO($dsn, $username, $password, $options);

              $insertBook = " insert into book(bookname,author,department) values(:bookname, :author, :department) ";
              $statement = $connection->prepare($insertBook);
              $statement->bindparam(':bookname', $bookname);
              $statement->bindparam(':author', $author);
              $statement->bindparam(':department', $department);

              $bookname = $_POST['bookname'];
              $author = $_POST['author'];
              $department = $_POST['department'];
              $statement->execute();

          } catch (PDOException $error) {
              echo $error->getMessage();
          }*/
    }


?>
<?php if (isset($_POST['submit']) ) { ?>
    <blockquote><?php echo $_POST['bookname'] , $_POST['author'], $_POST['department']; ?> added successfully.</blockquote> <?php } ?>
<?php
//echo "say:::". $_SESSION['role'];
if(  /* $_SESSION['role'] */  1 ) {
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
