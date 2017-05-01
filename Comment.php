<?php
/*
 * Comment.php
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
if(isset($_POST['Comment_Worker']))
{
	$counter=0;
	while(file_exists($comments.$counter.$_POST['Worker'])){	
	print file_get_contents($comments.$counter.$_POST['Worker']).
	file_get_contents($replies.$counter.$_POST['Worker'])."<br>";
	$counter++;
	}
		print
					"<form method=\"post\" action=\"Comment.php\">
					<input type=\"hidden\" name=\"Worker\" value=\"" .$_POST['Worker']. "\">
					<input type=\"hidden\" name=\"ID\" value=\"". $_POST['ID'] ."\">
					<input type=\"hidden\" name=\"Counter\" value=\"".$counter."\">
					<input type=\"radio\" name=\"approval\" value=\"disapprove\"> Disapprove<br>
					<input type=\"radio\" name=\"approval\" value=\"approve\">Approve<br>
					<input type=\"radio\" name=\"approval\" value=\"neutral\" checked>Neutral<br>
					<textarea rows=\"5\" cols=\"10\" name=\"Text\"> </textarea>
					<input type=\"submit\" class=\"button\" name=\"Comment\" id=\"Comment\" value=\"Comment\"/ > 
					
									<label for=\"firstName\" class=\"label\">First Name</label>
					<input type=\"text\" name=\"firstName\">
									<label for=\"familyName\" class=\"label\">Family Name</label>
					<input type=\"text\" name=\"familyName\">
									<label for=\"password\" class=\"label\">Password</label>
					<input type=\"password\" name=\"password\">
					

					</form><br><br>"; 
} 
if(isset($_POST['Comment']))
{
	$handle=fopen($users,"r");
	$found=false;
	while(!feof($handle) && !$found)
	{
		$user=unserialize(fgets($handle));
		if($user->firstName===$_POST['firstName'] && $user->familyName===$_POST['familyName'] 
		&& $user->password===sha1($_POST['Password']))
		$found=true;
		}
	
	if(!$found){print "USER DOES NOT EXIST"; die;}
	$handle=fopen($workers,"r");
	$temp=fopen("workers_temp.txt","w");
	$counter=0;
	while(!feof($handle))
	{
		$line=fgets($handle);
		if($counter!=$_POST['ID'])
		fwrite($temp,$line."\n");
		else 
		{
			$worker=unserialize($line);
			switch ($_POST['approval'])
			{
				case "approve":
				$worker->approve++;
				break;
				case "disapprove":
				$worker->disapprove++;
				break;
				case "neutral":
				$worker->neutral++;
				break;
			}
			fwrite($temp,serialize($worker)."\n");
			}
	}
	fclose($handle);
	fclose($temp);
	
	if(rename("workers_temp.txt",$workers))
	print "SUCCESS";
	else print "FAIL";
	
	$comments=fopen($comments.$_POST['Counter'].$_POST['Worker'],"a+") or print "ERROR with reading comment file";
	fwrite($comments,$_POST['firstName'].$_POST['familyName'].$_POST['approval']."-".$_POST['Text']."\n");
	fclose($comments);
}
	?>
</body>

</html>
