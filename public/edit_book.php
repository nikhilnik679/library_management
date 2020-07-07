<?php
require "templates/header.php";
include('classes/Database.php');



$obj = new Database();
/*echo "<pre>";
print_r($temp);*/

$temp = $bookname = $author = $department = '' ;

if(isset($_POST))
{
        $temp = $_POST;
        $book_id = $temp['book_id'];
        $bookname = $temp['bookname'];
        $author = $temp['author'];
        $department = $temp['department'];
}


if(isset($_POST['update'])){
    /*echo "update clicked";
    echo "<pre>";*/
    //print_r($temp);

    $book_id = $_POST['book_id'];
    $bookname = $temp['bookname'];
    $author = $temp['author'];
    $department = $temp['department'];

    $query = "UPDATE `book` SET `bookname` = '$bookname', `author` = '$author', `department` = '$department' WHERE `book`.`book_id` = $book_id ";
    echo "update $query";
    $obj->updateData($query);
    echo "Book updated successfully";
    echo "<script>location.href='view_book.php';</script>";

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
           <form action='#' method='post' > <!--onsubmit="return false"-->
            <td><input type='text' name='book_id' id='book_id'  value='<?php echo $book_id;?>' size='1' ></td>
            <td><input type='text' name='bookname' id='bookname'  value='<?php echo $bookname;?>'  ></td>
            <td><input type='text' name='author' id='author'  value='<?php echo $author; ?>'  ></td>
            <td><input type='text' name='department' id='department'  value='<?php echo $department; ?>'  ></td>
            <td><input type='submit' class='button'   name='update' value='Update'></td>
            </form>
          </tr>
</table>
<br>
<hr>
<a href="view_book.php">View Books</a>
<?php require "templates/footer.php"; ?>
