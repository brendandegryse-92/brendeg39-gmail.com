<!DOCTYPE html>
<meta name="description" content="Login">
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <style>
  div {
    margin-left: auto;
    margin-right: auto;
    width: 20%;
  }
  </style>
</head>
<body>
<div>
  <form method="post" action="otherloginphp.php"><br/>
  Email:
    <input name="email" type = "email" required/>
  Password:
    <input name = "password" type="password" required/><br/><br/>
  <input type="submit"/>
  </form>
  <a href="otherregister.php">Register</a>
</div>
</body>
</html>
