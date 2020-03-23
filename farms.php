<html>
<title>Farms</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div include="head.html"></div>
  <table>
    <div class="toprow">
    <tr>
      <td style="display: none;">Number</td>
      <td style="display: none;">Operator ID</td>
      <td style="display: none;">Buisiness ID</td>
      <td>Owner</td>
      <td>Farm Name</td>
      <td>Crop Land</td>
      <td>FSA_Farm</td>
      <td>FSA_Tract</td>
      <td>Insurance ID</td>
      <td>County</td>
      <td>Description</td>
      <td>Rent Type</td>
      <td>PID</td>
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
  $sql = "SELECT ID, FarmNumber, OperatorID, BusinessID, Owner, FarmName, CropLand, FSA_Farm, FSA_Tract, InsuranceID, County, Description, RentType, PID, IsActive FROM farms WHERE UserID = ? ORDER BY FarmNumber ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  $sql = "SELECT OpName FROM operator WHERE UserID = ? AND IsActive = 1";
  $statement = $connection->prepare($sql);
  $statement->execute([$_SESSION['ID']]);
  $array = $statement->fetchall(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    array_push($_SESSION['rowPrimaryID'], $val[0]);
    newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9], $val[10], $val[11], $val[12], $val[13],
     $val[14], $array);
    $rowIndex[$i] = $i;
  }
    array_push($_SESSION['rowPrimaryID'], -1);
      newRow(getNextRowNumber($rowIndex), null, null, null, null, null, null, null, null, null, null, null, null, null, 1, $array);
      function newRow($rowNm, $FarmNumber, $OpID, $BusinessID, $Owner, $FarmName, $CropLand, $FSA_Farm, $FSA_Tract, $InsuranceID, $County, $Description, $RentType, $PID, $Active, $Operators) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
          echo '<td><select id="select'.$rowNm.'">';
          if ($Operators) {
          foreach ($Operators as $op) {echo '<option id="'.$op[0].'"';
            if ($Owner == $op[0]) {echo ' selected';}
            echo '>'.$op[0].'</option>';}
          }
          else {echo '<option>No Operators active</option>';}
          echo '</td></select>';
          //echo '<td><input name="BusinessID" value="'.$BusinessID.'" type="number"/></td>';
          //echo '<td><input name="Owner" value="'.$Owner.'"/></td>';
          echo '<td><input name="FarmName" value="'.$FarmName.'"/></td>';
          echo '<td><input name="CropLand" value="'.$CropLand.'"/></td>';
          echo '<td><input name="FSA_Farm" value="'.$FSA_Farm.'"/></td>';
          echo '<td><input name="FSA_Tract" value="'.$FSA_Tract.'"/></td>';
          echo '<td><input name="InsuranceID" value="'.$InsuranceID.'"/></td>';
          echo '<td><input name="County" value="'.$County.'"/></td>';
          echo '<td><input name="Description" value="'.$Description.'"/></td>';
          echo '<td><input name="RentType" value="'.$RentType.'"/></td>';
          echo '<td><input name="PID" type="number" value="'.$PID.'"/></td>';
          if ($Active == 1) {echo '<td><input name="Active" class="checkbox" type="checkbox" checked/></td>';}
          if ($Active == 0) {echo '<td><input name="Active" class="checkbox" type="checkbox"/></td>';}
          echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        echo '</table><a class="buttons" href="farmsplit.php">Farm Splits</a>';
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
          form[x][0].value = "";
          form[x][1].value = "";
          form[x][2].value = "";
          form[x][3].value = "";
          form[x][4].value = "";
          form[x][5].value = "";
          form[x][6].value = "";
          form[x][7].value = "";
          form[x][8].value = "";
          form[x][9].value = "";
          form[x][10].value = "";
          form[x][11].value = "";
          form[x][12].value = "";
          form[x][13].value = "";
        }/**
        function setOpID(x) {
          var form = document.getElementsByTagName("form");
          var box = document.getElementById("select" + x);
          var selected = box.options[box.selectedIndex];
          form[x][1].value = selected.id;
        }**/
        function submit() {
          var forms = document.getElementsByTagName("form");
          var text = "";
          var json;
          var xmlhttp = new XMLHttpRequest();
          var myObj;
          var x=0;
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  json = {Owner : document.getElementById("select" + x).options[document.getElementById("select" + x).selectedIndex].value, FarmName : forms[x][1].value, CropLand : forms[x][2].value, FSA_Farm : forms[x][3].value,
                  FSA_Tract : forms[x][4].value, InsuranceID : forms[x][5].value, County : forms[x][6].value, Description : forms[x][7].value, RentType : forms[x][8].value, PID : forms[x][9].value, Active : forms[x][10].checked, tableName : "Farms", length : forms.length, counter : x};
                  if (forms[x][10].checked == true) {json.Active = 1;}
                  if (forms[x][10].checked == false) {json.Active = 0;}
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);
                }
            location.reload(true);
          };
        </script><script>
      function includeHTML() {
        var z, i, elmnt, file, xhttp;
        /* Loop through a collection of all HTML elements: */
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
          elmnt = z[i];
          /*search for elements with a certain atrribute:*/
          file = elmnt.getAttribute("include");
          if (file) {
            /* Make an HTTP request using the attribute value as the file name: */
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4) {
                if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
                /* Remove the attribute, and call this function once more: */
                elmnt.removeAttribute("include");
                includeHTML();
              }
            }
            xhttp.open("POST", file, false);
            xhttp.send();
            /* Exit the function: */
            return;
          }
        }
      }
      </script>
      <script>
      includeHTML();
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.status == 200) {document.getElementById("account").innerHTML = this.responseText;}
      }
      xhttp.open("POST", "accountphp.php", false);
      xhttp.send();
      </script>
</body>
</html>
