<?php
  session_start();
  if (!isset($_SESSION['ID'])) {
    header("Location: otherlogin.php");
  }
  ?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
  <style>
    #Add {
      display: none;
    }

  </style>
</head>
<body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
  <div class="indented"><a onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'editField.php';}">Edit Field</a><br />
    <a onclick="toggle()" href="#Add">Add Field</a>
</div><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'fertapps.php';}">Add Fertilizer</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'manure.php';}">Add Manure</a><br />
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.png" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.png" />
</nav><br /><div class="main">
    <h1>All fields for <?php
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
    $sql = 'SELECT FirstName FROM grower WHERE ID = ?';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDGrower']]);
    echo $stmt->fetch(PDO::FETCH_NUM)[0]; ?>:</h1>
  <?php
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'SELECT * FROM field WHERE GrowerID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDGrower']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);}
  else {
  $sql = 'SELECT * FROM field WHERE GrowerID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);}
  if (count($arr)>0) {
    echo '<b><span class="active">Active Field: </span><tag style="color: green;" id="Field"></span></tag> </b><table><tr><th>Field Name</th><th>Project Field Name</th><th>Product Name</th><th>Acres</th><th>County</th><th>Township</th><th>Section</th><th>Quarter</th><th>Tillage</th><th>Planting Date</th><th>Last Year\'s Crop</th><th>YearsCorn</th><th>Irrigated</th><th>Rotational</th><th>CropYear</th><th>CoverCrop</th><th>DateSeeded</th><th>How</th><th>Ncredits</th><th>HowKilled</th><th>DateKilled</th></tr>';
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].',\''.addslashes($val[2]).'\')">';
    foreach ($val as $key => $value) {
      if ($key > 1) {
        if ($key != 9 && $key != 21 && $key != 10 && $key <23) {
      echo '<td>'.$value.'</td>';}
      elseif ($key == 9) {
        if ($value == 0) {echo '<td>NE</td>';}
        elseif ($value == 1) {echo '<td>SE</td>';}
        elseif ($value == 2) {echo '<td>NW</td>';}
        elseif ($value == 3) {echo '<td>SW</td>';}
        else {echo '<td></td>';}
      }
      elseif ($key == 21) {
        if ($value == 0) {echo '<td>Chemical burn down</td>';}
        elseif ($value == 1) {echo '<td>Plowed or Disked under</td>';}
        elseif ($value == 2) {echo '<td>Harvested</td>';}
        elseif ($value == 3) {echo '<td>Other</td>';}
        else {echo '<td></td>';}
      }
      elseif ($key == 10) {
        if ($value == 0) {echo '<td>No Till</td>';}
        elseif ($value == 1) {echo '<td>Minimum Till</td>';}
        elseif ($value == 2) {echo '<td>Fall</td>';}
        elseif ($value == 3) {echo '<td>Spring</td>';}
        elseif ($value == 4) {echo '<td>Strip Till</td>';}
        else {echo '<td></td>';}
      }
    }
    }
    echo '</tr>';
  }
  echo '</table>';
  }
    if ($_POST['FieldName'] != "") {
    $sql = 'INSERT INTO  field (GrowerID ,  FieldName ,  Acres ,  County ,  Township ,  Section ,  Quarter ,  Tillage ,  Plantingdate,  LastYearCrop ,  YearsCorn ,  Irrigated ,  Rotational ,  CropYear ,  CoverCrop ,  DateSeeded ,  How ,  Ncredits ,  HowKilled ,  DateKilled, Last5, 8of10, ProjectFieldName, ProductName, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDGrower'], $_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Last5'], $_POST['8of10'], $_POST['ProjectFieldName'], $_POST['ProductName'], $_SESSION['ID']]);
    $_POST['FieldName'] = "";
    header("Location: otherfield.php");
    }
  ?><div id="Add">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="newspaper">

        <input type="text" name="FieldName"></input>
        <input type="text" name="ProjectFieldName"></input>
        <input type="text" name="ProductName"></input>
        <input type="number" name="Acres"></input>
        <input type="text"name="County"></input>
        <input type="text" name="Township"></input>
        <input type="text" name="Section"></input>

      <p>
        <label for="Quarter">Quarter Section:</label>
        <span><select name="Quarter" id="Quarter1">
            <option name="Quarter" id="Quarter5" value="4"></option>
            <option name="Quarter" id="Quarter1" value="0">NE</option>
            <option name="Quarter" id="Quarter2" value="1">SE</option>
            <option name="Quarter" id="Quarter3" value="2">NW</option>
            <option name="Quarter" id="Quarter4" value="3">SW</option>
        </select></span>
      </p>
      <p>
        <label for="Tillage">Tillage Detial:</label>
        <span><select name="Tillage" id="Tillage1">
            <option value="5"></option>
            <option value="0">No Till</option>
            <option value="1">Minimum Till</option>
            <option value="2">Fall</option>
            <option value="3">Spring</option>
            <option value="4">Strip Till</option>
        </select></span>
      </p>

