<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #7.9 </title>
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
Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) 
checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų 
į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek). 
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
Number of checkboxes that were pressed: <?= count($_POST['letters'] ?? [])?>
<?php endif ?>
</body>
