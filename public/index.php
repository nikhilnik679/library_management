<?php
require "templates/header.php";
include 'classes/Database.php';

$obj = new Database();
$table = 'user';
$msg = "";

if (isset($_POST['submitBtnLogin']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if ($username != "" && $password != "")
    {
            $condition = "`username`= '$username' and `password`= '$password'";
            $row = $obj->readData($table,$condition);
            // echo "message  " . $row[0]['user_role'];
            if(!empty($row))
            {
                session_start();
                $_SESSION['username'] = $row[0]['username'];
                if($row[0]['user_role'])
                {
                    $_SESSION['role'] = true;
                    echo "<script>location.href='admin.php';</script>";

                }else{
                    $_SESSION['role'] = false;
                    echo "<script>location.href='user.php';</script>";
                }
            } else {
                $msg = "Invalid username and password!";
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