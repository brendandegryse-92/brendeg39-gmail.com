<!DOCTYPE html>
<meta name="description" content="Account Information">
<html>
<title>Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
<h2>Need Help?</h2>
<h3>Phone: <a href="tel:419-212-0479">(419) 212-0479</a></h3>
<h3>Email: <a href="mailto:mcguire9@gmail.com"> mcguire9@gmail.com</a></h3>
<h3>How do I import my data from the old program?</h3>
<p>To import your data from the desktop program, export it from the old program as an XML. For example, if you wish to import Operators from the desktop program, right click Operators, select Export->XML File. Then go to Operators on the website, hit the import button, and select the XML file you exported.</p>
<script type="text/javascript" src="headjs.js"></script>
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
$sql = "SELECT ExpireDate FROM users WHERE UserID = ?";
$statement = $connection->prepare($sql);
$statement->execute([$_SESSION['ID']]);
$arr = $statement->fetch(PDO::FETCH_NUM);
echo '<h3>Account expires on '.$arr[0].'</h3>';
?>
<script>
highlight();
function highlight() {
var x = "accountelem";
try {
document.getElementById(x).className += " activeNav";
  }
catch(err) {window.setTimeout(highlight, 100);
    }
}
</script>
</body>
</HTML>
