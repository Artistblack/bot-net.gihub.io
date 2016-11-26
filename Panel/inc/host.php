<?php
session_start();
error_reporting(0);

require_once('session.php');
require_once('config.php');
include('functions.php');

if (isset($_POST['Host']))
  {
    $Data = base64_encode($_POST['Host']);
    $file = fopen("read.php", "w");
    fwrite($file, $Data);
    header('location: host.php');
  }



$NFile  = "read.php";
$handle = fopen($NFile, "r");
$IData  = fread($handle, filesize($NFile));


echo '<link rel="stylesheet" href="../css/sbody.css">
	<div id="form-container"> 
			<form action="host.php" method="POST">
				<p align="center">
				   <big><b>[Host File Editor]</b></big>
				   <textarea rows="15" name="Host" cols="250" style="width:100%; text-align:left;">' . base64_decode($IData) . '</textarea>
				   <br><input class="btn" type="submit" value="Save"; name="B1">
				</p>	
			</form>
		</div>';

?>