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
    <input type="file" name="imfile" id="imfile"></input>
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
  if (isset($_FILES["imfile"])) {
  $data = simplexml_load_file($_FILES["imfile"]["tmp_name"]);
  $sql = "INSERT INTO fields (FarmName, FieldName, Acres, FSA_Farm, FSA_Tract, FSA_Field, FSA_Area, InsuranceID, County, Township, FarmRange, Section, Legal, Watershed, Restriction, Slope, TRating, Location, PID, TicketTrackID, AutoSteerHeading, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = $connection->prepare($sql);
  for ($i = 0; $i < count($data->Field); $i++) {
    $stmt->execute([$data->Field[$i]->FarmNumber, $data->Field[$i]->FieldName, $data->Field[$i]->Acres, $data->Field[$i]->FSA_Farm, $data->Field[$i]->FSA_Tract, $data->Field[$i]->FSA_Field, $data->Field[$i]->FSA_Area, $data->Field[$i]->InsuranceID, $data->Field[$i]->County, $data->Field[$i]->Township, $data->Field[$i]->FarmRange, $data->Field[$i]->Section, $data->Field[$i]->Legal, $data->Field[$i]->Watershed, $data->Field[$i]->Restriction, $data->Field[$i]->Slope, $data->Field[$i]->TRating, $data->Field[$i]->Location, $data->Field[$i]->PID, $data->Field[$i]->TicketTrackID, $data->Field[$i]->AutoSteerHeading, $data->Field[$i]->Active, $_SESSION['ID']]);
  }
  header("Location: fields.php");
}
  ?>
  <script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "account";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
