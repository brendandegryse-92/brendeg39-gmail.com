<html>
<title>import</title>
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
  $sql = "INSERT INTO farms (Owner, FarmName, CropLand, FSA_Farm, FSA_Tract, InsuranceID, County, Description, RentType, PID, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = $connection->prepare($sql);
  for ($i = 0; $i < count($data->Farm); $i++) {
    $stmt->execute([$data->Farm[$i]->Owner, $data->Farm[$i]->FarmName,$data->Farm[$i]->CropLand, $data->Farm[$i]->FSA_Farm, $data->Farm[$i]->FSA_Tract, $data->Farm[$i]->InsuranceID, $data->Farm[$i]->County, $data->Farm[$i]->Description, $data->Farm[$i]->RentType, $data->Farm[$i]->PID, $data->Farm[$i]->Active, $_SESSION['ID']]);
  }
  header("Location: farms.php");
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
