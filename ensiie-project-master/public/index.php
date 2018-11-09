<?php
//require '../vendor/autoload.php';
//require 'addFood/getAPIopenfoodFact/getApiopenFoodFact.php';
//require 'sendMail/sendMail.php';
//require 'header/header.php';  
//equire 'getDataPHP.php';
//require 'adminPage/adminPage.php';
//require 'Authentification/authentification.php';
?>
<!DOCTYPE html>
<html>
<head><script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="views/authentification/css/authentification.css">

<title>Smart Fridge</title>
</head>
<body>
<form>
  <div class="form-row">
    <div class="col-md-2 mb-1" id="firstName">
      <label for="validationServer01">Mail</label>
      <input type="text" id="mail" class="form-control is-valid" required>
    </div>
    <div class="col-md-2 mb-1" id="lastName">
      <label for="inputPassword5">Password</label>
      <input type="password" id="password" class="form-control"  required>
    </div>
</div>
</form>
<button class="btn btn-primary" id="submitB">Connection</button>
<div id="temp2"></div>
<script src="../js/controllers/authentification.js"></script>
<script>var authentification =  authentification.check()</script>
</body>
</html>
