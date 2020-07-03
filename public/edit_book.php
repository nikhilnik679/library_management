<?php
require "templates/header.php";
include('classes/database.php');
$obj = new query();
/*session_start();;
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
print_r($_POST);
$book_id = $temp['book_id'];
$bookname = $temp['bookname'];
$author = $temp['author'];
$department = $temp['department'];
//$temp = $_POST;
//echo $_POST['update'];

/*$x = '';
if($temp['bookname'] != $_POST['bookname']){
    $x = "bookname=:".$_POST['bookname'];
   // echo "jojo";
}
if($temp['author'] != $_POST['author']){
    $x = "author=:".$_POST['author'];
}
if($temp['department'] != $_POST['department']){
    $x = "department=:".$_POST['department'];
}

echo "123".$x;*/
if(isset($_POST['update'])){
   require "../config.php";
    require "../common.php";

    $book_id = $_POST['book_id'];
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $department = $_POST['department'];
    //$x = "(bookname=:bookname,author=:author,department=:department)";
    try{
        $connection = new PDO($dsn, $username, $password, $options);

        $editBook = "update book set (bookname=:bookname,author=:author,department=:department)  where book_id=:book_id";
        $statement = $connection->prepare($editBook);
        $statement->execute(['bookname'=>$bookname, 'author'=>$author,'book_id'=>$book_id,'department'=>$department]);

        echo "Book updated successfully";

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
        <th>Book Name</th>
        <th>Author</th>
        <th>Department</th>
        <th>Edit Book</th>
    </tr>
    <tr>
            <form action='#' method='post' onsubmit="return false">
            <td><input type='text' name='book_id' id='book_id'  value='<?php echo $book_id;?>' size='1' ></td>
            <td><input type='text' name='bookname' id='bookname'  value='<?php echo $bookname;?>'  ></td>
            <td><input type='text' name='author' id='author'  value='<?php echo $author;?>'  ></td>
            <td><input type='text' name='department' id='department'  value='<?php echo $department;?>'  ></td>
            <td><input type='submit' class='button'   name='update' value='Update'></td>
            </form>
          </tr>
</table>
<br>
<hr>
<a href="view_book.php">View Books</a>


<?php require "templates/footer.php"; ?>
