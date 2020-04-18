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

$data = json_decode(file_get_contents("php://input"));

if($data->tableName=="renew") {
  $sql = "UPDATE users SET accountType = ?, ExpireDate = ? WHERE UserID = ?";
  $statement = $connection->prepare($sql);
  $statement->execute(["active", $data[$arraylen]->date, $_SESSION['ID']]);
}

$sql = "SELECT accountType, ExpireDate FROM users WHERE UserID = ?";
$statement = $connection->prepare($sql);
$statement->execute([$_SESSION['ID']]);
$arr = $statement->fetch(PDO::FETCH_NUM);
if (date("Y-m-d") > $arr[1]) {
  $sql = "UPDATE users SET accountType = ? WHERE UserID = ?";
  $statement = $connection->prepare($sql);
  $statement->execute(["inactive", $_SESSION['ID']]);
  $arr[0] = "inactive";
}
if (date("Y-m-d") < $arr[1]) {
  $sql = "UPDATE users SET accountType = ? WHERE UserID = ?";
  $statement = $connection->prepare($sql);
  $statement->execute(["active", $_SESSION['ID']]);
  $arr[0] = "active";
}
if ($arr[0] == "active") {
if (is_array($data)){
for($arraylen = 0; $arraylen < count($data); $arraylen++) {
if ($data[$arraylen]->tableName == "operator") {
  if ($data[$arraylen]->OpName == null && $data[$arraylen]->counter<$data[$arraylen]->length) {
    $sql = "DELETE FROM  operator WHERE OperatorID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
  }
 elseif ($data[$arraylen]->counter + 1 < $data[$arraylen]->length) {
$sql = "UPDATE operator SET OpName = ?, OpAddress = ?, OpCity = ?, OpState = ?, OpZip = ?, OpPhone = ?, IsActive = ? WHERE OperatorID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data[$arraylen]->OpName, $data[$arraylen]->OpAddress, $data[$arraylen]->OpCity, $data[$arraylen]->OpState, $data[$arraylen]->OpZip, $data[$arraylen]->OpPhone, $data[$arraylen]->Active, $_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
}
elseif ($data[$arraylen]->counter + 1 == $data[$arraylen]->length) {
    $sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data[$arraylen]->OpName, $data[$arraylen]->OpAddress, $data[$arraylen]->OpCity, $data[$arraylen]->OpState, $data[$arraylen]->OpZip, $data[$arraylen]->OpPhone, $data[$arraylen]->Active, $_SESSION['ID']]);
}}

elseif ($data[$arraylen]->tableName == "Farms") {
  if ($data[$arraylen]->FarmName == "") {
    $sql = "DELETE FROM  farms WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
    $data[$arraylen]->counter = $data[$arraylen]->length+10;
  }
 if ($data[$arraylen]->counter < $data[$arraylen]->length-1) {
$sql = "UPDATE farms SET Owner = ?, FarmName = ?, FSA_Farm = ?, FSA_Tract = ?, InsuranceID = ?, County = ?, Description = ?, RentType = ?, PID = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data[$arraylen]->Owner, $data[$arraylen]->FarmName, $data[$arraylen]->FSA_Farm, $data[$arraylen]->FSA_Tract, $data[$arraylen]->InsuranceID, $data[$arraylen]->County, $data[$arraylen]->Description, $data[$arraylen]->RentType, $data[$arraylen]->PID, $data[$arraylen]->Active, $_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);}
if (($data[$arraylen]->counter == $data[$arraylen]->length-1) && ($data[$arraylen]->FarmName != "")) {
    $sql = "INSERT INTO farms (Owner, FarmName, CropLand, FSA_Farm, FSA_Tract, InsuranceID, County, Description, RentType, PID, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data[$arraylen]->Owner, $data[$arraylen]->FarmName,$data[$arraylen]->CropLand, $data[$arraylen]->FSA_Farm, $data[$arraylen]->FSA_Tract, $data[$arraylen]->InsuranceID, $data[$arraylen]->County, $data[$arraylen]->Description, $data[$arraylen]->RentType, $data[$arraylen]->PID, $data[$arraylen]->Active, $_SESSION['ID']]);
}}

elseif ($data[$arraylen]->tableName == "Fields") {
  if ($data[$arraylen]->FieldNumber == null && $data[$arraylen]->FarmNumber == "" && $data[$arraylen]->FieldName == "" && $data[$arraylen]->Acres == "" && $data[$arraylen]->FSA_Farm == "") {
    $sql = "DELETE FROM  fields WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
    $data[$arraylen]->counter = $data[$arraylen]->length+10;
  }
 if ($data[$arraylen]->counter < $data[$arraylen]->length-1) {
$sql = "UPDATE fields SET FieldNumber = ?, FarmNumber = ?, FieldName = ?, Acres = ?, FSA_Farm = ?, FSA_Tract = ?, FSA_Field = ?, FSA_Area = ?, InsuranceID = ?, County = ?, Township = ?, FarmRange = ?, Section = ?, Legal = ?, Watershed = ?, Restriction = ?, Slope = ?, TRating = ?, Location = ?, PID = ?, TicketTrackID = ?, AutoSteerHeading = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data[$arraylen]->FieldNumber, $data[$arraylen]->FarmNumber, $data[$arraylen]->FieldName, $data[$arraylen]->Acres, $data[$arraylen]->FSA_Farm, $data[$arraylen]->FSA_Tract, $data[$arraylen]->FSA_Field, $data[$arraylen]->FSA_Area, $data[$arraylen]->InsuranceID, $data[$arraylen]->County, $data[$arraylen]->Township, $data[$arraylen]->FarmRange, $data[$arraylen]->Section, $data[$arraylen]->Legal, $data[$arraylen]->Watershed, $data[$arraylen]->Restriction, $data[$arraylen]->Slope, $data[$arraylen]->TRating, $data[$arraylen]->Location, $data[$arraylen]->PID, $data[$arraylen]->TicketTrackID, $data[$arraylen]->AutoSteerHeading, $data[$arraylen]->Active, $_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);}
if (($data[$arraylen]->counter == $data[$arraylen]->length-1) && ($data[$arraylen]->FieldNumber != 0)) {
    $sql = "INSERT INTO fields (FieldNumber, FarmNumber, FieldName, Acres, FSA_Farm, FSA_Tract, FSA_Field, FSA_Area, InsuranceID, County, Township, FarmRange, Section, Legal, Watershed, Restriction, Slope, TRating, Location, PID, TicketTrackID, AutoSteerHeading, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data[$arraylen]->FieldNumber, $data[$arraylen]->FarmNumber, $data[$arraylen]->FieldName, $data[$arraylen]->Acres, $data[$arraylen]->FSA_Farm, $data[$arraylen]->FSA_Tract, $data[$arraylen]->FSA_Field, $data[$arraylen]->FSA_Area, $data[$arraylen]->InsuranceID, $data[$arraylen]->County, $data[$arraylen]->Township, $data[$arraylen]->FarmRange, $data[$arraylen]->Section, $data[$arraylen]->Legal, $data[$arraylen]->Watershed, $data[$arraylen]->Restriction, $data[$arraylen]->Slope, $data[$arraylen]->TRating, $data[$arraylen]->Location, $data[$arraylen]->PID, $data[$arraylen]->TicketTrackID, $data[$arraylen]->AutoSteerHeading, $data[$arraylen]->Active, $_SESSION['ID']]);
}}

elseif ($data[$arraylen]->tableName == "split") {
  if ($data[$arraylen]->FarmNumber == null && $data[$arraylen]->Operator == "" && $data[$arraylen]->SplitPercent == "" && $data[$arraylen]->SplitGroup == "") {
    $sql = "DELETE FROM fieldsplit WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
    $data[$arraylen]->counter = $data[$arraylen]->length+10;
  }
 if ($data[$arraylen]->counter < $data[$arraylen]->length-1) {
$sql = "UPDATE fieldsplit SET FarmNumber = ?, Operator = ?, SplitPercent = ?, SplitGroup = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data[$arraylen]->FarmNumber, $data[$arraylen]->Operator, $data[$arraylen]->SplitPercent, $data[$arraylen]->SplitGroup, $_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);}
if (($data[$arraylen]->counter == $data[$arraylen]->length-1) && ($data[$arraylen]->FarmNumber != 0)) {
    $sql = "INSERT INTO fieldsplit (FarmNumber, Operator, SplitPercent, SplitGroup, UserID) Values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data[$arraylen]->FarmNumber, $data[$arraylen]->Operator, $data[$arraylen]->SplitPercent, $data[$arraylen]->SplitGroup, $_SESSION['ID']]);
}}

elseif ($data[$arraylen]->tableName == "crop") {
  if ($data[$arraylen]->CropID == null && $data[$arraylen]->FieldID == null) {
    $sql = "DELETE FROM crop WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);
  }
 elseif ($data[$arraylen]->counter < $data[$arraylen]->length-1) {
$sql = "UPDATE crop SET CropID = ?, FieldID = ?, Year = ?, Description = ?, StartDate = ?, StopDate = ?, Latitude = ?, Longitude = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data[$arraylen]->CropID, $data[$arraylen]->FieldID, $data[$arraylen]->Year, $data[$arraylen]->Description, $data[$arraylen]->StartDate, $data[$arraylen]->StopDate, $data[$arraylen]->Latitude, $data[$arraylen]->Longitude, $data[$arraylen]->IsActive, $_SESSION['rowPrimaryID'][$data[$arraylen]->counter], $_SESSION['ID']]);}
elseif (($data[$arraylen]->counter == $data[$arraylen]->length-1) && ($data[$arraylen]->CropID != 0)) {
    $sql = "INSERT INTO crop (CropID, FieldID, Year, Description, StartDate, StopDate, Latitude, Longitude, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data[$arraylen]->CropID, $data[$arraylen]->FieldID, $data[$arraylen]->Year, $data[$arraylen]->Description, $data[$arraylen]->StartDate, $data[$arraylen]->StopDate, $data[$arraylen]->Latitude, $data[$arraylen]->Longitude,$data[$arraylen]->IsActive, $_SESSION['ID']]);
}}
}
}
else{
if ($data->tableName == "PrimeID") {
  $_SESSION['PrimeID'] = $_SESSION['rowPrimaryID'][$data->PrimeID];
}

elseif ($data->tableName == "seeds") {
  if ($data->Name == "") {
    $sql = "DELETE FROM seeds WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 elseif ($data->counter == "update") {
$sql = "UPDATE seeds SET Name = ?, Variety = ?, SeedsPerUnit = ?, EnteredUnit = ?, PurchasedUnits = ?, ShowOnReport = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Name, $data->Variety, $data->SeedsPerUnit, $data->EnteredUnit, $data->PurchasedUnits, $data->ShowOnReport, $data->Active, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);}
elseif (($data->counter == "new") && ($data->Name != "")) {
    $sql = "INSERT INTO seeds (Name, Variety, SeedsPerUnit, EnteredUnit, PurchasedUnits, ShowOnReport, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Name, $data->Variety, $data->SeedsPerUnit, $data->EnteredUnit, $data->PurchasedUnits, $data->ShowOnReport, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "SeedPrices") {
  if ($data->DateFrom == "" && $data->DateTo == "" && $data->Price == "") {
    $sql = "DELETE FROM seedsyears WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE seedsyears SET DateFrom = ?, DateTo = ?, Price = ?, CropGroup = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->Price != 0)) {
    $sql = "INSERT INTO seedsyears (DateFrom, DateTo, Price, CropGroup, UserID) Values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['ID']]);
}}

elseif ($data->tableName == "chemicals") {
  if ($data->Name == "") {
    $sql = "DELETE FROM chemicals WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter == "update") {
$sql = "UPDATE chemicals SET Name = ?, EnteredUnits = ?, PurchasedUnits = ?, Ratio = ?, ShowOnReport = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Name, $data->EnteredUnits, $data->PurchasedUnits, $data->Ratio, $data->ShowOnReport, $data->Active, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);}
if (($data->counter == "new") && ($data->Name != "")) {
    $sql = "INSERT INTO chemicals (Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive, UserID) Values (?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Name, $data->EnteredUnits, $data->PurchasedUnits, $data->Ratio, $data->ShowOnReport, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "ChemicalPrices") {
  if ($data->DateFrom == "" && $data->DateTo == "" && $data->Price == "") {
    $sql = "DELETE FROM chemicalyears WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE chemicalyears SET DateFrom = ?, DateTo = ?, Price = ?, CropGroup = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->Price != 0)) {
    $sql = "INSERT INTO chemicalyears (DateFrom, DateTo, Price, CropGroup, UserID) Values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['ID']]);
}}

elseif ($data->tableName == "fertilizers") {
  if ($data->Name == "") {
    $sql = "DELETE FROM fertilizers WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter == "update") {
$sql = "UPDATE fertilizers SET Name = ?, EnteredUnits = ?, PurchasedUnits = ?, Ratio = ?, ShowOnReport = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Name, $data->EnteredUnits, $data->PurchasedUnits, $data->Ratio, $data->ShowOnReport, $data->Active, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);}
if (($data->counter == "new") && ($data->Name != "")) {
    $sql = "INSERT INTO fertilizers (Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive, UserID) Values (?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Name, $data->EnteredUnits, $data->PurchasedUnits, $data->Ratio, $data->ShowOnReport, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "FertilizerPrices") {
  if ($data->DateFrom == "" && $data->DateTo == "" && $data->Price == "") {
    $sql = "DELETE FROM fertilizeryears WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE fertilizeryears SET DateFrom = ?, DateTo = ?, Price = ?, CropGroup = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->Price != 0)) {
    $sql = "INSERT INTO fertilizeryears (DateFrom, DateTo, Price, CropGroup, UserID) Values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->DateFrom, $data->DateTo, $data->Price, $_SESSION['PrimeID'], $_SESSION['ID']]);
}}

elseif ($data->tableName == "appgeninfo") {
  if ($data->Applicator != null) {
    $sql = 'INSERT INTO appgeninfo (Applicator, AppType, DateApplied, StopTime, Conditions, ReconcileDate, FieldFrom, FieldTo, AutoSteerHeading, Type, UserID) Values (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Applicator, $data->AppType, $data->DateApplied, $data->StopTime, $data->Conditions, $data->ReconcileDate, $data->FieldFrom, $data->FieldTo, $data->AutoSteerHeading, $data->Type, $_SESSION['ID']]);
    $_SESSION['GenAppID'] = $connection->lastInsertId();
  }
}

elseif ($data->tableName == "appgenupdate") {
  if ($data->Applicator == "") {
    $sql = "DELETE FROM  appgeninfo WHERE GenAppID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['PrimeID'], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 elseif ($data->counter < $data->length-1) {
$sql = "UPDATE appgeninfo SET Applicator = ?, AppType = ?, DateApplied = ?, StopTime = ?, Conditions = ?, ReconcileDate = ?, FieldFrom = ?, FieldTo = ?, AutoSteerHeading = ? WHERE GenAppID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Applicator, $data->AppType, $data->DateApplied, $data->StopTime, $data->Conditions, $data->ReconcileDate, $data->FieldFrom, $data->FieldTo, $data->AutoSteerHeading, $_SESSION['PrimeID'], $_SESSION['ID']]);}
}

elseif ($data->tableName == "appchemtable") {
  if ($data->Apptype != "" && $data->counter == "update") {
 $sql = "UPDATE appchemtable SET AppType = ?, ChemID = ?, MonitorAcres = ?, Rate = ?, TotalUsed = ?, AdjustedAmount = ?, Date = ?, ReconcileDate = ?, WindSpeed = ?, WindDirection = ?, Humidity = ?, Temperature = ?, TipSize = ?, Pressure = ?, GroundSpeed = ?, Other = ? WHERE GenAppID = ? AND UserID = ?";
 $stmt = $connection->prepare($sql);
 $stmt->execute([$data->Apptype, $data->ChemID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $data->WindSpeed, $data->WindDirection, $data->Humidity, $data->Temperature, $data->TipSize, $data->Pressure, $data->GroundSpeed, $data->Other, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
  }
  elseif ($data->Apptype != null && $data->counter == "new") {
    $sql = 'INSERT INTO appchemtable (GenAppID, AppType, ChemID, MonitorAcres, Rate, TotalUsed, AdjustedAmount, Date, ReconcileDate, WindSpeed, WindDirection, Humidity, Temperature, TipSize, Pressure, GroundSpeed, Other, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->Apptype, $data->ChemID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $data->WindSpeed, $data->WindDirection, $data->Humidity, $data->Temperature, $data->TipSize, $data->Pressure, $data->GroundSpeed, $data->Other, $_SESSION['ID']]);
  }
}

elseif ($data->tableName == "appferttable") {
  if ($data->Apptype != "" && $data->counter =="update") {
    $sql = 'UPDATE appferttable SET AppType = ?, FertID = ?, MonitorAcres = ?, Rate = ?, TotalUsed = ?, AdjustedAmount = ?, Date = ?, ReconcileDate = ? WHERE GenAppID = ? AND UserID = ?';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Apptype, $data->FertID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
  }
  elseif ($data->Apptype != null && $data->counter == "new") {
    $sql = 'INSERT INTO appferttable (GenAppID, AppType, FertID, MonitorAcres, Rate, TotalUsed, AdjustedAmount, Date, ReconcileDate, UserID) Values (?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->Apptype, $data->FertID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $_SESSION['ID']]);
  }
}

elseif ($data->tableName == "appmiscentry") {
  if ($data->Apptype != "" && $data->counter =="update") {
    $sql = 'UPDATE appmiscentry SET AppType = ?, AppDescription = ?, EnteredAcres = ?, CostPerAcre = ?, TotalUsed = ?, AdjustedAmount = ? WHERE GenAppID = ? AND UserID = ?';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Apptype, $data->AppDescription, $data->EnteredAcres, $data->CostPerAcre, $data->TotalUsed, $data->AdjustedAmount, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
  }
  elseif ($data->Apptype != null && $data->counter == "new") {
    $sql = 'INSERT INTO appmiscentry (GenAppID, AppMiscEntryID, AppType, AppDescription, EnteredAcres, CostPerAcre, TotalUsed, AdjustedAmount, UserID) Values (?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->AppMiscEntryID, $data->Apptype, $data->AppDescription, $data->EnteredAcres, $data->CostPerAcre, $data->TotalUsed, $data->AdjustedAmount, $_SESSION['ID']]);
  }
}

}
echo json_encode($data);}
else {
  echo json_encode($data);
}
?>
