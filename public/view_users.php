<?php
require "templates/header.php";
include "classes/Database.php";

$obj = new Database();
$table = 'user';
$all_books = $obj->readData($table);

    if(array_key_exists('delete',$_POST)){
            $user_id = $_POST['user_id'];
            $condition = "user_id=". $user_id;
            $obj->deleteData($table,$condition);
            echo $_POST['$user_id'] . "User deleted successfully". '<br><hr>';
            $secondsWait = 1;
            header("Refresh:$secondsWait");
            echo "<script>location.href='view_users.php';</script>";
    }
?>

<hr>
<table>
    <tr>
        <th>Sr. No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Class</th>
        <th>Gr No</th>
        <th>Username</th>
    </tr>
    <?php
      foreach($all_books as $result){

        echo "<tr>
            <form  id='view_user' method='post'>
            <td><input type='text' name='user_id'   value='". $result['user_id']." '   size='1' readonly></td>
            <td><input type='text' name='firstname' value='". $result['firstname']." ' size='12' readonly></td>
            <td><input type='text' name='lastname'  value='". $result['lastname']." '  size='5' readonly></td>
            <td><input type='text' name='class'     value='". $result['class']." '     size='5' readonly></td>
            <td><input type='text' name='grno'      value='". $result['gr_no']." '     size='5' readonly></td>
            <td><input type='text' name='username'  value='". $result['username']." '  size='5' readonly></td>
            <td><input type='submit' class='button'   name='edit' value='Edit' formaction='edit_user.php'></input> </td>
            <td><input type='submit' class='button'   name='delete' value='Delete' ></input></td>
            </form>
          </tr>";
    }
    ?>
</table>
<br>
<hr>
<a href="add_user.php">Add User</a>

<?php require "templates/footer.php"; ?>
