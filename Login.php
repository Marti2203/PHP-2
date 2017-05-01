<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
<form method="post" action="SignIn.php">

<label for="firstName" class="label">First Name</label>
<input type="text" name="firstName" class="firstName"/><br>

<label for="familyName" class="label">Family Name</label>
<input type="text" name="familyName" class="familyName"/><br>

<label for="securityA" class="label">Secret Answer</label>
<input type="text" name="securityA" class="securityA" autocomplete="off" /><br>

<label for="password" class="label">Password</label>
<input type="password" name="password" class="password"/><br>

<input type="submit" class="button" name="Sign in Worker" id="Sign in" value="Sign in Worker"/>
<input type="submit" class="button" name="Sign in User" id="Sign in" value="Sign in User"/>  </form>
</body>

</html>
