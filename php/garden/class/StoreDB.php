<?php

namespace Garden; 
use PDO;
use Garden\Strawberry;
use Garden\Blueberry;

class StoreDB implements Store{

    private $pdo;
    private $fileName;

    public function __construct($o = null){
   
        $host = '127.0.0.1';
        $db   = 'berries_baze';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getAll(){
        //READ FROM DB
        $sql = "SELECT * FROM products
        ;";
        $stmt = $this->pdo->query($sql); // <---safe way
        $USD = API::currencyAPI();
        $array = [];
        while ($row = $stmt->fetch())
        {
            if ('blueberry' == $row['name']) {
                $obj = new Blueberry($row['id'], $USD);
            }
            if ('strawberry' == $row['name']) {
                $obj = new Strawberry($row['id'], $USD);
            }
            $obj->berriesAmount = $row['berries'];
            $obj->bushID = $row['id'];
            $obj->imgPath = $row['img'];
            $obj->price = $row['price'];
            $obj->toGrow = $row['grow'];
            $obj->name = $row['name'];
            $array[] = $obj;
        }
        return $array;
    }

    public function getNewId(){
        return 2;
    }

    public function saveNewObject($obj){
        if($obj->name == 'strawberry'){  
            $sql = "INSERT INTO products (`berries`, `name`, `img`,	`grow`,	`price`, `priceusd`)
            VALUES ('".$obj->berriesAmount."', '".$obj->name."' , '".$obj->imgPath."', '".$obj->toGrow."', '".$obj->price."',  '".$obj->priceUSD."');";
            
        }
        if($obj->name == 'blueberry'){  
            $sql = "INSERT INTO products (`berries`, `name`, `img`,	`grow`,	`price`, `priceusd`)
            VALUES ('$obj->berriesAmount', '$obj->name' , '$obj->imgPath', '$obj->toGrow', '$obj->price',  '$obj->priceUSD');";
        }
        $this->pdo->query($sql); // <--- redo(not safe)!!!!!!!!! 
      
    }

    public function deleteObject($id) {
        $sql = "DELETE FROM products
        WHERE id='".$id."';";
        $this->pdo->query($sql); // <--- redo(not safe)!!!!!!!!!
    }  

    //METHOD THAT GROWS BERRIES ON BUSHES 
    public function grow(){
       $array = self::getAll();
        _d($array, 'growing');
        foreach($array as $index => $berry){
            $howMuch = $berry->berriesAmount + $berry->toGrow;
            $sql = "UPDATE products
            SET berries = $howMuch
            WHERE products.id = $berry->bushID";
            _d($sql, 'adadasd');
            $this->pdo->query($sql);
        }
      
    }
}