<?php

session_start();

?>

<!DOCTYPE html>

<?php

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

require_once("login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$_SESSION['first'] = $_POST['first'];
	$_SESSION['second'] = $_POST['second'];
	$_SESSION['third'] = $_POST['third'];
	$_SESSION['fourth'] = $_POST['fourth'];
	$_SESSION['fifth'] = $_POST['fifth'];
	$_SESSION['answers'] = array($_SESSION['first'], $_SESSION['second'], $_SESSION['third'], $_SESSION['fourth'], $_SESSION['fifth']);

		//checkint-button pressed
		if (isset($_POST['checkAnswers'])) {
			$_SESSION['points'] = 0;
			//validation and point calc
			for ($i = 0; $i < sizeof($_SESSION['answers']); $i++) {
				//for-loop checks if answers were numbers or not
				if (filter_var($_SESSION['answers'][$i], FILTER_VALIDATE_INT) == false) {
					echo "Alert: " . $_SESSION['answers'][$i] . " is not a number - ";
					}
				}

				if ($_SESSION['first'] == '87') {
					$_SESSION['points']++;
				} if ($_SESSION['second'] == '-66') {
					$_SESSION['points']++;
				} if ($_SESSION['third'] == '-3') {
					$_SESSION['points']++;
				} if ($_SESSION['fourth'] == '-80') {
					$_SESSION['points']++;
				} if ($_SESSION['fifth'] == '125') {
					$_SESSION['points']++;
				}

			}

			require_once("units.php");

			require_once("pct.php");

			if (isset($_POST['finish'])) {

			//tee error handling
			$stmt = $conn->prepare("INSERT INTO students (FNAME, LNAME, POINTS) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $_SESSION['fname'] , $_SESSION['lname'], $_SESSION['points']);
			$stmt->execute();
		
			//$conn->close();
		
			}

		}

		echo $_SESSION['points'];
		echo $_SESSION['fname'];
		echo $_SESSION['lname'];

?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Math Exam</title>
	<link rel="stylesheet" href="phpsql.css">
</head>
<body>
	<div id="divExam">
	<h3>Math Test - Time Limit 30 minutes</h3>
	<br>
	<br>
	<h1>Basic Calculations</h1>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		1. 98 - 56 + 45 = <input type="text" name="first"><br> 
        2. 376 - 678 + 236 = <input type="text" name="second"><br>
        3. 6 X 7-9 X 5 = <input type="text" name="third"><br>
		4. 56 X 5 + 23 X 9 - 567 = <input type="text" name="fourth"><br>
		5. 120 + 10 / 2 = <input type="text" name="fifth"><br>
		<h1>Units</h1><br>
		6. Change to milligrams - 925 micrograms = <input type="text" name="firstU"><br> 
        7. Change to grams - 7260 mg = <input type="text" name="secondU"><br>
        8. Change to milliliters - 4.5 L = <input type="text" name="thirdU"><br>
		9. Change to Liters - 725 ml = <input type="text" name="fourthU"><br>
		10. Change to micrometer - 22.45 mm = <input type="text" name="fifthU"><br>
		<h1>Percentage 10 Points</h1><br>
		11. 10 % of 2500 = <input type="text" name="firstP"><br> 
        12. 30 % of 4700 = <input type="text" name="secondP"><br>
        13. 50 % of 7500 = <input type="text" name="thirdP"><br>
		14. 80 % of 9200 = <input type="text" name="fourthP"><br>
		15. 42 % of 4800 = <input type="text" name="fifthP"><br><br>
        <input type="submit" name="checkAnswers" value="Submit">

	</form>
	
	<br><br>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<a href="submit.php">
	<input type="submit" name="finish" value="Submit the test">
	</a>
	</form>
	</div>

</body>
</html>

