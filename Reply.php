<?php
/*
 * Reply.php
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
if(isset($_POST['Reply_Worker']))
{
					print file_get_contents($comments.$_POST['ID'].$_POST['Worker'])."<br>";
					print file_get_contents($replies.$_POST['ID'].$_POST['Worker']);
					print
					"<form method=\"post\" action=\"Reply.php\">
					<input type=\"hidden\" name=\"ID\" value=\"" .$_POST['ID'].$_POST['Worker'].  "\">
					<textarea rows=\"5\" cols=\"10\" name=\"Text\"> </textarea>
					<input type=\"submit\" class=\"button\" name=\"Reply\" id=\"Reply\" value=\"Reply\"/ >
					</form><br><br>";
	}
if(isset($_POST['Reply']))
{
	$replies=fopen($replies.$_POST['ID'],"a+") or print "ERROR with reading reply file";
	fwrite($replies,$_POST['Text']."\n");
	fclose($replies);
	header("Location:index.php");
}
	?>
</body>

</html>
