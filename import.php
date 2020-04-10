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
  <form action="importphp.php" method="post" enctype="multipart/form-data">
    <input type="file" name="imfile" id="imfile"></input>
    <input type="submit" class="buttons"></input>
  </form>
  <script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "account";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
