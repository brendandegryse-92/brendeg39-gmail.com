<!DOCTYPE html>
<meta name="description" content="Fields">
<html>
<title>Fields</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  .tabl {
    overflow-x: auto;
  }
  input {
    width: 100px;
  }
  </style>
</head>
<body>
  <div include="head.html"></div>
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
$sql = "SELECT FarmName FROM farms WHERE UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$res = $stmt->fetchall(PDO::FETCH_NUM);
echo "</div>";
echo '<select class="buttons" onchange="showOnly()" id="select">';
foreach($res as $result) {echo '<option id="'.$result[0].'">'.$result[0].'</option>';}
echo "</select>";
  ?>
  <div id="tabl" style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>Farm Name</td>
      <td>Field Name</td>
      <td>Acres</td>
      <td>FSA_Farm</td>
      <td>FSA_Tract</td>
      <td>FSA_Field</td>
      <td>FSA_Area</td>
      <td>InsuranceID</td>
      <td>County</td>
      <td>Township</td>
      <td>FarmRange</td>
      <td>Section</td>
      <td>Legal</td>
      <td>Watershed</td>
      <td>Restriction</td>
      <td>Slope</td>
      <td>TRating</td>
      <td>Location</td>
      <td>PID</td>
      <td>TicketTrackID</td>
      <td>AutoSteerHeading</td>
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
  $sql = "SELECT ID, FieldNumber, FarmName, FieldName, Acres, FSA_Farm, FSA_Tract, FSA_Field, FSA_Area, InsuranceID, County, Township, FarmRange, Section, Legal, Watershed, Restriction, Slope, TRating, Location, PID, TicketTrackID, AutoSteerHeading, IsActive FROM fields WHERE UserID = ? ORDER BY FarmNumber ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  $sql = "SELECT FarmName FROM farms WHERE UserID = ? AND IsActive = 1";
  $statement = $connection->prepare($sql);
  $statement->execute([$_SESSION['ID']]);
  $array = $statement->fetchall(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9], $val[10], $val[11], $val[12], $val[13], $val[14], $val[15], $val[16], $val[17], $val[18], $val[19], $val[20], $val[21], $val[22], $val[23], $array);
    $rowIndex[$i] = $i;
  }
      newRow(getNextRowNumber($rowIndex), null, "","","","","", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 1, $array);
      function newRow($rowNm, $FieldNumber, $FarmName, $FieldName, $Acres, $FSA_Farm, $FSA_Tract, $FSA_Field, $FSA_Area, $InsuranceID, $County, $Township, $FarmRange, $Section, $Legal, $Watershed, $Restriction, $Slope, $TRating, $Location, $PID, $TicketTrackID, $AutoSteerHeading, $Active, $Farms) {
        echo '<div>';
        echo '<tr id="form'.$rowNm.'" name="'.$rowNm.'">';
        echo '<form method="get" id="'.$rowNm.'" name="'.$rowNm.'">';
          //echo '<td><input name="Field Number" id="td'.$rowNm.'" type="number" value="'.$FieldNumber.'"/></td>';
            echo '<td><select class="buttons" id="selects'.$rowNm.'">';
            if ($Farms) {
            foreach ($Farms as $f) {echo '<option id="'.$f[0].'"';
              if ($FarmName == $f[0]) {echo ' selected';}
              echo '>'.$f[0].'</option>';}
            }
            else {echo '<option>No Farms active</option>';}
            echo '</td></select>';
          echo '<td><input name="Field Name" id="td'.$rowNm.'" value="'.$FieldName.'"/></td>';
          echo '<td><input name="Acres" id="td'.$rowNm.'" type="number" value="'.$Acres.'"/></td>';
          echo '<td><input name="FSA_Farm" id="td'.$rowNm.'" value="'.$FSA_Farm.'"/></td>';
          echo '<td><input name="FSA_Tract" id="td'.$rowNm.'" type="number" value="'.$FSA_Tract.'"/></td>';
          echo '<td><input name="FSA_Field" id="td'.$rowNm.'" type="number" value="'.$FSA_Field.'"/></td>';
          echo '<td><input name="FSA_Area" id="td'.$rowNm.'" value="'.$FSA_Area.'"/></td>';
          echo '<td><input name="InsuranceID" id="td'.$rowNm.'" value="'.$InsuranceID.'"/></td>';
          echo '<td><input name="County" id="td'.$rowNm.'" value="'.$County.'"/></td>';
          echo '<td><input name="Township" id="td'.$rowNm.'" value="'.$Township.'"/></td>';
          echo '<td><input name="Farm Range" id="td'.$rowNm.'" value="'.$FarmRange.'"/></td>';
          echo '<td><input name="Section" id="td'.$rowNm.'" value="'.$Section.'"/></td>';
          echo '<td><input name="Legal" id="td'.$rowNm.'" value="'.$Legal.'"/></td>';
          echo '<td><input name="Watershed" id="td'.$rowNm.'" value="'.$Watershed.'"/></td>';
          echo '<td><input name="Restriction" id="td'.$rowNm.'" value="'.$Restriction.'"/></td>';
          echo '<td><input name="Slope" id="td'.$rowNm.'" type="number" value="'.$Slope.'"/></td>';
          echo '<td><input name="TRating" id="td'.$rowNm.'" value="'.$TRating.'"/></td>';
          echo '<td><input name="Location" id="td'.$rowNm.'" value="'.$Location.'"/></td>';
          echo '<td><input name="PID" id="td'.$rowNm.'" type="number" value="'.$PID.'"/></td>';
          echo '<td><input name="TicketTrackID" type="number" id="td'.$rowNm.'" value="'.$TicketTrackID.'"/></td>';
          echo '<td><input name="AutoSteerHeading" type="number" id="td'.$rowNm.'" value="'.$AutoSteerHeading.'"/></td>';
          if ($Active == 1) {echo '<td><input name="Active" id="td'.$rowNm.'" type="checkbox" checked/></td>';}
          if ($Active == 0) {echo '<td><input name="Active" id="td'.$rowNm.'" type="checkbox"/></td>';}
          echo '<td background-color="white" id="td'.$rowNm.'" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          echo "</div>";
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        function getNextRowNumber($rowIndex) {
          $rowNumber = end($rowIndex);
          $rowNumber += 1;
          $rowIndex[$rowNumber]  = $rowNumber;
          return $rowNumber;
        }
        echo '</div>'
       ?>
     </table></div><h3><a href="importFields.php">Import</a></h3>
        <script>
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          for (var i=0; i < form[x].length; i++) {
          form[x][i].value = "";
          }
        }
        function showOnly() {
          var form = document.getElementsByTagName("form");
          var box = document.getElementById("select");
          var selected = box.options[box.selectedIndex];/**
          var box2 = document.getElementById("select" + x);
          var selected2 = box2.options[box2.selectedIndex];**/
          for (var i=0; i < (form.length-1); i++) {
            var tr = document.getElementById("form" + form[i].id);/**
            var td = document.getElementById("td" + form[i].id);
            td.style.display = "none";**/
            if (document.getElementById("selects" + i).options[document.getElementById("selects" + i).selectedIndex].id != selected.id){
              tr.style.display = "none";
              for (var x=0; x <form[i].length-1; x++){
                form[i][x].style.display = "none";
              }
            }
            if (document.getElementById("selects" + i).options[document.getElementById("selects" + i).selectedIndex].id == selected.id){
              tr.style.display = "table-row";
              for (var x=0; x <form[i].length-1; x++){
                form[i][x].style.display = "block";
              }
            }
        }
        }
        function submit() {

          var forms = document.getElementsByTagName("form");
          for (var i=0; i < (forms.length-1); i++) {
            var tr = document.getElementById("form" + forms[i].id);
              tr.style.display = "table-row";
              for (var x=0; x <forms[i].length-1; x++){
                forms[i][x].style.display = "block";
              }
            }
          var text = "";
          var json;
          var xmlhttp = new XMLHttpRequest();
          var myObj;
          var x=0;
          var jsonAccumulated = [];
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }

            for (x = 0; x < (forms.length); x++){
                  jsonAccumulated.push({FarmName: document.getElementById("selects" + x).options[document.getElementById("selects" + x).selectedIndex].id, FieldName : forms[x][1].value, Acres : forms[x][2].value, FSA_Farm : forms[x][3].value, Active : forms[x][21].checked, FSA_Tract : forms[x][4].value, FSA_Field : forms[x][5].value,
                    FSA_Area : forms[x][6].value, InsuranceID : forms[x][7].value, County : forms[x][8].value, Township : forms[x][9].value, FarmRange : forms[x][10].value, Section : forms[x][11].value, Legal : forms[x][12].value, Watershed : forms[x][13].value, Restriction : forms[x][14].value, Slope : forms[x][15].value, TRating : forms[x][16].value,
                    Location : forms[x][17].value, PID : forms[x][18].value, TicketTrackID : forms[x][19].value, AutoSteerHeading : forms[x][20].value, tableName : "Fields", length : forms.length, counter : x});
                  if (forms[x][21].checked == true) {jsonAccumulated[x].Active = 1;}
                  if (forms[x][21].checked == false) {jsonAccumulated[x].Active = 0;}
                }
                json = JSON.stringify(jsonAccumulated);
                xmlhttp.open("POST", "submit.php", true);
                xmlhttp.send(json);
                location.reload(true);
          };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "fields";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
