<html>
<head>
    <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
</head>
<body><div class="newspaper">
  <form method="post" action="adminphp.php">
<?php
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Passterm";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){}
$sql = "SELECT mode FROM users WHERE ID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo 'Admin Mode:<input type="checkbox" name="admin" '; if($arr[0]==1) {echo 'checked';} echo '></input><input type="submit"></input></form></div>';
?>
<script>
</script>
</body>
</html>
