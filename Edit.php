<?php
/*
 * Edit.php
 * 
 * Copyright 2017 "" <Martin@DESKTOP-2T5PNPN>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<?php 
	include 'base.php';
	
	print isset($_POST['Worker'])? $workers: $users;
	
	$handle=isset($_POST['Worker']) ? fopen($workers,'r') : fopen($users,'r');
	
	$counter=0;
	while(!feof($handle)) {
		$line=fgets($handle);
		if($line!=null && $counter==$_POST['ID'])
		{
			$worker=unserialize($line);
			echo "<form method=\"post\" action=\"Update.php\" enctype=\"multipart/form-data\">
				<label for=\"name\" class=\"label\">Name</label> ".$worker->firstName."<br>

				<label for=\"familyName\" class=\"label\">Family Name</label>".$worker->familyName."<br>

				<label for=\"age\" class=\"label\">Age</label>
				<input type=\"number\" min=\"0\" max=\"100\" name=\"age\" class=\"age\" value =\"".$worker->age ."\" /><br>

				<label for=\"passwordOld\" class=\"label\">Old Password</label>
				<input type=\"password\" id=\"passwordOld\" name=\"passwordOld\" /><br>

				<label for=\"passwordNew\" class=\"label\">New Password</label>
				<input type=\"password\" id=\"passwordNew\" name=\"passwordNew\" /><br>

				<label for=\"securityQ\" class=\"label\">Secret Question</label>". $worker->securityQ."<br>
				<label for=\"securityAOld\" class=\"label\">Old Secret Answer</label>
				<input type=\"text\" name=\"securityAOld\" id=\"securityAOld\" autocomplete=\"off\" /><br>

				<label for=\"securityA\" class=\"label\">New Secret Answer</label>
				<input type=\"text\" name=\"securityA\" id=\"securitytA\" autocomplete=\"off\"/>
				<label for=\"cars\" class=\"label\">Cars</label>
				<input type=\"text\" name=\"cars\" class=\"cars\"/><br> 
				<br> ";

if(isset($_POST['Worker'])) print"
				<label for=\"paymentPerHour\" class=\"label\">Payment Per Hour</label>
				<input type=\"text\" name=\"paymentPerHour\" id=\"paymentPerHour\" autocomplete=\"off\" value=\"".$worker->paymentPerHour."\"/><br>
				
				<input type=\"hidden\" name=\"Worker\" id=\"Worker\" value=\"".$_POST['Worker']."\"/>
				
				<label for=\"paymentPerHour\" class=\"label\">Profession</label>
				<input type=\"text\" name=\"profession\" id=\"professsion\" autocomplete=\"off\" value=\"".$worker->profession."\"/><br>";
				
				print " <div class=\"btn-group\">
				<input type=\"file\" id=\"Profile Picture\" name=\"Profile Picture\" />
				<input type=\"hidden\" name=\"ID\" value=\"" .$counter. "\">
				<input type=\"submit\" class=\"button\" name=\"Update\" id=\"Update\" value=\"Update\"/ >
				</div>
				</form>";
		}
		$counter++;
	}
	fclose($handle);
	?>
</body>

</html>
