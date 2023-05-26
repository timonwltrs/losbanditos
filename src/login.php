<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php

    include"../includes/nav.html"

    ?>
</head>
<body>
<form action="" method="post" name="Login_Form">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
        <?php if (isset($msg)) { ?>
            <tr>
                <td colspan="2" align="center" valign="top"><?php echo $msg; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
        </tr>
        <tr>
            <td align="center" valign="top">Username</td>
            <td><input name="Username" type="text" class="Input"></td>
        </tr>
        <tr>
            <td align="center">Password</td>
            <td><input name="Password" type="password" class="Input"></td>
        </tr>
        <tr>
            <td></td>
            <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
/*De session begint hier*/
session_start();

if (isset($_POST['Submit'])) {
    $logins = array('Henk' => '123', 'username1' => 'password1', 'username2' => 'password2');

    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';

    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';


    if (isset($logins[$Username]) && $logins[$Username] == $Password) {

        $_SESSION['UserData']['Username'] = $logins[$Username];
        header("location:/index.php");
        exit;
    } else {
        $msg = "<span style='color:red'>Invalid Login Details</span>";
    }
}