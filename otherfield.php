<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <style>
    #Add {
      display: none;
    }
  </style>
</head>
<body><nav>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a></nav><br />
  <?php
  session_start();
  if (!isset($_SESSION['ID'])) {
    header("Location: otherlogin.php");
  }
  $server = "localhost";
  $uname = "client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
  $sql = 'SELECT * FROM field WHERE GrowerID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  if (count($arr)>0) {
    echo '<table><tr><th>Field Name</th><th>Acres</th><th>County</th><th>Township</th><th>Section</th><th>Quarter</th><th>Tillage</th><th>Planting Date</th><th>Last Year\'s Crop</th><th>YearsCorn</th><th>Irrigated</th><th>Rotational</th><th>CropYear</th><th>CoverCrop</th><th>DateSeeded</th><th>How</th><th>Ncredits</th><th>HowKilled</th><th>DateKilled</th></tr>';
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].',\''.addslashes($val[2]).'\')">';
    foreach ($val as $key => $value) {
      if ($key > 1) {
        if ($key != 7 && $key != 19 && $key != 8 && $key <21) {
      echo '<td>'.$value.'</td>';}
      elseif ($key == 7) {
        if ($value == 0) {echo '<td>NE</td>';}
        if ($value == 1) {echo '<td>SE</td>';}
        if ($value == 2) {echo '<td>NW</td>';}
        if ($value == 3) {echo '<td>SW</td>';}
      }
      elseif ($key == 19) {
        if ($value == 0) {echo '<td>Chemical burn down</td>';}
        if ($value == 1) {echo '<td>Plowed or Disked under</td>';}
        if ($value == 2) {echo '<td>Harvested</td>';}
        if ($value == 3) {echo '<td>Other</td>';}
      }
      elseif ($key == 8) {
        if ($value == 0) {echo '<td>No Till</td>';}
        if ($value == 1) {echo '<td>Minimum Till</td>';}
        if ($value == 2) {echo '<td>Fall</td>';}
        if ($value == 3) {echo '<td>Spring</td>';}
        if ($value == 4) {echo '<td>Strip Till</td>';}
      }
    }
    }
    echo '</tr>';
  }
  echo '</table>';
  }
    if ($_POST['FieldName'] != "") {
    $sql = 'INSERT INTO  field (GrowerID ,  FieldName ,  Acres ,  County ,  Township ,  Section ,  Quarter ,  Tillage ,  Plantingdate,  LastYearCrop ,  YearsCorn ,  Irrigated ,  Rotational ,  CropYear ,  CoverCrop ,  DateSeeded ,  How ,  Ncredits ,  HowKilled ,  DateKilled, Last5, 8of10, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDGrower'], $_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Last5'], $_POST['8of10'], $_SESSION['ID']]);
    $_POST['FieldName'] = "";
    header("Location: otherfield.php");
    }
  ?>
  <div id="Grower">Active Field: </div><button onclick="location.href = 'editField.php'">Edit Field</button><button onclick="location.href = 'fertapps.php'">Add Fertilizer</button><button onclick="location.href = 'manure.php'">Add Manure</button><br />
  <button onclick="toggle()">Add Field</button><div id="Add">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="newspaper">
    <input type="text" name="FieldName"></input>
    <input type="number" name="Acres"></input>
    <input type="text"name="County"></input>
    <input type="text" name="Township"></input>
    <input type="text" name="Section"></input>
    Quarter:<input type="radio" name="Quarter" id="Quarter1" value="0"><label for="Quarter1">NE</label></input><input type="radio" name="Quarter" id="Quarter2" value="1"><label for="Quarter2">SE</label></input><input type="radio" name="Quarter" id="Quarter3" value="2"><label for="Quarter3">NW</label></input><input type="radio" name="Quarter" id="Quarter4" value="3"><label for="Quarter4">SW</label></input>
    Tillage<input type="radio" name="Tillage" id="Tillage1" value="0"><label for="Tillage1">No Till</label></input><input type="radio" name="Tillage" id="Tillage2" value="1"><label for="Tillage2">Minimum Till</label></input><input type="radio" name="Tillage" id="Tillage3" value="2"><label for="Tillage3">Fall</label></input><input type="radio" name="Tillage" id="Tillage4" value="3"><label for="Tillage4">Spring</label></input><input type="radio" name="Tillage" id="Tillage5" value="4"><label for="Tillage5">Strip Till</label></input>
    Planting Date:<input type="date" name="Plantingdate"></input>
    2019 Crop:<input type="text" name="LastYearCrop"></input>
    How Many Years Corn:<input type="number" name="YearsCorn"></input>
    Irrigated:<input type="text" name="Irrigated"></input>
    Rotational:<input type="text" name="Rotational"></input>
    Crop Year:<input type="number" name="CropYear"></input>
    Cover Crop:<input type="text" name="CoverCrop"></input>
    Date Seeded:<input type="date" name="DateSeeded"></input>
    How Was It Seeded:<input type="text" name="HowSeeded"></input>
    Ncredits:<input type="number" name="Ncredits"></input>
    How Was It Killed:<input type="radio" name="HowKilled" id="How1" value="0"><label for="How1">Chemical burn down</label></input><input type="radio" name="HowKilled" id="How2" value="1"><label for="How2">Plowed or Disked under</label></input><input type="radio" name="HowKilled" id="How3" value="2"><label for="How3">Harvested</label></input><input type="radio" name="HowKilled" id="How4" value="3"><label for="How4">Other</label></input>
    Date:<input type="date" name="DateKilled"></input>
    Number of years in the last 5 manure was applied:<input type="text" name="Last5"></input>
    Received manure 8 of last 10 years:<input type="radio" name="8of10" id="8of101" value="0"><label for="8of101">Yes</label></input><input type="radio" name="8of10" id="8of102" value="1"><label for="8of102">No</label></input><input type="radio" name="8of10" id="8of103" value="1"><label for="8of103">Don't Know</label></input>
    <input type="submit"></input></div>
  </form></div>

<script>
function edit(FieldID,ElementName) {
  document.cookie="PrimeIDField=" + FieldID;
  document.getElementById("Grower").innerHTML = "Active Field: " + decodeURI(ElementName);
  //location.href = "edit.php";
}
  var txtBox=document.getElementsByTagName("input");
  //alert(forms[0]); This is hhow you show a popup alert box
  for (var i = 0;i<txtBox.length;i++){
    txtBox[i].placeholder=txtBox[i].name.replace(/\B(?<![A-Z])[A-Z0-9]/g," $&");
  }
  function toggle() {
    var x = document.getElementById("Add");
      if(x.style.display=="inline-block") {
        x.style.display="none";
      }
      else if(x.style.display=="none" || x.style.display=="") {
        x.style.display="inline-block";
      }
  }
</script>
</body>
</html>
