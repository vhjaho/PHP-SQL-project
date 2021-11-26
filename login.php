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
		
			if (strlen($_POST['fname'])>10) {
				echo 'First name is too long.';

			} else if (strlen($_POST['lname'])>10) {
				echo 'Last name is too long.';

			} else if (strlen($_POST['fname'])<3) {
				echo 'Last name is too short.';

			} else if (strlen($_POST['lname'])<3) {
				echo 'Last name is too long.';

			} else if (filter_var($_POST['fname'], FILTER_VALIDATE_INT) == true) {
				echo 'Numbers are not allowed';

			} else if (filter_var($_POST['lname'], FILTER_VALIDATE_INT) == true) {
				echo 'Numbers are not allowed';

			} else {

				$_SESSION['fname'] = $_POST['fname'];
				$_SESSION['lname'] = $_POST['lname'];
				echo"Welcome, " . $_SESSION['fname'] . " " . $_SESSION['lname'];

			}
			
		}

	}

?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Math Exam</title>
</head>
<body>
	<div id=divLog>
	<br>
	<br>
	<h1>Insert your first and last name</h1>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Give your first name: <input type="text" name="fname"><br> 
        Give your last name: <input type="text" name="lname"><br>
        <label for="slc">Are you a student or a teacher?</label>
        <select name="slc" id="slc">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="submit" name="login" value="Login">

	</form>
	</div>
</body>
</html>