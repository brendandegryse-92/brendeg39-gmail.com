<!DOCTYPE html>
<meta name="description" content="Operators">
<html>
<title>Operators</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>Name</td>
      <td>Address</td>
      <td>City</td>
      <td>State</td>
      <td>Zip Code</td>
      <td>Phone Number</td>
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
  $sql = "SELECT OperatorID, OpNumber, OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive FROM operator WHERE UserID = ? ORDER BY OpNumber ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8]);
    $rowIndex[$i] = $i;
  }
      newRow(getNextRowNumber($rowIndex), null, "","","","","", null, 1);
      function newRow($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone, $Active) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
          echo '<td><input name="Name" value="'.$Name.'"/></td>';
          echo '<td><input name="Address" value="'.$Address.'"/></td>';
          echo '<td><input name="City" value="'.$City.'"/></td>';
          echo '<td><input name="State" value="'.$State.'"/></td>';
          echo '<td><input name="Zip" type="number" value="'.$Zip.'"/></td>';
          echo '<td><input name="Phone" type="tel" value="'.$Phone.'"/></td>';
          if ($Active == 1) {echo '<td><input name="Active" type="checkbox" checked/></td>';}
          if ($Active == 0) {echo '<td><input name="Active" type="checkbox"/></td>';}
          echo '<td background-color="white" class="img"x><img class="img" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));}
        function getNextRowNumber($rowIndex) {
          $rowNumber = end($rowIndex);
          $rowNumber += 1;
          $rowIndex[$rowNumber]  = $rowNumber;
          return $rowNumber;
        }
       ?></div></table></div>
       <a class="buttons" href="importOperator.php">Import</a>
        <script>
        var complete = false;
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          form[x][0].value = "";
          form[x][1].value = "";
          form[x][2].value = "";
          form[x][3].value = "";
          form[x][4].value = "";
          form[x][5].value = "";
          form[x][6].value = "";
          form[x][7].value = "";
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
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  jsonAccumulated.push({OpName : forms[x][0].value, OpAddress : forms[x][1].value, OpCity : forms[x][2].value, OpState : forms[x][3].value, Active : forms[x][6].checked, OpZip : forms[x][4].value, OpPhone : forms[x][5].value, tableName : "operator", length : forms.length, counter : x});
                  if (forms[x][6].checked == true) {jsonAccumulated[x].Active = 1;}
                  if (forms[x][6].checked == false) {jsonAccumulated[x].Active = 0;}
                }
                json = JSON.stringify(jsonAccumulated);
                xmlhttp.open("POST", "submit.php", true);
                xmlhttp.send(json);
                location.reload(true);
          }
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        highlight();
        function highlight() {
        var x = "operators";
        try {
        document.getElementById(x).className += " activeNav";
        }
        catch(err) {window.setTimeout(highlight, 100);
        }
      }
        </script>
</body>
</html>
