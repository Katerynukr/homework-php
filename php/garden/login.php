<?php
session_start();

/*if logout button was used change value of logged session to 0*/
if (isset($_GET['logout'])) {
    $_SESSION['logged'] = 0;
    header('Location: http://localhost/try/php/strawberry/login.php');
    die;
}

/*is sign up button is pressed*/ 
if(isset($_POST['SignUp'])){
    header('Location: http://localhost/try/php/strawberry/signUp.php');
    die;
}

/*checking is a user alredy logged in*/ 
if (isset($_SESSION['logged']) && 1 == $_SESSION['logged']) {
    die('You are already logged in');
}

/*if button login was pressed*/
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $data = json_decode(file_get_contents('data.json'), 1);
    foreach($data as $user) {
        if (($_POST['name'] ?? '') === $user['name'] &&
            ($_POST['pass'] ?? '') === $user['pass']
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

/*checking does error message exist and if does deleate it */
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
<style>
body{
        background-color: #FFDAB9;
    }
        .main{
            display: inline-block;
            width: 800px;
            margin-left: calc( (100% - 800px) / 2 );
            padding: 50px;
            border: 15px solid #fff7f1;
            border-radius:20px;
            margin-top: 5%;
        }
            .text,
            .text1{
                width: 800px;
                margin-left: calc( (100% - 800px) / 2 );
                font-size:30px;
                color: #ccae94;
                text-shadow: 2px 0 0 #fff5ec;
                font-weight: bold;
                text-align:center;
            }
            .text1{
                width:500px;
                margin-left: calc( (100% - 500px) / 2 );
                margin-top:20px;
            }
            form{
                font-size:30px;
                color: #ccae94;
                text-shadow: 2px 0 0 #fff5ec;
                font-weight: bold;
                text-align:center;
            }
                .btn{
                    width:150px;
                    margin-top: 10px;
                    background-color:#ccae94;
                    border: 2px solid #b29881;
                    padding: 25px;
                    font-size: 20px;
                    font-weight: bold;
                    color: #fff7f1;
                    border-radius:20px;
                    outline: 0 solid #b29881;
                }
                .btn:hover{
                    background-color:#fff7f1;
                    color: #ccae94;
                }
                
</style>
<body>
<div class="text1">To login you can use username: Kateryna and password: 202cb962ac59075b964b07152d234b70.</div>
<div class="main">
    <div class="text"><?= $msg ?? '' ?></div>
    <form action="" method="POST">
        Name:<br>
        <input type="text" name="name" value="">
        <br>
        Password:<br>
        <input type="password" name="pass" value="">
        <br><br>
        <input class="btn" type="submit" value="Login">
        <input class="btn" type="submit" value="SignUp">
    </form>
</div>
</body>
</html>