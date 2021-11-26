<!DOCTYPE html>

<?php
    echo"Your final grade: " . $_SESSION['points'];
    
    $conn->close();
?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Math Exam Answers</title>
	<link rel="stylesheet" href="phpsql.css">
</head>
<body>
	<div id="divSubmit">
	<h3>Your final grade and answers</h3>
	<br>
	<br>
	<h1>Basic Calculations</h1>
	<br>
		<p>1. 98 - 56 + 45 = </p><br> 
        <p>2. 376 - 678 + 236 = </p><br>
        <p>3. 6 X 7-9 X 5 = </p><br>
		<p>4. 56 X 5 + 23 X 9 - 567 = </p><br>
		<p>5. 120 + 10 / 2 = </p><br>
		<h1>Units</h1><br>
		<p>6. Change to milligrams - 925 micrograms = </p><br> 
        <p>7. Change to grams - 7260 mg = </p><br>
        <p>8. Change to milliliters - 4.5 L = </p><br>
		<p>9. Change to Liters - 725 ml = </p><br>
		<p>10. Change to micrometer - 22.45 mm = </p><br>
		<h1>Percentage 10 Points</h1><br>
		<p>11. 10 % of 2500 = </p><br> 
        <p>12. 30 % of 4700 = </p><br>
        <p>13. 50 % of 7500 = </p><br>
		<p>14. 80 % of 9200 = </p><br>
		<p>15. 42 % of 4800 = </p><br>
	</div>

</body>
</html>