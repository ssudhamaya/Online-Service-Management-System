<?php

$hostDetails = 'mysql:host=127.0.0.1; dbname=maintain; charset=utf8mb4';
$userAdmin = 'root';
$pass = '';

try{
    $pdo = new PDO($hostDetails,$userAdmin,$pass);
} catch(PDOException $e){
    echo 'Connection error!' . $e->getMessage();
}

?>
