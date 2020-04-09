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
INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)
?>
