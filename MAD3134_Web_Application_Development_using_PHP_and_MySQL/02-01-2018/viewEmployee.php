<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/spectre.min.css">
    <link rel="stylesheet" href="css/spectre-exp.min.css">
    <link rel="stylesheet" href="css/spectre-icons.min.css">
  </head>
  <body>
    <header>
      <h1> VIEW EMPLOYEE PANEL </h1>
    </header>

    <nav>
      <ul>
        <li>
			<a href="index.php">Home</a>
        </li>
        <li>
			<a href="employees.php">Employees</a>
        </li>
		<li>
			<a href="#">Courses</a>
        </li>
      </ul>
    </nav>

    <div clas="container">
	<h2>
	<?php

		$id = $_GET["id"];
		echo "The id is: " . $id."<br>";

		$firstname = $_GET["firstname"];
		echo "The firstname is: " . $firstname."<br>";

		$lastname = $_GET["lastname"];
		echo "The lastname is: " . $lastname."<br>";
		
		$hire_date = $_GET["hire_date"];
		echo "The hire_date is: " . $hire_date."<br>";

	?>
</h2>
    </div>

    <footer>
      &copy;<?php echo date("Y"); ?> Cestar College
    </footer>



  </body>
</html>
