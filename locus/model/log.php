<?php
$host = 'localhost';
$database = 'locus_aia';
$user = 'root';
$pass = '';
$dsn = sprintf("mysql:host=%s;dbname=%s;",$host,$database);
$option = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try{
    $pdo = new PDO($dsn,$user,$pass,$option);
}catch (\PDOException $e){

    throw new \PDOEception($e->getMessage(),(int)$e->getCode());

}

?>