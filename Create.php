<?php
/*
 * Create.php
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
	<title>Create</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>


<form method="post" action="Register.php" enctype="multipart/form-data">

<label for="firstName" class="label">First Name</label>
				<input type="text" name="firstName" class="firstName" value="<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>" /><br>
<label for="familyName" class="label">Family Name</label>
				<input type="text" name="familyName" class="familyName" value="<?php if(isset($_POST['familyName'])) print $_POST['familyName']; ?>"/><br>
<label for="age" class="label">Age</label>
				<input type="number" min="0" max="100" name="age" class="age" value="<?php if(isset($_POST['age'])) print $_POST['age']; ?>" /><br>

<label for="sex" class="label">Sex</label>
<select name="sex">
		<option value="Male" checked>Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
			<option value="Apache Helicopter">Apache Helicopter</option>
		</select><br>

<label for="email" class="label">Email</label>
				<input type="text" name="email" class="email" value="<?php if(isset($_POST['email'])) print $_POST['email']; ?>"  /><br>

<label for="secondEmail" class="label">Second Email</label>
				<input type="text" name="secondEmail" class="secondEmail" value="<?php if(isset($_POST['secondEmail'])) print $_POST['secondEmail'];?>"  /><br>

<label for="securityQ" class="label">Secret Question</label>
<select name="securityQ">
	       	<option value="Where were you born?">Where were you born?</option>
	      	<option value="Who is your favourite author?">Who is your favourite author?</option>
	      	<option value="What is your mother\'s maiden name?">What is your mother\s maiden name?</option>
	      	<option value="What is your favourite musical genre?">What is your favourite musical genre?</option>
		</select><br>

<label for="securityA" class="label">Secret Answer</label>
				<input type="text" name="securityA" class="securityA" autocomplete="off" value="<?php if(isset($_POST['securityA'])) print $_POST['securityA']; ?>"  /><br>

<label for="password" class="label">Password</label>
				<input type="password" name="password" class="password" value="<?php if(isset($_POST['password'])) print $_POST['password']; ?>" /><br>
				
				
				
				<label for="model" class="label">Model</label>
				<input type="text" name="model" class="model" /><br>
				
<label for="trademark" class="label">Trademark</label>
				<input type="text" name="trademark" class="trademark" /><br>

<label for="engine" class="label">Engine Size</label>
				<input type="text" name="engineSize" class="engineSize" /><br>
				
<label for="production Year" class="label">Production Year</label>
				<input type="number" min="1900" max="2030" name="productionYear" class="productionYear" /><br>

<?php if(isset($_POST['Create_Worker'])) print "<input type=\"hidden\" name=\"Create Worker\" id=\"Create Worker\" value=\"Create Worker\"/>"; ?>
	

 
				
				

<?php include 'base.php';


$cars=null;

if(isset($_POST['Remove_Car']))
{
	$cars=unserialize(base64_decode($_POST['cars']));
	if(isset($_POST['Car_ID']))
	unset($cars[$_POST['Car_ID']]);
	print "THE RESULT IS: ".isset($_POST['Add_Car'])==false ."<br>";
}
if(isset($_POST['Add_Car']))
{
	
	$car=new Car($_POST['model'],$_POST['productionYear'],$_POST['trademark'],$_POST['engineSize']);
	if(!isset($_POST['cars']))
	$cars=array($car);
	else{ $cars=unserialize(base64_decode($_POST['cars'])); array_push($cars,$car);}
	
}
if($cars!=null){
	foreach($cars as $key=>$value)
	{var_dump($value); print "<input type=\"radio\" name=\"Car ID\" value=\"".$key."\"/>";}
	print "<br><br><br><input type=\"submit\" class=\"button\" name=\"Remove Car\" id=\"Remove Car\" value=\"Remove Car\" formaction=\"Create.php\" />";
		
	
	print "<input type=\"hidden\" name=\"cars\" value=\"".base64_encode(serialize($cars))."\"/>";
}

if(isset($_POST['Create_Worker'])){
 print ' 		<label for="profession" class="label">Profession</label>
				<input type="text" name="profession" class="profession"  value="'. (isset($_POST['profession']) ? $_POST['profession'] : '' ) .'"/><br>

				<input type="hidden" name="Worker" value="Worker"/>
				<label for="paymentPerHour" class="label">Payment Per Hour</label>
				<input type="text" name="paymentPerHour" class="paymentPerHour" value="'. (isset($_POST['paymentPerHour']) ? $_POST['paymentPerHour'] : '') . '"/>';} ?>

				<br><br><br>
				<input type="submit" class="button" name="Add Car" id="Add Car" value="Add Car" formaction="Create.php" />
				<input type="file" name="Profile Picture"/>
				<input type="submit" class="button" name="Register_Worker" id="Register" value="Register"/> </form>
</body>
</html>
