<?php
/*
 * Search.php
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
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<?php
	include 'base.php';
	$handle=fopen($workers,'r') or print 'UNABLE TO OPEN FILE';
	$found=false;
	while(!feof($handle) && !$found) {
		$line=fgets($handle);
		if($line!=null)
		{
			$worker=unserialize($line);
			if($_GET['CriteriaType']==='profession' &&  $worker->profession===$_GET['Criteria'])
			{
				$found=true;
				var_dump($worker);
				
			}
			if($_GET['CriteriaType']==='salary' &&  $worker->paymentPerHour===$_GET['Criteria'])
			{
				$found=true;
								var_dump($worker);
			}
		}
	}
	if(!$found) print "Workman Not found.";
	fclose($handle);
	?>
</body>

</html>
