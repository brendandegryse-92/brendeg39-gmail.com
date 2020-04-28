<!DOCTYPE html>
<meta name="description" content="Import Operators">
<html>
<title>Import</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  input {
      border-radius: 20px;
      border-width: 1.5px;
      border-style: solid;
      border-color: #3d3c38;
      background-color: white;
      font-size: 100%;
      width: 20%;
      font-family: 'Abel';
      z-index: 0;
  }
  </style>
</head>
<body>
  <div include="head.html"></div>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
    <input type="file" name="imfile" accept=".xml" id="imfile"></input>
    <input type="submit" class="buttons"></input>
  </form>
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
  $sql = "SELECT accountType FROM users WHERE UserID = ?";
  $statement = $connection->prepare($sql);
  $statement->execute([$_SESSION['ID']]);
  $arr = $statement->fetch(PDO::FETCH_NUM);
  if ($arr[0] == "active") {
  if (isset($_FILES["imfile"])) {
  $data = simplexml_load_file($_FILES["imfile"]["tmp_name"]);
  $sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
  $stmt = $connection->prepare($sql);
  for ($i = 0; $i < count($data->Operator); $i++) {
    $stmt->execute([$data->Operator[$i]->OpFirstName.' '.$data->Operator[$i]->OpLastName, $data->Operator[$i]->OpAddress, $data->Operator[$i]->OpCity, $data->Operator[$i]->OpState, $data->Operator[$i]->OpZip, $data->Operator[$i]->OpPhone, $data->Operator[$i]->Active, $_SESSION['ID']]);
  }
  header("Location: operators.php");
}
}
else {
echo 'Account not active, cannot import';
}
  ?>
  <script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "account";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
