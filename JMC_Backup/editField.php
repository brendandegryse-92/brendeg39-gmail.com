<?php
session_start();
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
  if (isset($_POST['FieldName'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM field WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: otherfield.php");
  }
  else {
  $sql = 'UPDATE field SET FieldName = ?,  Acres = ?,  County = ?,  Township = ?,  Section = ?,  Quarter = ?,  Tillage = ?,  Plantingdate = ?,  LastYearCrop = ?,  YearsCorn = ?,  Irrigated = ?,  Rotational = ?,  CropYear = ?,  CoverCrop = ?,  DateSeeded = ?,  How = ?,  Ncredits = ?,  HowKilled = ?,  DateKilled = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Notes'], $_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  header("Location: otherfield.php");
  }
}
?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="http://upgradeag.com/CIG/img/favicon.ico">
  <style>

      .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: lightgray;
        overflow-x: hidden;
        padding-top: 20px;
      }

      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: Black;
        display: block;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .main {
        margin-left: 200px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }

      table{
        background-color: gray;
      }
      th{
        background-color: lightgray;
        border: 1px solid black;
        margin: 8px;
      }
      tr{
        background-color: lightgray;
        border: 1px dotted black;
        border-style:dotted;
      }
      td{
        cursor: pointer;
        border: 1px dotted black;
        border-style:dotted;
      }
  </style>
</head>
<body>

<div class="sidenav">
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
</div>

<div class="main">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
$sql = 'SELECT * FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  <table>
    <tr>
      <td>
        <label for="FieldName">Field Name:</label>
      </td>
      <td>
        <input type="text" value="'.$arr[2].'" name="FieldName"></input>
      </td>
      <td>
        <label for="Tillage">Tillage Detial:</label>
      </td>
      <td>
        <select name="Tillage" id="Tillage1">
            <option value="5"></option>
            <option value="0">No Till</option>
            <option value="1">Minimum Till</option>
            <option value="2">Fall</option>
            <option value="3">Spring</option>
            <option value="4">Strip Till</option>
        </select>
      </td>
      <td>
        <label for="Rotational">Rotational N Credit:</label>
      </td>
      <td>
        <input type="text" value="'.$arr[13].'" name="Rotational"></input>
      </td>
    </tr>
  </table>

<BR><BR><BR>

  <p><label for="FieldName">Field Name:</label>
  <span><input type="text" value="'.$arr[2].'" name="FieldName"></input></span></p>
  <p><label for="Acres">Acres:</label>
  <span><input type="number" value="'.$arr[3].'" name="Acres"></input></span></p>
  <p><label for="County">County:</label>
  <span><input type="text" value="'.$arr[4].'" name="County"></input></span></p>
  <p><label for="Township">Township:</label>
  <span><input type="text" value="'.$arr[5].'" name="Township"></input></span></p>
  <p><label for="Section">Section:</label>
  <span><input type="text" value="'.$arr[6].'" name="Section"></input><br /></span></p>

  Quarter:<input type="radio" name="Quarter" id="Quarter1" value="0"'; if ($arr[7] == 0) {echo ' checked';} echo '><label for="Quarter1">NE</label></input><input type="radio" name="Quarter" id="Quarter2" value="1"'; if ($arr[7] == 1) {echo ' checked';} echo '><label for="Quarter2">SE</label></input>
  <input type="radio" name="Quarter" id="Quarter3" value="2"'; if ($arr[7] == 2) {echo ' checked';} echo '><label for="Quarter3">NW</label></input><input type="radio" name="Quarter" id="Quarter4" value="3"'; if ($arr[7] == 3) {echo ' checked';} echo '><label for="Quarter4">SW</label></input>
  <br />Tillage:<input type="radio" name="Tillage" id="Tillage1" value="0"'; if ($arr[8] == 0) {echo ' checked';} echo '><label for="Tillage1">No Till</label></input><input type="radio" name="Tillage" id="Tillage2" value="1"'; if ($arr[8] == 1) {echo ' checked';} echo '><label for="Tillage2">Minimum Till</label></input>
  <input type="radio" name="Tillage" id="Tillage3" value="2"'; if ($arr[8] == 2) {echo ' checked';} echo '><label for="Tillage3">Fall</label></input><input type="radio" name="Tillage" id="Tillage4" value="3"'; if ($arr[8] == 3) {echo ' checked';} echo '><label for="Tillage4">Spring</label></input><input type="radio" name="Tillage" id="Tillage5" value="4"'; if ($arr[8] == 4) {echo ' checked';} echo '><label for="Tillage5">Strip Till</label></input>
  <br />Planting Date:<input type="date" value="'.$arr[9].'" name="Plantingdate"></input>
  <dl>
  <dt><label for="LastYearCrop">Last Year Crop:</label></dt>
  <dd><span><input type="text" value="'.$arr[10].'" name="LastYearCrop"></input></span></dd>
  </dl>
  How Many Years Corn:<input type="number" value="'.$arr[11].'" name="YearsCorn"></input>
  Irrigated:<input type="number" value="'.$arr[12].'" name="Irrigated"></input>
  Rotational:<input type="text" value="'.$arr[13].'" name="Rotational"></input>
  Crop Year:<input type="number" value="'.$arr[14].'" name="CropYear"></input>
  Cover Crop:<input type="text" value="'.$arr[15].'" name="CoverCrop"></input>
  Date Seeded:<input type="date" value="'.$arr[16].'" name="DateSeeded"></input>
  How Was It Seeded:<input type="text" value="'.$arr[17].'" name="HowSeeded"></input>
  Ncredits:<input type="number" value="'.$arr[18].'" name="Ncredits"></input><br />
  How Was It Killed:<input type="radio" name="HowKilled" id="How1" value="0"'; if ($arr[19] == 0) {echo ' checked';} echo '><label for="How1">Chemical burn down</label></input><input type="radio" name="HowKilled" id="How2" value="1"'; if ($arr[19] == 1) {echo ' checked';} echo '><label for="How2">Plowed or Disked under</label></input>
  <input type="radio" name="HowKilled" id="How3" value="2"'; if ($arr[19] == 2) {echo ' checked';} echo '><label for="How3">Harvested</label></input><input type="radio" name="HowKilled" id="How4" value="3"'; if ($arr[19] == 3) {echo ' checked';} echo '><label for="How4">Other</label></input>
  <br />Date:<input type="date" value="'.$arr[20].'" name="DateKilled"></input>
  Number of years in the last 5 manure was applied:<input type="text" value="'.$arr[22].'" name="Last5"></input><br />
  Received manure 8 of last 10 years:<input type="radio" name="8of10" id="8of101" value="0"'; if ($arr[23] == 0) {echo ' checked';} echo '><label for="8of101">Yes</label></input><input type="radio" name="8of10" id="8of102" value="1"'; if ($arr[23] == 1) {echo ' checked';} echo '><label for="8of102">No</label></input>
  <br /><input type="radio" name="8of10" id="8of103" value="2"'; if ($arr[23] == 2) {echo ' checked';} echo '><label for="8of103">Don\'t Know</label></input><br />
    Notes:<input type="text" value="'.$arr[24].'" name="Notes"></input>
  <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
</form></div><a href="manure.php">Manure</a><br><a href="fertapps.php">Fertilizer Applications</a>';
?>
<script>
</script>
</body>
</html>
