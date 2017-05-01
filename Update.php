<?php
/*
 * Update.php
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
	<title>Update</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<?php 
	include 'base.php';
	$handle=isset($_POST['Worker']) ? fopen($workers,'r') : fopen($users,'r');
	$temp=fopen('update_temp.txt','w') or print 'UNABLE TO CREATE TEMP FILE';
	$targetPosition=$pictures. 	basename($_FILES["Profile_Picture"]["name"]);
	$counter=0;
	$success=false;
	while(!feof($handle)) {
		$line=fgets($handle);
		if($line!=null && $counter==$_POST['ID'])
		{
			$worker=unserialize($line);
			if(sha1($_POST['passwordOld'])!=$worker->password){
				print 'Passwords do not match, update unsuccessful.';
				break;
			}

			if(sha1($_POST['securityAOld'])!=$worker->securityA)
			{
				print 'Secret Answers do not match, update unsuccessful.';
				break;
			}

			$worker->password=sha1($_POST['passwordNew']);
			$worker->securityA=sha1($_POST['securityA']);
			$worker->age=$_POST['age'];
			$worker->cars=$_POST['cars'];
			if(isset($_POST['Worker'])){
			$worker->profession=$_POST['profession'];
			$worker->paymentPerHour=$_POST['paymentPerHour'];
			}

			if(uploadValid($_FILES["Profile_Picture"])){
				if (move_uploaded_file($_FILES["Profile_Picture"]["tmp_name"], $targetPosition)){
					$worker->profilePicture=$_FILES['Profile_Picture']["name"];
					print "The file ". basename($_FILES["Profile_Picture"]["name"]). " has been uploaded. And the user has been updated successfully.";
				}
				else
				{
					print 'Sorry, the file was not moved. The worker picture is not updated';
					unlink($targetPosition);
				}
			}
			else print 'Sorry, there was an error uploading your file. The worker picture is not updated.';

			$success=true;
			fwrite($temp,serialize($worker)."\n");
		}
		else fwrite($temp,$line."\n");
		$counter++;
	}
	fclose($handle);
	fclose($temp);

	if($success==true){
		if(rename('update_temp.txt', isset($_POST['Worker']) ? $workers : $users))
		print "SUCCESS";
		else print "FAIL";
	}
	?>
</body>

</html>
