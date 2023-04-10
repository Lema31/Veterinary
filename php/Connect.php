<?php
	
$link = 'mysql:host=localhost;dbname=db_veterinaria_sivemar';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($link, $user, $pass);

    //foreach ($pdo->query('Select * from `customer`') as $row) {
    //	print_r($row);
    }

 catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
