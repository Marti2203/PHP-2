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
				<input type="text" name="firstName" class="firstName"/><br>
<label for="familyName" class="label">Family Name</label>
				<input type="text" name="familyName" class="familyName"/><br>
<label for="age" class="label">Age</label>
				<input type="number" min="0" max="100" name="age" class="age"/><br>

<label for="sex" class="label">Sex</label>
<select name="sex">
		<option value="Male" checked>Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
			<option value="Apache Helicopter">Apache Helicopter</option>
		</select><br>

<label for="email" class="label">Email</label>
				<input type="text" name="email" class="email"/><br>

<label for="secondEmail" class="label">Second Email</label>
				<input type="text" name="secondEmail" class="secondEmail" /><br>



<label for="securityQ" class="label">Secret Question</label>
<select name="securityQ">
	       	<option value="Where were you born?">Where were you born?</option>
	      	<option value="Who is your favourite author?">Who is your favourite author?</option>
	      	<option value="What is your mother\'s maiden name?">What is your mother\s maiden name?</option>
	      	<option value="What is your favourite musical genre?">What is your favourite musical genre?</option>
		</select><br>

<label for="securityA" class="label">Secret Answer</label>
				<input type="text" name="securityA" class="securityA" autocomplete="off" /><br>

<label for="password" class="label">Password</label>
				<input type="password" name="password" class="password"/><br>
								
<label for="cars" class="label">Cars</label> <input type="text" name="cars" class="cars"/><br> 

<?php
if(isset($_POST['Create_Worker'])){
 print ' 		<label for="profession" class="label">Profession</label>
				<input type="text" name="profession" class="profession"/><br>

				<input type="hidden" name="Worker" value="Worker"/>
				<label for="paymentPerHour" class="label">Payment Per Hour</label>
				<input type="text" name="paymentPerHour" class="paymentPerHour" /><br> ';} ?>

				<input type="file" name="Profile Picture"/>
				<input type="submit" class="button" name="Register_Worker" id="Register" value="Register"/> </form>
</body>

</html>
