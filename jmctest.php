<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>

<div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
  Field Name:<input type="text" name="FieldName"></input>
  Acres:<input type="number" name="Acres"></input>
  <input type="text"name="County"></input>
  <input type="text" name="Township"></input>
  <input type="text" name="Section"></input><br />
  Quarter Section:<input type="radio" name="Quarter" id="Quarter1" value="0"><label for="Quarter1">NE</label></input>
  <input type="radio" name="Quarter" id="Quarter2" value="1"><label for="Quarter2">SE</label></input>
  <input type="radio" name="Quarter" id="Quarter3" value="2"><label for="Quarter3">NW</label></input>
  <input type="radio" name="Quarter" id="Quarter4" value="3"><label for="Quarter4">SW</label></input>
  <br />
  Tillage:<input type="radio" name="Tillage" id="Tillage1" value="0"><label for="Tillage1">No Till</label></input>
  <input type="radio" name="Tillage" id="Tillage2" value="1"><label for="Tillage2">Minimum Till</label></input>
  <input type="radio" name="Tillage" id="Tillage3" value="2"><label for="Tillage3">Fall</label></input>
  <input type="radio" name="Tillage" id="Tillage4" value="3"><label for="Tillage4">Spring</label></input>
  <input type="radio" name="Tillage" id="Tillage5" value="4"><label for="Tillage5">Strip Till</label></input><br />

  Planting Date:<input type="date" name="Plantingdate"></input>
  <input type="text" name="LastYearCrop"></input>
  <input type="number" name="YearsCorn"></input>
  <input type="text" name="Irrigated"></input>
  <input type="text" name="Rotational"></input>
  <input type="number" name="CropYear"></input>
  <input type="text" name="CoverCrop"></input>
  <input type="date" name="DateSeeded"></input>
  <input type="text" name="HowSeeded"></input>
  <input type="number" name="Ncredits"></input><br />
    <label for="HowKilled">Cover Crop Termination:</label>
    <select name="HowKilled" id="How1">
        <option value="0">Chemical</option>
        <option value="1">Tillage</option>
        <option value="2">Harvested</option>
        <option value="3">Other</option>
    </select><br />
<!--
  <input type="radio" name="HowKilled" id="How1" value="0"><label for="How1">Chemical</label></input>
  <input type="radio" name="HowKilled" id="How2" value="1"><label for="How2">Tillage</label></input>
  <input type="radio" name="HowKilled" id="How3" value="2"><label for="How3">Harvested</label></input>
  <input type="radio" name="HowKilled" id="How4" value="3"><label for="How4">Other</label></input><br />
-->
  Date Killed:<input type="date" name="DateKilled"></input>
  <input type="text" name="Last5"></input><br />
  <input type="radio" name="8of10" id="8of101" value="0"><label for="8of101">Yes</label></input>
  <input type="radio" name="8of10" id="8of102" value="1"><label for="8of102">No</label></input>
  <input type="radio" name="8of10" id="8of103" value="1"><label for="8of103">Don't Know</label></input>
  <br /><input type="submit"></input></div>
</div>

</body>
</html>
