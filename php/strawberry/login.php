<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION['logged'] = 0;
    header('Location: http://localhost/try/php/strawberry/login.php');
    die;
}

if (isset($_SESSION['logged']) && 1 == $_SESSION['logged']) {
    die('Tu prisijunges eik is cia!');
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $data = json_decode(file_get_contents('data.json'), 1);
    foreach($data as $user) {
        if (($_POST['name'] ?? '') === $user['name'] &&
            md5($_POST['pass'] ?? '') === $user['pass']
        ) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['logged'] = 1;
            header('Location: http://localhost/try/php/strawberry/planting.php');
            die;
        }
    }
    $_SESSION['msg'] = 'Incorrect name or password';
    header('Location: http://localhost/try/php/strawberry/login.php');
    die;
}

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<div><?= $msg ?? '' ?></div>
    <form action="" method="POST">
        Name:<br>
        <input type="text" name="name" value="">
        <br>
        Password:<br>
        <input type="password" name="pass" value="">
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>