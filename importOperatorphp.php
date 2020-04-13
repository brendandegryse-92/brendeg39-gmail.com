<html><body><?php
session_start();
$server = "localhost";
$uname = "client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
$data = simplexml_load_file($_FILES["imfile"]["tmp_name"]);
$sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
$stmt = $connection->prepare($sql);
for ($i = 0; $i < count($data->Operator); $i++) {
  $stmt->execute([$data->Operator[$i]->OpFirstName.' '.$data->Operator[$i]->OpLastName, $data->Operator[$i]->OpAddress, $data->Operator[$i]->OpCity, $data->Operator[$i]->OpState, $data->Operator[$i]->OpZip, $data->Operator[$i]->OpPhone, $data->Operator[$i]->Active, $_SESSION['ID']]);
}
header("Location: index.php");
?>
</body>
</html>
