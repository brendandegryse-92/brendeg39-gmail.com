<!DOCTYPE html>
<meta name="description" content="">
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div include="head.html"></div>
  <table>
    <div class="toprow">
    <tr>
      <td>Number</td>
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
/**
  $rowIndex = array(0);
  $_SESSION['rowPrimaryID'] = array();
  $_SESSION['counter'] = 0;
  $GLOBALS['rows'] = array(array());
  $sql = "SELECT ID, IsActive FROM change WHERE UserID = ? ORDER BY change ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9], $val[10], $val[11], $val[12], $val[13],
     $val[14]);
    $rowIndex[$i] = $i;
  }**/
    array_push($_SESSION['rowPrimaryID'], -1);
      newRow(getNextRowNumber($rowIndex), null, null, null, null, null, null, null, null, null, null, null, null, null, 1);
      function newRow($rowNm, $Active) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" value="'.$FarmNumber.'"/></td>';
          if ($Active == 1) {echo '<td><input name="Active" class="checkbox" type="checkbox" checked/></td>';}
          if ($Active == 0) {echo '<td><input name="Active" class="checkbox" type="checkbox"/></td>';}
          echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        function getNextRowNumber($rowIndex) {
          $rowNumber = end($rowIndex);
          $rowNumber += 1;
          $rowIndex[$rowNumber]  = $rowNumber;
          return $rowNumber;
        }
       ?>
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
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  jsonAccumulated.push({FarmNumber : forms[x][0].value, OpID : forms[x][1].value, BusinessID : forms[x][3].value, Owner : forms[x][4].value, FarmName : forms[x][5].value, CropLand : forms[x][6].value, FSA_Farm : forms[x][7].value,
                  FSA_Tract : forms[x][8].value, InsuranceID : forms[x][9].value, County : forms[x][10].value, Description : forms[x][11].value, RentType : forms[x][12].value, PID : forms[x][13].value, Active : forms[x][1].checked, tableName : "change", length : forms.length, counter : x});
                  if (forms[x][1].checked == true) {json.Active = 1;}
                  if (forms[x][1].checked == false) {json.Active = 0;}
                }
                json = JSON.stringify(jsonAccumulated);
                xmlhttp.open("POST", "submit.php", true);
                xmlhttp.send(json);
            //location.reload(true);
          };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
