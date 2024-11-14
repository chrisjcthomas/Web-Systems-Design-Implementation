<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
		<!--<link rel="stylesheet" type="text/css" href="my_style.css">-->
		<link rel="stylesheet" type="text/css" href="azq_style.css">
			
	</head>
	<body class="coffeebg">
		<ul>
		  <li><a href='#'>Home</a></li>
		  <li><a href='#'>News</a></li>
		  <li><a href='showregister.php'>Users</a></li>
		  <li><a href= 'form.php'  class = 'active'>Register</a></li>
		  <li><a href= 'index.php'>Login</a></li>

		  <form>
			  <input type='text' placeholder='Search...' name='search'/>
			  <input type='submit' name='btn_search' value='Search'>
		</form>
		</ul>
		<div class="center-me">
		<h1></h1>
		<fieldset>
			<legend>Registration Form</legend>
		
		<form action="validate_form.php" method="POST" enctype="multipart/form-data">
    <table border="0" padding="5" cols="2">
        <tr>
            <td><input name="fname" type="text" placeholder="[First Name]" title="Please enter your first name here (e.g. David)" value="" class="auto-width"/></td>
            <td><input name="lname" type="text" placeholder="[Last Name]" title="Please enter your last name here (e.g. BarJese)" value=""/></td>
        </tr>
        <tr>
            <td><label>Date of Birth:</label></td>
            <td><input type="date" class="auto-width" name="dob" /></td>
        </tr>
        <tr>
            <td><label><strong>Gender:</strong></label></td>
            <td><input type="radio" value="Male" name="gender"/><label>Male</label>
                <input type="radio" value="Female" name="gender"/><label>Female</label></td>
        </tr>
        <tr>
            <td><label>Marital Status:</label></td>
            <td><select name="mstatus">
                <option value="">-- Please select a Marital Status --</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select></td>
        </tr>
        <tr>
            <td><label>Email:</label></td>
            <td><input class="email auto-width" type="email" placeholder="@Email Address" name="email" title="Please enter your email address here" value=""/></td>
        </tr>
        <tr>
            <td><label>Short Bio</label><br>
                <textarea rows="4" cols="21" name="bio" placeholder="My comments are..." class="auto-width"></textarea></td>
            <td style="vertical-align:top;"><label>Upload Photo</label><br>
                <input type="file" name="profilePic" id="profilePic" accept="image/*"/><br>
            </td>
        </tr>
        <tr>
            <td><label>Password</label><br>
                <input name="pw" type="password" placeholder="*******" title="Please enter your password" value="" class="auto-width"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Send Info" name="btn_submit"/></td>
            <td><input type="reset" value="Clear"/></td>
        </tr>
    </table>
</form>

		</fieldset>
		</div>
	</body>
</html>