<?php
$host = '127.0.0.1';
$db   = 'class_work';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

//READING
//$sql ="SELECT users_info.birthPlace, users_names.name, users_names.surname
$sql ="ALTER TABLE users_info
ADD FOREIGN KEY (userId) REFERENCES users_names(id);";
$stmt = $pdo->query($sql); // <--- steitmentas

// $masyvas = [];
// while ($row = $stmt->fetch())
// {
//     $masyvas[] = $row;
// }


// _d($masyvas);