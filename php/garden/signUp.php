<?php
if(isset($_POST['SignUp'])){
    if($_POST['name'] !== '' && $_POST['name'] )
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="text"><?= $msg ?? '' ?></div>
        <form action="" method="POST">
            Name:<br>
            <input type="text" name="name" value="">
            <br>
            Email:<br>
            <input type="text" name="email" value="">
            <br>
            Password:<br>
            <input type="password" name="pass" value="">
            <br>
            <input class="btn" type="submit" value="SignUp">
        </form>
    </div> 
</body>
</html>