<?php
session_start();


if(!empty($_POST)){
    $town1 = $_POST['t1'];
    $town2 = $_POST['t2'];

    //CACHE START

    include __DIR__ . '/Cache.php';
    $DATA = new Cache;
    $answer = $DATA->get();
    $_SESSION['method'] = false === $answer ? 'API' : 'CATCHE';
    if (false === $answer) {

    //API START
    
    $ch = curl_init();//object-resource
    curl_setopt(
    $ch, CURLOPT_URL, 
    'https://www.distance24.org/route.json?stops='.$town1.'|'.$town2
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $answer = curl_exec($ch); // send and wait for answer(till no answ - nothing below works)
    $answer = json_decode($answer); //from json

    $DATA->set($answer); // <---- cache new data


    //API END
    }
    $_SESSION['distance'] = $answer->distance;
    $_SESSION['town1'] = $town1;
    $_SESSION['town2'] = $town2;
    $_SESSION['img1'] = $answer->stops[0]->wikipedia->image;
    $_SESSION['img2'] = $answer->stops[1]->wikipedia->image;
    header('Location: http://localhost/try/php/Distance/index.php');
    die;
}

if(isset($_SESSION['distance'])){
    $distance = $_SESSION['distance'];
    $town1 = $_SESSION['town1'];
    $town2 = $_SESSION['town2'];
    $img1 = $_SESSION['img1'];
    $img2 = $_SESSION['img2'];
    $method = $_SESSION['method'];
    unset($_SESSION['distance'], $_SESSION['town1'], $_SESSION['town2'], $_SESSION['img1'], $_SESSION['img2'], $_SESSION['method']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distances</title>
</head>
<body>
<h2>API distance</h2>
    <form action="" method="post">
    <lable for="b2">City 1:<input type="text" name="t1" value="<?= $town1 ?? ''?>"></lable>
    <lable for="b2">City 2:<input type="text" name="t2" value="<?= $town2 ?? ''?>"></lable>
    <button type="submit">Get distance</button>
    </form>

    <?php if(isset($distance)): ?>
    <h2> Method: <?= $method ?> </h2>
    <h2>The distance is <?= $distance?> km </h2>
    <img style="width: 100px;" src="<?= $img1 ?? '' ?>">
    <img style="width: 100px;" src="<?= $img2 ?? '' ?>">
    <?php endif ?>
</body>
</html>

<!-- для чего нужен курл -->