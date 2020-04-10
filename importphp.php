<?php
session_start();
$server = "localhost";
$uname = "client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
$xml = simplexml_load_file($_FILES["imfile"]["tmp_name"]);
var_dump($xml);
echo $xml;
echo $xml->OpLastName;
//INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)
?>
