<?php
/*
 * Register.php
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
	<title>Register</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<?php 
	include 'base.php';
	
	$errors=array();

	if(!uploadValid($_FILES["Profile_Picture"]))
	array_push($errors,'Sorry, there was an error uploading your file. The worker is not created');
	if(!emailValid($_POST['email']))
	array_push($errors,'Invalid first email');
	if(!emailValid($_POST['secondEmail']))
	array_push($errors,'Invalid second email');
	
	if(isset($_POST['Worker']))
	{
	if(checkExistance($workers)) array_push($errors,"EXISTING WORKER by name or email");
	}
	else if(checkExistance($users))
	array_push($errors,"EXISTING USER by name or email");
	
	
	if(count($errors)==0){
		$handle=isset($_POST['Worker'])? fopen($workers,"a+") : fopen($users,'a+');
		
		if (move_uploaded_file($_FILES["Profile_Picture"]["tmp_name"], $pictures.basename($_FILES["Profile_Picture"]["name"]))){		
		
			if(isset($_POST['Worker']))
			fwrite($handle,serialize(new Workman( $_POST['firstName'], $_POST['familyName'], $_POST['age'],
				$_POST['sex'], $_POST['email'], $_POST['secondEmail'],
				$_POST['securityQ'], $_POST['cars'],
				sha1($_POST['securityA']), sha1($_POST['password']),
				$_FILES['Profile_Picture']["name"], $_POST['profession'], $_POST['paymentPerHour']))
				."\n");
			
			else fwrite($handle,serialize(new User(
							$_POST['firstName'], $_POST['familyName'],
							$_POST['age'], $_POST['sex'],
							$_POST['email'], $_POST['secondEmail'],
							$_POST['securityQ'], $_POST['cars'],
							sha1($_POST['securityA']), sha1($_POST['password']),
							$_FILES['Profile_Picture']["name"], in_array($_POST['firstName'].$_POST['familyName'],$names)))
							."\n");
			print "The file ". basename($_FILES["Profile_Picture"]["name"]). " has been uploaded. And the worker has been created successfully.";
		
		}
		else
		{
			print 'Sorry, the file was not moved. The worker/user is not created';
			unlink($pictures.basename($_FILES["Profile_Picture"]["name"]));
		}
		fclose($handle);
	}
	else for($x = 0; $x < count($errors); $x++) echo $errors[$x]."<br>";  
	print "done";
	?>
</body>

</html>
