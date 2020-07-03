<?php
require "templates/header.php";
//file_get_contents();
try {
    $db = new PDO('mysql:host=localhost;dbname=libdb;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}

$msg = "";
if (isset($_POST['submitBtnLogin'])) {

    require "../config.php";
    require "../common.php";

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username != "" && $password != "") {
        try {
            // $db = new PDO($dsn, $username, $password, $options);
            $query = "select * from `user` where `username`=:username and `password`=:password";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {

                $_SESSION['username'] = $row['username'];
                if($row['user_role']){
                    $_SESSION['role'] = true;
                        header('location:admin.php');
                        die();
                }else{
                    $_SESSION['role'] = false;
                    header('location:user.php');

                }
            } else {
                $msg = "Invalid username and password!";
            }
        } catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    } else {
        $msg = "Both fields are required!";
    }
}
?>

    <form method="post">
        <table class="loginTable">
            <tr>
                <th> LOGIN </th>
            </tr>
            <tr>
                <td>
                    <label class="firstLabel">Username:</label>
                    <input type="text" name="username" id="username" value="" autocomplete="off" />
                </td>
            </tr>
            <tr>
                <td><label>Password:</label>
                    <input type="password" name="password" id="password" value="" autocomplete="off" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" />
                    <span class="loginMsg"><?php echo @$msg;?></span>
                </td>
            </tr>
        </table>
    </form>



<?php include "templates/footer.php"; ?>