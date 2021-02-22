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
// $sql = "SELECT COUNT( DISTINCT Country ) AS \"number of countires\" FROM `clients`;";

//  $sql = "SELECT * FROM clients WHERE CustomerID IN (3 , 4);";
// $sql = "SELECT * FROM clients WHERE CustomerID BETWEEN 3 AND 4;";
//$sql = "SELECT * FROM clients WHERE Country = 'USA' OR Country = 'Finland';"; //both if both exist

// $sql = "SELECT * FROM clients ORDER BY CustomerName DESC;";

// $sql = "INSERT INTO clients(CustomerName, Address, City, PostalCode, Country) 
// VALUES ('Kateryna', 'Kalberiju 294', 'Vilnius', 8318, 'Lithuania');"; //writing new line


// $sql = "UPDATE clients SET `Address` = NULL WHERE CustomerName = 'Eimantas';";
// $sql = "SELECT * FROM clients WHERE Country = 'Lithuania' AND Address IS NULL"; // in default set null

// $sql = "UPDATE clients SET City = 'unknown' WHERE CustomerName = 'Iren';";

// $sql = "UPDATE clients SET PostalCode = 1566 WHERE CustomerID <=5 ;";

// $sql = "DELETE FROM clients  WHERE CustomerID = 9;";

// $sql = "SELECT City, CustomerName FROM clients WHERE CustomerID >= 5 LIMIT 5;";

// $sql = "SELECT MAX(CUSTOMERID) FROM clients;";

// $sql  = "SELECT COUNT(Address) FROM clients;";

//$sql = "SELECT * FROM clients WHERE CustomerName LIKE '_a%';"; //where clients name second letter is a

//$sql = "SELECT CustomerName AS Name FROM clients ;"; //prints customer's name as Name

//$sql = "SELECT* FROM clients GROUP BY Country;"; // prints unique cities with clients

$sql = "SELECT * FROM clients GROUP BY CustomerName HAVING CustomerID > 3;";

$stmt = $pdo->query($sql); // <--- steitmentas

$dataTable = [];
while ($row = $stmt->fetch())
{
    $dataTable[] = $row;
}

// _d($dataTable);