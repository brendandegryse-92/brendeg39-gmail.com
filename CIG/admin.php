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
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){}
$sql = "SELECT AccountType FROM users WHERE ID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo $arr[0];
echo 'Admin Mode:<input type="radio" id="On" name="admin" value="On" '; if($arr[0]=="Admin") {echo 'selected';} echo '><label for="On">On</label></input><input type="radio" id="Off" name="admin" value="Off" '; if($arr[0]=="") {echo 'selected';} echo '>
<label for="Off">Off</label>
<input type="submit"></input></form></div>';
?>
<script>
</script>
</body>
</html>
