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
    Choose LstChem: <input type="file" name="imfile" accept=".xml" id="imfile"></input><br>
    Choose LstChemCost: <input type="file" name="imfile2" accept=".xml" id="imfile2"></input><br>
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
  if (isset($_FILES["imfile"]) && isset($_FILES["imfile2"])) {
  $data = simplexml_load_file($_FILES["imfile"]["tmp_name"]);
  $cost = simplexml_load_file($_FILES["imfile2"]["tmp_name"]);
  $sql = "INSERT INTO chemicals (Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive, UserID) Values (?,?,?,?,?,?,?)";
  $stmt = $connection->prepare($sql);
  $sequel = "INSERT INTO chemicalyears (DateFrom, DateTo, Price, CropGroup, UserID) Values (?,?,?,?,?)";
  $statement = $connection->prepare($sequel);
  for ($i = 0; $i < count($data->LstChem); $i++) {
    $stmt->execute([$data->LstChem[$i]->ChemName, $data->LstChem[$i]->EnteredUnits, $data->LstChem[$i]->PurchasedUnits, $data->LstChem[$i]->Ratio, $data->LstChem[$i]->ShowOnReport, $data->LstChem[$i]->Active, $_SESSION['ID']]);
    $LastID = $connection->lastInsertId();
   for ($m = 0; $m < count($cost->LstChemCost); $m++) {
      if (get_object_vars($data->LstChem[$i]->ChemId)[0] == get_object_vars($cost->LstChemCost[$m]->ChemId)[0]) {
        $statement->execute([$cost->LstChemCost[$m]->StartDate, $cost->LstChemCost[$m]->EndDate, $cost->LstChemCost[$m]->Cost, $LastID, $_SESSION['ID']]);
      }
    }
  }
  header("Location: chemicals.php");
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
