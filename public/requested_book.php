<?php
require "templates/header.php";
require "../config.php";
require "../common.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $viewRequestedBook = " select * from requested_books ";
    $statement = $connection->query($viewRequestedBook);
    $result = $statement->fetch();
   // echo '<pre>';
    //print_r($result);

} catch(PDOException $error) {
    echo  $error->getMessage();
}

?>


<hr>
<table>
  <tr>
      <th>Sr. No</th>
      <th>Book Name</th>
      <th>Username</th>
  </tr>
      <?php
      $count = 0;
      while( $result = $statement->fetch()){
          $count++;
          echo "<tr>
            <form  method='post'>
             <td><input type='text' name='sr_no'  value='". $count." '  readonly></td>
            <td><input type='text' name='r_bookname'  value='". $result['bookname']." '  readonly></td>
            <td><input type='text' name='r_username'  value='". $result['username']." '  readonly></td>
            </form>
          </tr>";
      }
      ?>
</table>
<br>
<hr>
<a href="add_book.php">Add Book</a>