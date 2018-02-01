<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Associative Arrays</title>
  </head>
  <body>
	<?php
		$person = array("first_name"=>"Pritesh", "last_name"=>"Patel");
		
		// change a key
		$person["first_name"] = "David";

		// add a key 
		$person["program"] = "MADT";
		$person["hasCar"] = TRUE;
		$person["friends"] = array("Emad", "Jenelle", "Marc");
		$person["pets"] = array("dogs"=>2, "cats"=>1);
		// delete something from array
		unset($person["program"]);
		
		// print entire array to screen
		print_r($person);
		echo "<br />";
		
		//print his first_name
		echo $person["first_name"];
		echo "<br />";
		
		//print marc
		echo $person["friends"][2];
		echo "<br />";
		
		// print the number of cats 
		echo "Cats? ". $person["pets"]["cats"];
	?>
  </body>
</html>


