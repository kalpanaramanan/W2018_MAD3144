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
      <h1> EMPLOYEE PANEL </h1>
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
	  <a href="addEmployee.php">Add Employee >></a>
    </nav>

    <div clas="container">
		<table class="table table-striped table-hover">
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Hire Date</th>
				<th style="margin:20px;">Action</th>
			</tr>
			<?php 
				$employees = array(
					  ["id" => "1", "firstname" => "Emad", "lastname" => "Nasarali", "hire_date" => "2016-01-01"],
					  ["id" => "2", "firstname" => "Pritesh", "lastname" => "Patel", "hire_date" => "2017-03-03"],
					  ["id" => "3", "firstname" => "Marcos", "lastname" => "Bittencourt", "hire_date" => "2015-04-20"],
					  ["id" => "4", "firstname" => "Jenelle", "lastname" => "C", "hire_date" => "2017-11-01"],
					  ["id" => "5", "firstname" => "William", "lastname" => "P", "hire_date" => "2014-09-15"],
					);
					foreach ($employees as $person) { 
					//print_r($employees); // Print array in php
					?>		
				<tr> 
					<td><?php echo $person["id"] ?> </td>
					<td><?php echo $person["firstname"]; ?></td>
					<td><?php echo $person["lastname"]; ?></td>
					<td><?php echo $person["hire_date"]; ?></td>
					<td><a style="margin:10px;" href="<?php echo "viewEmployee.php?id=". urlencode($person["id"])."&firstname=".$person["firstname"]."&lastname=".$person["lastname"]."&hire_date=".$person["hire_date"];?>">View</a>|<a style="margin:10px;"  href="#">Edit</a>|<a style="margin:10px;"  href="#">Delete</a></td>	
				</tr>
			<?php } ?>
		</table>
	
    </div>

    <footer>
      &copy;<?php echo date("Y"); ?> Cestar College
    </footer>



  </body>
</html>
