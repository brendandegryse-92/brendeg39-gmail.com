<html>
<title>Crop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>CropID</td>
      <td>FieldID</td>
      <td>Year</td>
      <td>Description</td>
      <td>StartDate</td>
      <td>StopDate</td>
      <td>Latitude</td>
      <td>Longitude</td>
      <td>Active</td>
      <td class="button"><button onclick="submit()"> Submit </button></td>
    </tr>
  </div>
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

  $rowIndex = array(0);
  $_SESSION['rowPrimaryID'] = array();
  $_SESSION['counter'] = 0;
  $GLOBALS['rows'] = array(array());
  $sql = "SELECT ID, CropID, FieldID, Year, Description, StartDate, StopDate, Latitude, Longitude, IsActive FROM crop WHERE UserID = ? ORDER BY CropID ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9]);
    $rowIndex[$i] = $i;
  }
    array_push($_SESSION['rowPrimaryID'], -1);
      newRow(getNextRowNumber($rowIndex), null, null, null, null, null, null, null, null, 1);
      function newRow($rowNm, $CropID, $FieldID, $Year, $Description, $StartDate, $StopDate, $Latitude, $Longitude, $IsActive) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" value="'.$CropID.'"/></td>';
        echo '<td><input type="number" value="'.$FieldID.'"/></td>';
        echo '<td><input type="number" value="'.$Year.'"/></td>';
        echo '<td><input value="'.$Description.'"/></td>';
        echo '<td><input value="'.$StartDate.'" placeholder="yyyy/mm/dd" type="date"/></td>';
        echo '<td><input value="'.$StopDate.'" placeholder="yyyy/mm/dd" type="date"/></td>';
        echo '<td><input type="number" value="'.$Latitude.'"/></td>';
        echo '<td><input type="number" value="'.$Longitude.'"/></td>';
          if ($IsActive == 1) {echo '<td><input name="Active" class="checkbox" type="checkbox" checked/></td>';}
          if ($IsActive == 0) {echo '<td><input name="Active" class="checkbox" type="checkbox"/></td>';}
          echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        echo '<button class="buttons" onclick="getPos()">Get  Current Position</button>';
        echo '<div id = "position">';
        function getNextRowNumber($rowIndex) {
          $rowNumber = end($rowIndex);
          $rowNumber += 1;
          $rowIndex[$rowNumber]  = $rowNumber;
          return $rowNumber;
        }
       ?>
     </div>
   </table><h3><a href="importCrops.php">Import</a></h3>
        <script>
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          for (var i=0; i < form[x].length; i++) {
          form[x][i].value = "";
          }
        }
        function dropdown(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "inline-block";
        }
        function dropclose(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "none";
        }
        function submit() {
          var forms = document.getElementsByTagName("form");
          var text = "";
          var json;
          var xmlhttp = new XMLHttpRequest();
          var myObj;
          var x=0;
          var jsonAccumulated = [];
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
              //myObj = JSON.parse(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  jsonAccumulated.push({CropID : forms[x][0].value, FieldID : forms[x][1].value, Year : forms[x][2].value, Description : forms[x][3].value, StartDate : forms[x][4].value, StopDate : forms[x][5].value, Latitude : forms[x][6].value,
                  Longitude : forms[x][7].value, IsActive : forms[x][8].checked, tableName : "crop", length : forms.length, counter : x});
                  if (forms[x][8].checked == true) {jsonAccumulated[x].IsActive = 1;}
                  if (forms[x][8].checked == false) {jsonAccumulated[x].IsActive = 0;}
                }
                json = JSON.stringify(jsonAccumulated);
                xmlhttp.open("POST", "submit.php", false);
                xmlhttp.send(json);
            location.reload(true);
          }
          function getPos() {
            x = document.getElementById("position");
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
              x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
            }
          }
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "crop";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
