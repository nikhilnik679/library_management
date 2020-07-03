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

require "../config.php";
require "../common.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $viewUsers = " select * from user ";
    $statement = $connection->query($viewUsers);
    $result = $statement->fetch();

    if(array_key_exists('delete',$_POST)){
        deleteUser($connection);
    }

} catch(PDOException $error) {
    echo  $error->getMessage();
}

function deleteUser($connection)
{
    $user_id = $_POST['user_id'];
    echo "user selected with id $user_id";
    $deleteUser = " delete from user where user_id=:user_id ";
    $statement = $connection->prepare($deleteUser);
    $statement->execute(['user_id'=>$user_id]);
    echo $_POST['user_id'] . "user deleted successfully". '<br><hr>';
    $secondsWait = 1;
    header("Refresh:$secondsWait");
}

require "templates/header.php";
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
    while( $result = $statement->fetch()){

        echo "<tr>
            <form  id='view_user' method='post'>
            <td><input type='text' name='user_id'   value='". $result['user_id']." ' size='1' readonly></td>
            <td><input type='text' name='firstname'   value='". $result['firstname']." ' size='12' readonly></td>
            <td><input type='text' name='lastname'   value='". $result['lastname']." ' size='5' readonly></td>
            <td><input type='text' name='class'   value='". $result['class']." ' size='5' readonly></td>
            <td><input type='text' name='grno'   value='". $result['gr_no']." ' size='5' readonly></td>
            <td><input type='text' name='username'   value='". $result['username']." ' size='5' readonly></td>
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
