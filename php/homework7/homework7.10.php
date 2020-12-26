<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #7.10 </title>
</head>
<style>
body {
    <?php if($_SERVER['REQUEST_METHOD'] === 'GET'):?>
    background-color: black;
    color:white;
    <?php else: ?>
    background-color: white;
    color:black;
    <?php endif ?>
}
</style>
<body>
<p>
Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. 
Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota. 
</p>
<?php if($_SERVER['REQUEST_METHOD'] === 'GET'):?>
    <form action="" method="post">
        <?php $till = rand(3, 10)?>
        <?php foreach(range('A', 'K') as $index => $letter):?>
        <?php if($index == $till) break; ?>
        <input type="checkbox" name="letters[]"><lable><?= $letter?></lable>
    <?php endforeach ?>
    <input type="hidden" name="max" value="<?= $till?>">
    <button type="submit" name="submit">Submit</button>
<?php endif ?>
<?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
Number of checkboxes that were pressed: <?= count($_POST['letters'] ?? [])?> from <?= $_POST['max']?>
<?php endif ?>
</body>
