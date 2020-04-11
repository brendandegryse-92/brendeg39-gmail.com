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
print_r($data);
echo $data->Operator[0]->OperatorId;
$sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
$stmt = $connection->prepare($sql);
foreach ($data->Operator as $i=>$val) {print_r($val);}
  $stmt->execute([$data->Operator[$val]->OpFirstName.' '.$data->Operator[$val]->OpLastName, $data->Operator[$val]->OpAddress, $data->Operator[$val]->OpCity, $data->Operator[$val]->OpState, $data->Operator[$val]->OpZip, $data->Operator[$val]->OpPhone, $data->Operator[$val]->Active, $_SESSION['ID']]);
//INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)
?>
</body>
</html>
