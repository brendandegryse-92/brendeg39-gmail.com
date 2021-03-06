<!DOCTYPE html>
<meta name="description" content="Applications">
<html>
<title>Farm Split</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
  <table><div class="toprow"><tr class="split"><td class="split">Farm Number</td><td class="split">Operator</td><td class="split">%</td><td class="split">Split Group</td>
<td class="button"><button onclick="submit()"> Submit </button></td></tr></div>
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
  $sql = "SELECT ID, FarmNumber, Operator, SplitPercent, SplitGroup FROM fieldsplit WHERE UserID = ? ORDER BY FarmNumber ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4]);
    $rowIndex[$i] = $i;
  }
      newRow(getNextRowNumber($rowIndex), null, "","","");
function newRow($rowNm, $FarmNumber, $Operator, $Percent, $Group) {
  echo '<tr name="'.$rowNm.'">';
  echo '<form method="get" id="form" name="'.$rowNm.'">';
  echo '<tr name="'.$rowNm.'">';
  echo '<td><input value="'.$FarmNumber.'" type="number"></td>';
  echo '<td><input value="'.$Operator.'"></td>';
  echo '<td><input value="'.$Percent.'" type="number"></td>';
  echo '<td><input value="'.$Group.'" type="number"></td>';
  echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
  echo "</tr>";
  echo '</form>';
}
function getNextRowNumber($rowIndex) {
  $rowNumber = end($rowIndex);
  $rowNumber += 1;
  $rowIndex[$rowNumber] = $rowNumber;
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
     jsonAccumulated.push({FarmNumber : forms[x][0].value, Operator : forms[x][1].value, SplitPercent : forms[x][2].value, SplitGroup : forms[x][3].value, tableName : "split", length : forms.length, counter : x});
         }
         json = JSON.stringify(jsonAccumulated);
         xmlhttp.open("POST", "submit.php", true);
         xmlhttp.send(json);
         location.reload(true);
   };
 </script><script type="text/javascript" src="headjs.js"></script>
 <script>
 highlight();
 function highlight() {
 var x = "farms";
 try {
 document.getElementById(x).className += " activeNav";
   }
 catch(err) {window.setTimeout(highlight, 100);
     }
 }
 </script>
</body>
</html>
