<?php
require "templates/header.php";
include 'classes/Database.php';
$obj = new Database();

if(array_key_exists('delete',$_POST)){

    $book_id = $_POST['book_id'];
    $condition = array('id' => $book_id );
    $obj->deleteData('book',$condition);

    echo $_POST['book_id'] . "Book deleted successfully". '<br><hr>';
    $secondsWait = 1;
    header("Refresh:$secondsWait");
}
$table = 'book';
$result = $obj->readData($table);
echo '<pre>';
print_r($result) ;

   /* try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $viewBook = " select * from book ";
        $statement = $connection->query($viewBook);
        $result = $statement->fetch();

        if(array_key_exists('delete',$_POST)){
            deleteBook($connection);
        }

        if(array_key_exists('request_book',$_POST)){
            requestBook($connection);
        }

    } catch(PDOException $error) {
        echo  $error->getMessage();
    }*/

/*function deleteBook($connection)
{
    $book_id = $_POST['book_id'];
    $deleteBook = " delete from book where book_id=:book_id ";
    $statement = $connection->prepare($deleteBook);
    $statement->execute(['book_id'=>$book_id]);
    echo $_POST['book_id'] . "Book deleted successfully". '<br><hr>';
    $secondsWait = 1;
    header("Refresh:$secondsWait");
}*/

/*function requestBook($connection){
    $bookname= $_POST['bookname'] ;
    $username = $_SESSION['username'];
    $requestBook = " insert into requested_books(bookname,username) values(:bookname, :username) ";
    $statement = $connection->prepare($requestBook);
    $statement->bindparam(':bookname', $bookname);
    $statement->bindparam(':username', $username);

    $statement->execute();
    echo "book request sent";

}*/
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
      while( /*$result = $statement->fetch()*/ 1 ){

          echo "<tr>
            <form  id='view_book' method='post'>
            <td><input type='text' name='book_id' id='book_id'  value='". $result['book_id']." ' size='1' readonly></td>
            <td><input type='text' name='bookname' id='bookname'  value='". $result['bookname']." ' size='5' readonly></td>
            <td><input type='text' name='author' id='author'  value='". $result['author']." ' size='5' readonly></td>
            <td><input type='text' name='department' id='department'  value='". $result['department']." ' size='5' readonly></td>";
      if($_SESSION['role']){
           echo "<td><input type='submit' class='button'   name='edit' value='Edit' formaction='edit_book.php'></input> </td>
                 <td><input type='submit' class='button'   name='delete' value='Delete' ></input></td>";
       }
       else {
           echo "   <td><input type='submit' class='button'   name='request_book' value='Request Book' ></input></td> ";
       }
           echo "</form></tr>";
      }
      ?>
</table>
<br>
<hr>
<?php
if($_SESSION['role']){
    echo "<a href='add_book.php'>Add Book</a>";
}

?>
<?php require "templates/footer.php"; ?>
