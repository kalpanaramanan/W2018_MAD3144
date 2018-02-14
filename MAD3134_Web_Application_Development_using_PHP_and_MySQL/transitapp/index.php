
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/spectre.min.css">
    <link rel="stylesheet" href="css/spectre-exp.min.css">
    <link rel="stylesheet" href="css/spectre-icons.min.css">
	<style type="text/css">
		header {
			max-width:960px;
			margin:0 auto;
			margin-top:40px;
		}
		footer {
			max-width:960px;
			margin:0 auto;
			margin-top:40px;	
		}
		div.container {
			margin-top:40px;
		}
		h1 {
			font-size:24px;
		}
		h2 {
			font-size:20px;
		}
	</style>
  </head>
  <body>
	<?php include 'header.php'; ?>

	<div class="container">
		<div class="columns">
			<div class="column col-9 centered">

				<div class="columns col-gapless">
					<div class="column col-6 text-center">
						<img style="width:400px;height:400px;" src="img/lambton-map.jpg" >
						
						<!-- <h2 style="text-align: left;" > In Lambton College, a Universal Transit Pass is a program that gives students enrolled in participating post-secondary institutions unlimited access to local transit. Programs are either funded through mandatory fees that eligible students pay in each term in which they are registered or included in the students' tuition. 
						The U-Pass price charged to students depends on a variety of factors which differ among municipalities, transit systems and post-secondary institutions.</h2> -->
					</div>
					<div class="column col-6 text-center"  style="width:400px;height:400px;border:#50596c 1px solid;">
							<h1 style="margin:30px;"> Transport Facility - Login </h1> 
						<form action="mainpage.php" method="POST"  class="form-group">
							<input style="width:200px;height:50px;" type="text" name="username" placeholder="username"><br><br>
							<input style="width:200px;height:50px;" type="password" name="password" placeholder="password"><br><br>
							<input style="width:200px;height:50px;" class="btn btn-primary" type="submit" value="Login"><br><br>
							<!--<input type="time" name="timestamp" step="1">-->
						</form>
					
						
					</div>
				</div>
			</div>
			<div class="column col-9 centered">
						<h2 style="text-align: left;margin:20px;" > In Lambton College, a Universal Transit Pass is a program that gives students enrolled in participating post-secondary institutions unlimited access to local transit. Programs are either funded through mandatory fees that eligible students pay in each term in which they are registered or included in the students' tuition. 
						The U-Pass price charged to students depends on a variety of factors which differ among municipalities, transit systems and post-secondary institutions.</h2>
			</div>
		</div>
	</div> <!-- // container -->
  
	<?php include 'footer.php'; ?>
  </body>
</html>
