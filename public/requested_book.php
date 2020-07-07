<?php
require "templates/header.php";
include 'classes/Database.php';

$obj = new Database();
$table = 'requested_books';
$result = $obj->readData($table);

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
      foreach($result as $list){
          $count++;
          echo "<tr>
            <form  method='post'>
             <td><input type='text' name='sr_no'  value='". $count." '  readonly></td>
            <td><input type='text' name='r_bookname'  value='". $list['bookname']." '  readonly></td>
            <td><input type='text' name='r_username'  value='". $list['username']." '  readonly></td>
            </form>
          </tr>";
      }
      ?>
</table>
<br>
<hr>
<a href="add_book.php">Add Book</a>