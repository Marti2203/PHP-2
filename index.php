<!DOCTYPE html>
<html>
<head>
<title>Index</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="btn-group">
<form method="get" action="Login.php"> <input type="submit" class="button" value="Log In" /> </form>

<form method="post" action="Create.php">
<input type="submit" class="button" name="Create Worker" id="Create" value="Create Worker" />
<input type="submit" class="button" name="Create User" id="Create" value="Create User" />
</form>

<form method="post" action="List.php">
<input type="submit" name="Worker" class="button" value="List All" />
</form>

<form method="get" action="Search.php">
<input type="submit" class="button" value="Search" />
<select name="CriteriaType"> 
		<option value="paymentPerHour" checked>Salary</option>
		<option value="profession">Profession</option>
		</select>
<input type="text" name="Criteria" id="Criteria"/>
</form>
</div>
</body>
</html>
