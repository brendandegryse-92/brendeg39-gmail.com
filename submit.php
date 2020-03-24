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

if ($data->tableName == "PrimeID") {
  $_SESSION['PrimeID'] = $_SESSION['rowPrimaryID'][$data->PrimeID];
}
if ($data->tableName == "operator") {
  if ($data->OpName == null && $data->counter<$data->length) {
    $sql = "DELETE FROM  operator WHERE OperatorID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
  }
 elseif ($data->counter + 1 < $data->length) {
$sql = "UPDATE operator SET OpName = ?, OpAddress = ?, OpCity = ?, OpState = ?, OpZip = ?, OpPhone = ?, IsActive = ? WHERE OperatorID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->OpName, $data->OpAddress, $data->OpCity, $data->OpState, $data->OpZip, $data->OpPhone, $data->Active, $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
elseif ($data->counter + 1 == $data->length) {
    $sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->OpName, $data->OpAddress, $data->OpCity, $data->OpState, $data->OpZip, $data->OpPhone, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "Farms") {
  if ($data->FarmName == "") {
    $sql = "DELETE FROM  farms WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE farms SET Owner = ?, FarmName = ?, FSA_Farm = ?, FSA_Tract = ?, InsuranceID = ?, County = ?, Description = ?, RentType = ?, PID = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Owner, $data->FarmName, $data->FSA_Farm, $data->FSA_Tract, $data->InsuranceID, $data->County, $data->Description, $data->RentType, $data->PID, $data->Active, $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->FarmName != "")) {
    $sql = "INSERT INTO farms (Owner, FarmName, CropLand, FSA_Farm, FSA_Tract, InsuranceID, County, Description, RentType, PID, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->Owner, $data->FarmName,$data->CropLand, $data->FSA_Farm, $data->FSA_Tract, $data->InsuranceID, $data->County, $data->Description, $data->RentType, $data->PID, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "Fields") {
  if ($data->FieldNumber == null && $data->FarmNumber == "" && $data->FieldName == "" && $data->Acres == "" && $data->FSA_Farm == "") {
    $sql = "DELETE FROM  fields WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE fields SET FieldNumber = ?, FarmNumber = ?, FieldName = ?, Acres = ?, FSA_Farm = ?, FSA_Tract = ?, FSA_Field = ?, FSA_Area = ?, InsuranceID = ?, County = ?, Township = ?, FarmRange = ?, Section = ?, Legal = ?, Watershed = ?, Restriction = ?, Slope = ?, TRating = ?, Location = ?, PID = ?, TicketTrackID = ?, AutoSteerHeading = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->FieldNumber, $data->FarmNumber, $data->FieldName, $data->Acres, $data->FSA_Farm, $data->FSA_Tract, $data->FSA_Field, $data->FSA_Area, $data->InsuranceID, $data->County, $data->Township, $data->FarmRange, $data->Section, $data->Legal, $data->Watershed, $data->Restriction, $data->Slope, $data->TRating, $data->Location, $data->PID, $data->TicketTrackID, $data->AutoSteerHeading, $data->Active, $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->FieldNumber != 0)) {
    $sql = "INSERT INTO fields (FieldNumber, FarmNumber, FieldName, Acres, FSA_Farm, FSA_Tract, FSA_Field, FSA_Area, InsuranceID, County, Township, FarmRange, Section, Legal, Watershed, Restriction, Slope, TRating, Location, PID, TicketTrackID, AutoSteerHeading, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->FieldNumber, $data->FarmNumber, $data->FieldName, $data->Acres, $data->FSA_Farm, $data->FSA_Tract, $data->FSA_Field, $data->FSA_Area, $data->InsuranceID, $data->County, $data->Township, $data->FarmRange, $data->Section, $data->Legal, $data->Watershed, $data->Restriction, $data->Slope, $data->TRating, $data->Location, $data->PID, $data->TicketTrackID, $data->AutoSteerHeading, $data->Active, $_SESSION['ID']]);
}}

elseif ($data->tableName == "split") {
  if ($data->FarmNumber == null && $data->Operator == "" && $data->SplitPercent == "" && $data->SplitGroup == "") {
    $sql = "DELETE FROM fieldsplit WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 if ($data->counter < $data->length-1) {
$sql = "UPDATE fieldsplit SET FarmNumber = ?, Operator = ?, SplitPercent = ?, SplitGroup = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->FarmNumber, $data->Operator, $data->SplitPercent, $data->SplitGroup, $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
if (($data->counter == $data->length-1) && ($data->FarmNumber != 0)) {
    $sql = "INSERT INTO fieldsplit (FarmNumber, Operator, SplitPercent, SplitGroup, UserID) Values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->FarmNumber, $data->Operator, $data->SplitPercent, $data->SplitGroup, $_SESSION['ID']]);
}}

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

elseif ($data->tableName == "crop") {
  if ($data->CropID == null && $data->FieldID == null) {
    $sql = "DELETE FROM crop WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);
  }
 elseif ($data->counter < $data->length-1) {
$sql = "UPDATE crop SET CropID = ?, FieldID = ?, Year = ?, Description = ?, StartDate = ?, StopDate = ?, Latitude = ?, Longitude = ?, IsActive = ? WHERE ID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->CropID, $data->FieldID, $data->Year, $data->Description, $data->StartDate, $data->StopDate, $data->Latitude, $data->Longitude, $data->IsActive, $_SESSION['rowPrimaryID'][$data->counter], $_SESSION['ID']]);}
elseif (($data->counter == $data->length-1) && ($data->CropID != 0)) {
    $sql = "INSERT INTO crop (CropID, FieldID, Year, Description, StartDate, StopDate, Latitude, Longitude, IsActive, UserID) Values (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$data->CropID, $data->FieldID, $data->Year, $data->Description, $data->StartDate, $data->StopDate, $data->Latitude, $data->Longitude,$data->IsActive, $_SESSION['ID']]);
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
    $stmt->execute([$_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);
    $data->counter = $data->length+10;
  }
 elseif ($data->counter < $data->length-1) {
$sql = "UPDATE appgeninfo SET Applicator = ?, AppType = ?, DateApplied = ?, StopTime = ?, Conditions = ?, ReconcileDate = ?, FieldFrom = ?, FieldTo = ?, AutoSteerHeading = ? WHERE GenAppID = ? AND UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$data->Applicator, $data->AppType, $data->DateApplied, $data->StopTime, $data->Conditions, $data->ReconcileDate, $data->FieldFrom, $data->FieldTo, $data->AutoSteerHeading, $_SESSION['rowPrimaryID'][0], $_SESSION['ID']]);}
}

elseif ($data->tableName == "appchemtable") {
  if ($data->ChemAppID != null) {
    $sql = 'INSERT INTO appchemtable (GenAppID, ChemAppID, AppType, ChemID, MonitorAcres, Rate, TotalUsed, AdjustedAmount, Date, ReconcileDate, WindSpeed, WindDirection, Humidity, Temperature, TipSize, Pressure, GroundSpeed, Other, UserID) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->ChemAppID, $data->Apptype, $data->ChemID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $data->WindSpeed, $data->WindDirection, $data->Humidity, $data->Temperature, $data->TipSize, $data->Pressure, $data->GroundSpeed, $data->Other, $_SESSION['ID']]);
  }
}

elseif ($data->tableName == "appferttable") {
  if ($data->FertAppID != null) {
    $sql = 'INSERT INTO appferttable (GenAppID, FertAppID, AppType, FertID, MonitorAcres, Rate, TotalUsed, AdjustedAmount, Date, ReconcileDate, UserID) Values (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->FertAppID, $data->Apptype, $data->FertID, $data->MonitorAcres, $data->Rate, $data->TotalUsed, $data->AdjustedAmount, $data->Date, $data->ReconcileDate, $_SESSION['ID']]);
  }
}

elseif ($data->tableName == "appmiscentry") {
  if ($data->AppMiscEntryID != null) {
    $sql = 'INSERT INTO appmiscentry (GenAppID, AppMiscEntryID, AppType, AppDescription, EnteredAcres, CostPerAcre, TotalUsed, AdjustedAmount, UserID) Values (?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['GenAppID'], $data->AppMiscEntryID, $data->Apptype, $data->AppDescription, $data->EnteredAcres, $data->CostPerAcre, $data->TotalUsed, $data->AdjustedAmount, $_SESSION['ID']]);
  }
}
echo json_encode($data);
?>
