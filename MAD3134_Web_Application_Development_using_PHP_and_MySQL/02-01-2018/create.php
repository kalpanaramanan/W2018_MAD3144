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
      <h1> CREATE PANEL </h1>
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
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					
					$firstName = $_POST["firstName"];
					echo "First Name is :".$firstName."<br>";
					
					$lastName = $_POST["lastName"];
					echo "Last Name is :".$lastName."<br>";
					
					
					$hireDate = $_POST["hireDate"];
					echo "Hire Date is :".$hireDate."<br>";
					
				}else{
					header("Location"."addEmployee.php");
				}
			?>
		</h2>
    </div>

    <footer>
      &copy;<?php echo date("Y"); ?> Cestar College
    </footer>



  </body>
</html>
