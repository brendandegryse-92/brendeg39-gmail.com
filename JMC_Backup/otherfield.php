<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <style>
    #Add {
      display: none;
    }

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
      font-size: 16px; /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
  </style>
</head>
<body>
<div class="sidenav">
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
</div>
<div class="main">
  <?php
  session_start();
  if (!isset($_SESSION['ID'])) {
    header("Location: otherlogin.php");
  }
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
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
  <!-- -->
  <div id="Grower">Active Field: </div><button onclick="location.href = 'editField.php'">Edit Field</button><button onclick="location.href = 'fertapps.php'">Add Fertilizer</button><button onclick="location.href = 'manure.php'">Add Manure</button><br />
  <button onclick="toggle()">Add Field</button><div id="Add">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="newspaper">

        <input type="text" name="FieldName"></input>
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
  </form></div>
</div>

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
