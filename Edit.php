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
	
	$handle=isset($_POST['Worker']) ? fopen($workers,'r') : fopen($users,'r');

	$counter=0;
	while(!feof($handle)) {
		$line=fgets($handle);
		if($line!=null && $counter==$_POST['ID'])
		{
			$user=unserialize($line);
			
			echo "<form method=\"post\" action=\"Update.php\" enctype=\"multipart/form-data\">
				<label for=\"name\" class=\"label\">Name</label> ".$user->firstName."<br>

				<label for=\"familyName\" class=\"label\">Family Name</label>".$user->familyName."<br>

				<label for=\"age\" class=\"label\">Age</label>
				<input type=\"number\" min=\"0\" max=\"100\" name=\"age\" class=\"age\" value =\"".$user->age ."\" /><br>

				<label for=\"passwordOld\" class=\"label\">Old Password</label>
				<input type=\"password\" id=\"passwordOld\" name=\"passwordOld\"  value=\"". (isset($_POST['passwordOld']) ? $_POST['passwordOld'] : "")  ."\"/><br>

				<label for=\"passwordNew\" class=\"label\">New Password</label>
				<input type=\"password\" id=\"passwordNew\" name=\"passwordNew\"  value=\"". (isset($_POST['passwordNew']) ? $_POST['passwordNew'] : "")  ."\"/><br>

				<label for=\"securityQ\" class=\"label\">Secret Question</label>". $user->securityQ."<br>
				<label for=\"securityAOld\" class=\"label\">Old Secret Answer</label>
				<input type=\"text\" name=\"securityAOld\" id=\"securityAOld\" autocomplete=\"off\" value=\"". (isset($_POST['securityAOld']) ? $_POST['securityAOld'] : "")  ."\" /><br>

				<label for=\"securityA\" class=\"label\">New Secret Answer</label>
				<input type=\"text\" name=\"securityA\" id=\"securitytA\" autocomplete=\"off\ value=\"". (isset($_POST['securityA']) ? $_POST['securityA'] : "")  ."\" /> <br>
				
								
				<label for=\"model\" class=\"label\">Model</label>
				<input type=\"text\" name=\"model\" class=\"model\" /><br>
				
				<label for=\"trademark\" class=\"label\">Trademark</label>
				<input type=\"text\" name=\"trademark\" class=\"trademark\" /><br>

				<label for=\"engine\" class=\"label\">Engine Size</label>
				<input type=\"text\" name=\"engineSize\" class=\"engineSize\" /><br>
				
				<label for=\"production Year\" class=\"label\">Production Year</label>
				<input type=\"number\" min=\"1900\" max=\"2030\" name=\"productionYear\" class=\"productionYear\" /><br>	
				";

if(!isset($_POST['cars']) && $user->cars!=null)
$_POST['cars']=$user->cars;

if(isset($_POST['Remove_Car']))
{
	if(isset($_POST['Car_ID'])){
	$arr=unserialize(base64_decode($_POST['cars']));
	
	unset($arr[$_POST['Car_ID']]);
	$_POST['cars']=base64_encode(serialize($arr));
	}
}

if(isset($_POST['Add_Car']))
{
	$car=new Car($_POST['model'],$_POST['productionYear'],$_POST['trademark'],$_POST['engineSize']);
	if($_POST['cars']==null)$_POST['cars']=base64_encode(serialize(array($car)));
	else 
	{	$arr=unserialize(base64_decode($_POST['cars']));
			array_push($arr,$car);
	$_POST['cars']=base64_encode(serialize($arr));
	}
}

if(isset($_POST['Worker'])) print"
				<label for=\"paymentPerHour\" class=\"label\">Payment Per Hour</label>
				<input type=\"text\" name=\"paymentPerHour\" id=\"paymentPerHour\" autocomplete=\"off\" value=\"".$user->paymentPerHour."\"/><br>
				
				<input type=\"hidden\" name=\"Worker\" id=\"Worker\" value=\"".$_POST['Worker']."\"/>
				
				<label for=\"paymentPerHour\" class=\"label\">Profession</label>
				<input type=\"text\" name=\"profession\" id=\"professsion\" autocomplete=\"off\" value=\"".$user->profession."\"/><br>";

if($_POST['cars']!=null){
	foreach(unserialize(base64_decode($_POST['cars'])) as $key=>$value)
	{var_dump($value); print "<input type=\"radio\" name=\"Car ID\" value=\"".$key."\"/>";}
	print "<br><br><br><input type=\"submit\" class=\"button\" name=\"Remove Car\" id=\"Remove Car\" value=\"Remove Car\" formaction=\"Edit.php\" />";
}					
		
				print " <div class=\"btn-group\">
				<input type=\"submit\" class=\"button\" name=\"Add Car\" id=\"Add Car\" value=\"Add Car\" formaction=\"Edit.php\" />
				<input type=\"file\" id=\"Profile Picture\" name=\"Profile Picture\" />
				<input type=\"hidden\" name=\"cars\" value=\"". (isset($_POST['cars']) ? $_POST['cars'] : null)  ."\"/>
				<input type=\"hidden\" name=\"ID\" value=\"" .$counter. "\">
				<input type=\"submit\" class=\"button\" name=\"Update\" id=\"Update\" value=\"Update\"/ >
				</div>
				</form>";

				print "<br>";
		}
		$counter++;
	}
	fclose($handle);
	?>
</body>

</html>
