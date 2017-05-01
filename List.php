<?php
/*
 * List.php
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
	//print isset($_POST['Worker'])? $workers: $users;
	$handle=isset($_POST['Worker']) ? fopen($workers,'r') : fopen($users,'r');
	
	$counter=0;
	while(!feof($handle)) {
		$line=fgets($handle);
		if($line!=null)
		{
			$worker=unserialize($line);
			if($worker==null)continue;
			foreach(get_object_vars($worker) as $key => $value)
			if($key!='isAdmin')
				echo $key."=>".$value."\t";
			echo "<img src=\"".$pictures.$worker->profilePicture."\"alt=Error>
				<form method=\"post\" action=\"Edit.php\">
				<input type=\"hidden\" name=\"ID\" value=\"" .$counter. "\"> ";
			
			if(isset($_POST['Worker']))
			print"<input type=\"hidden\" name=\"Worker\" value=\"" .$worker->firstName.$worker->familyName. "\">";
			
			
			print"<input type=\"submit\" class=\"button\" value=\"Edit\"/> </form>";
			
			if(isset($_POST['Worker']))
			print"<form method=\"post\" action=\"Comment.php\">
				<input type=\"hidden\" name=\"ID\" value=\"" .$counter. "\">
				<input type=\"hidden\" name=\"Worker\" value=\"" .$worker->firstName.$worker->familyName. "\">
				<input type=\"submit\" class=\"button\" name=\"Comment Worker\" id=\"Comment Worker\" value=\"Comment Worker\">
				</form>";
			
			print "<br><br><br>";
		}
		$counter++;
	}
	fclose($handle); 
	?>
</body>

</html>
