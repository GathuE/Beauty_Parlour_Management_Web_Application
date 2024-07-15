<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sensational_beauty_parlour";
$results_per_page = 10; // number of results per page

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Ooops!----Connection Failure : ". $e->getMessage();
}
