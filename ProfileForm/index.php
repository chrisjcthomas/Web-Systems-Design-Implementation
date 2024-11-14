<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		<!--<link rel="stylesheet" type="text/css" href="my_style.css">-->
		<link rel="stylesheet" type="text/css" href="azq_style.css">
			
	</head>
	<body class="coffeebg">
		<!--<ul>
			  <li><a href='#'>Home</a></li>
			  <li><a href='#'>News</a></li>
			  <li><a href='showregister.php' >Users</a></li>
			  <li><a href= 'form.php'>Register</a></li>
			  <li><a href= 'index.php' class = 'active'>Login</a></li>
			  <form action='search.php'>
				  <input type='text' placeholder='Search...' name='search'/>
				  <input type='submit' name='btn_search' value='Search'>-->
			</form>
			</ul>
		<div class="center-me-login">
		<h1></h1>
		<fieldset>
			<legend>Login Form</legend>
		
		<form action = "validate.php" method= "POST">
			<table border = "0" padding = "5" cols = "2" >
				<!--<tr>
					<td colspan = "2"><h1>REGISTRATION FORM</h1></td>
				</tr>-->
				<tr>
					<td colspan = "2"><input name="usr" type = "text" placeholder = "Email" title = "Please enter your username here (e.g. johndoe1998@whomail.com)" value = "" class="auto-width" required/>
				</tr>
				<tr>
					<td colspan = "2"><input name="pw" type = "password" placeholder = "********" title = "Please enter your password " value = "" class = "auto-width" required/>
					</td>
				</tr>
				<tr>
					<td><input type = "submit" value = "Send Info" name = "lgn_submit"/></td>
					<td><input type = "reset" value = "Clear"/></td>
				</tr>
			</table>
		</form>
		</fieldset>
		</div>
	</body>
</html>