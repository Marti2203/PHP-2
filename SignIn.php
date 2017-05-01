<?php
/*
 * SignIn.php
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
if(isset($_POST['Sign_in_Worker'])){
	$handle=fopen($workers,'r') or print 'UNABLE TO OPEN FILE';
	$found=false;
	while(! (feof($handle) || $found) ) {
		$line=fgets($handle);
		if($line!=null)
		{
			$worker=unserialize($line);
			if($worker->firstName ===$_POST['firstName']
				&& $worker->familyName==$_POST['familyName']
				&& sha1($_POST['password'])===$worker->password)
			{
				$counter=0;
				while(file_exists($comments.$counter.$worker->firstName.$worker->familyName))
				{
					print file_get_contents($comments.$counter.$worker->firstName.$worker->familyName)."<br>";
					print file_get_contents($replies.$counter.$worker->firstName.$worker->familyName);

					print
					"<form method=\"post\" action=\"Reply.php\">
					<input type=\"hidden\" name=\"Worker\" value=\"" .$worker->firstName.$worker->familyName. "\">
					<input type=\"hidden\" name=\"ID\" value=\"" .$counter. "\">
					<input type=\"submit\" class=\"button\" name=\"Reply Worker\" id=\"Reply\" value=\"Reply\"/ >
					</form><br><br><br>";
					$counter++;
					}
				$found=true;
			}
		}
	}
	if(!$found) print 'Worker not found. Wrong password or name.';
	fclose($handle);
}
if(isset($_POST['Sign_in_User'])){
	$handle=fopen($users,'r') or print 'UNABLE TO OPEN FILE';
	$found=false;
	while(! (feof($handle) || $found) ) {
		$line=fgets($handle);
		if($line!=null)
		{
			$user=unserialize($line);
			if($user->firstName ===$_POST['firstName']
				&& $user->familyName===$_POST['familyName']
				&& $user->password===sha1($_POST['password']))
			{
				$counter=0;
				while(file_exists($data.$counter.$user->firstName.$user->familyName))
				{
					print file_get_contents($data.$counter.$user->firstName.$user->familyName)."<br>";
				$counter++;
				}
				print "<form method=\"post\" action=\"SetText.php\">
				<textarea rows=\"5\" cols=\"10\" name=\"Text\"> </textarea>
				<input type=\"hidden\" name=\"ID\" value=\"" .$counter.$user->firstName.$user->familyName. "\">
				<input type=\"submit\" class=\"button\" name=\"Set Text\" id=\"Update\" value=\"Set Text\"/ >
				</form>";
				$found=true;
				
				if($user->isAdmin)
				print "<form method=\"post\" action=\"List.php\"> <input type=\"submit\" class=\"button\" value=\"Check Users\"> </form>";
			}
		}
	}
	if(!$found) print 'USER not found. Wrong password or name.';
	fclose($handle);
}
?>
</body>

</html>
