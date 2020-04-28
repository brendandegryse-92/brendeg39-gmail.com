<!DOCTYPE html>
<meta name="description" content="Login">
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
  <style>
  div {
    margin-left: auto;
    margin-right: auto;
    width: 20%;
  }
  </style>
</head>
<body>
<h1><a href="index.php" class="head">Simplified Technology Services Inc.</a></h1>
<div>
  <form method="post" action="loginphp.php"><br/>
  Email:
    <input name="email" type = "email" required/>
  Password:
    <input name = "password" type="password" required/><br/><br/>
  <input type="submit"/>
  </form>
  <a href="register.php">Register</a>
</div>
</body>
</html>