<!-- //
        <div>
          <hr>
          <dl>
            <dt>Quarter Section</dt>
          </dl>
          <input type="radio" name="Quarter" id="Quarter1" value="0"><label for="Quarter1">NE</label></input>
          <input type="radio" name="Quarter" id="Quarter2" value="1"><label for="Quarter2">SE</label></input>
          <input type="radio" name="Quarter" id="Quarter3" value="2"><label for="Quarter3">NW</label></input>
          <input type="radio" name="Quarter" id="Quarter4" value="3"><label for="Quarter4">SW</label></input>
          <hr>
        </div>
      </Br>
        <div>
        <hr>
        <dl>
          <dt>Tillage Detial</dt>
        </dl>
        <input type="radio" name="Tillage" id="Tillage1" value="0"><label for="Tillage1">No Till</label></input>
        <input type="radio" name="Tillage" id="Tillage2" value="1"><label for="Tillage2">Minimum Till</label></input>
        <input type="radio" name="Tillage" id="Tillage3" value="2"><label for="Tillage3">Fall</label></input>
        <input type="radio" name="Tillage" id="Tillage4" value="3"><label for="Tillage4">Spring</label></input>
        <input type="radio" name="Tillage" id="Tillage5" value="4"><label for="Tillage5">Strip Till</label></input>
        <hr>
        </div>
// -->
        <label for="Plantingdate">Planting Date:</label>
        <span><input type="date" name="Plantingdate"</input></span>
        <input type="text" name="LastYearCrop"></input>
        <input type="number" name="YearsCorn"></input>
        <input type="text" name="Irrigated"></input>

        <label for="Rotational">Rotational N Credit:</label>
        <span><input type="text" name="Rotational"></input></span>
        <p>
        <label for="CropYear">Rotational N Credit Year:</label>
        <span><input type="number" name="CropYear"></input></span>
        </p>

        <input type="text" name="CoverCrop"></input>
        <label for="DateSeeded">Date Cover Seeded:</label>
        <span><input type="date" name="DateSeeded"></input></span>
        <input type="text" name="HowSeeded"></input>
        <input type="number" name="Ncredits"></input>

        <label for="HowKilled">Cover Crop Termination:</label>
        <span><select name="HowKilled">
            <option name="HowKilled" id="How5" value="4"></option>
            <option name="HowKilled" id="How1" value="0">Chemical</option>
            <option name="HowKilled" id="How2" value="1">Tillage</option>
            <option name="HowKilled" id="How3" value="2">Harvested</option>
            <option name="HowKilled" id="How4" value="3">Other</option>
        </select></span>
        <Br />

<!-- //
        <div>
        <hr>
        <dl>
          <dt>CC Termination</dt>
        </dl>
        <input type="radio" name="HowKilled" id="How1" value="0"><label for="How1">Chemical</label></input>
        <input type="radio" name="HowKilled" id="How2" value="1"><label for="How2">Tillage</label></input>
        <input type="radio" name="HowKilled" id="How3" value="2"><label for="How3">Harvested</label></input>
        <input type="radio" name="HowKilled" id="How4" value="3"><label for="How4">Other</label></input>
        <hr>
        </div>
// -->
        <label for="DateKilled">Date Cover Killed:</label>
        <span><input type="date" name="DateKilled"></input></Span>

        <p>
        <label for="Last5">Yrs. Man. of 5:</label>
        <span><input type="text" name="Last5"</input></span>
        </p>

        <p>
          <label for="8of10">Manure Applied 8 of 10 yrs:</label>
          <span><select name="8of10" id="Tillage1">
              <option value="3"></option>
              <option value="0">Yes</option>
              <option value="1">No</option>
              <option value="2">Don't Know</option>
          </select></span>
        </p>
<!-- //
      <div>
        <hr>
        <dl>
          <dt>Manure 8 of last 10 yrs.</dt>
        </dl>
        <input type="radio" name="8of10" id="8of101" value="0"><label for="8of101">Yes</label></input>
        <input type="radio" name="8of10" id="8of102" value="1"><label for="8of102">No</label></input>
        <input type="radio" name="8of10" id="8of103" value="1"><label for="8of103">Don't Know</label></input>
        <hr>
      </div>
// -->
        <br /><input type="submit"></input>
    </div>
  </form></div></div>

<script><?php
  $sql = "SELECT FieldName FROM field WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField']]);
  $arr = $stmt->fetch(PDO::FETCH_NUM);
  echo 'document.getElementById("Field").innerHTML = "'.$arr[0].'";';?>
function edit(FieldID,ElementName) {
  document.cookie="PrimeIDField=" + FieldID;
  document.getElementById("Field").innerHTML = decodeURI(ElementName);
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
