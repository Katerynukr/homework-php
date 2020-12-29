<?php
if(isset($_GET['color'])){
    if(1 == $_GET['color']){
        $backgroundColor = '#ff0000';
    } elseif(2 == $_GET['color']){
        $backgroundColor = '#0000ff';
    } else {
        $backgroundColor = '#000';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW1</title>
</head>
<style>
body {
    background: <?= $backgroundColor ?>;
}
body a {
    color: #777;
}
</style>
<body>
    
    <a href="http://localhost/try/php/homework7/homework7.1.correction.php?color=1">MAKE RED</a>
    <a href="http://localhost/try/php/homework7/homework7.1.correction.php?color=2">MAKE BLUE</a>
    <a href="http://localhost/try/php/homework7/homework7.1.correction.php">MAKE BLACK</a>

</body>
</html>