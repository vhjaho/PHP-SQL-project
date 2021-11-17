<!DOCTYPE html>

<?php

$servername = "127.0.0.1:49838";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "phpsqltest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($_SERVER['REQUEST_METHOD'] == 'POST')

	{
		//checkint-button pressed
		if (isset($_POST['login'])) {
		
			//tee validaatio
			$_SESSION['fname'] = $_POST['fname'];
			$_SESSION['lname'] = $_POST['lname'];

		}
	}
?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Title</title>
	<link rel="stylesheet" href="css-tiedosto">
</head>
<body>
	<h3>Math Test - Time Limit 60 minutes</h3>
	<br>
	<br>
	<h1>Insert your first and last name</h1>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Give your first name: <input type="text" name="fname"><br> 
        Give your last name: <input type="text" name="lname"><br>
        <label for="slc">Are you a student or a teacher?</label>
        <select name="slc" id="slc">
            <option value="volvo">Student</option>
            <option value="saab">Teacher</option>
        </select>
        <input type="submit" name="login" value="Login">

	</form>

</body>
</html>