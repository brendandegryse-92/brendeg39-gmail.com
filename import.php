<html>
<title>import</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  input {
      border-radius: 20px;
      border-width: 1.5px;
      border-style: solid;
      border-color: #3d3c38;
      background-color: white;
      font-size: 100%;
      width: 20%;
      font-family: 'Abel';
      z-index: 0;
  }
  </style>
</head>
<body>
  <div include="head.html"></div>
  <form action="importphp.php" method="get">
    <input type="file" name="importfile">
  </form>
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
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  json = {FarmNumber : forms[x][0].value, OpID : forms[x][1].value, BusinessID : forms[x][3].value, Owner : forms[x][4].value, FarmName : forms[x][5].value, CropLand : forms[x][6].value, FSA_Farm : forms[x][7].value,
                  FSA_Tract : forms[x][8].value, InsuranceID : forms[x][9].value, County : forms[x][10].value, Description : forms[x][11].value, RentType : forms[x][12].value, PID : forms[x][13].value, Active : forms[x][1].checked, tableName : "change", length : forms.length, counter : x};
                  if (forms[x][1].checked == true) {json.Active = 1;}
                  if (forms[x][1].checked == false) {json.Active = 0;}
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);
                }
            //location.reload(true);
          };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
