<?php
require "templates/header.php";
include 'classes/Database.php';
include 'classes/Book.php';
$obj = new Database();
$book_obj = new Book();
$table = 'book';
$result = $book_obj->viewBook($table);


if(array_key_exists('delete',$_POST))
{
    $book_id = $_POST['book_id'];
    $book_obj->setBookid( $book_id);
    $condition = "book_id=" . $book_id ;
    $book_obj->deleteData($table,$condition);
   // $obj->deleteData($table,$condition);
    echo $_POST['book_id'] . "Book deleted successfully". '<br><hr>';
    $secondsWait = 1;
    header("Refresh:$secondsWait");
    echo "<script>location.href='view_book.php';</script>";
}
if(array_key_exists('request_book',$_POST))
{
    $table = 'requested_books';
    $bookname= $_POST['bookname'] ;
    $username = $_SESSION['username'];

    $field = " `request_id`,`bookname`, `username`";
    $value = " '', '$bookname', '$username'";

    $book_request_result = $obj->createData($table,$field,$value);
    echo "book request sent  for bookname = $bookname ";
   // echo "<script>location.href='view_book.php';</script>";
   // echo '<pre>'; print_r($result);
}
?>
<hr>
<table>
  <tr>
      <th>Sr. No</th>
      <th>Book Name</th>
      <th>Author</th>
      <th>Department</th>
  </tr>
      <?php
      foreach($result as $list)
      {
          echo "<tr>
            <form  id='view_book' method='post'>
            <td><input type='text' name='book_id' id='book_id'  value='". $list['book_id']." ' size='1' readonly></td>
            <td><input type='text' name='bookname' id='bookname'  value='". $list['bookname']." ' size='5' readonly></td>
            <td><input type='text' name='author' id='author'  value='". $list['author']." ' size='5' readonly></td>
            <td><input type='text' name='department' id='department'  value='". $list['department']." ' size='5' readonly></td>";

      if($_SESSION['role'])
      {
           echo "<td><input type='submit' class='button'   name='edit' value='Edit' formaction='edit_book.php'></input> </td>
                 <td><input type='submit' class='button'   name='delete' value='Delete' ></input></td>";
       }
       else {
           echo "   <td><input type='submit' class='button'   name='request_book' value='Request Book' ></input></td> ";
       }
           echo "</form></tr>";
      }
      ?>
</table> <br> <hr>
<?php
if($_SESSION['role']){
    echo "<a href='add_book.php'>Add Book</a>";
}
?>
<?php require "templates/footer.php"; ?>
