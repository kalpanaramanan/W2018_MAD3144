<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/spectre.min.css">
    <link rel="stylesheet" href="../css/spectre-exp.min.css">
    <link rel="stylesheet" href="../css/spectre-icons.min.css">
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
 
    <?php
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "transit";

      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

      $query = "SELECT * FROM roles order by name asc ";

      $roleResults = mysqli_query($connection, $query);
	 
      if ($roleResults == FALSE) {
        echo "Database query failed. <br/>";
        echo "SQL command: " . $query;
        exit();
      }
    ?>

<?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-10 col-mx-auto">

          <a href="index.php" class="btn"> Go Back  </a>
		  <a href="editUser.php" class="btn">Edit User </a>
		  <a href="deleteUser.php" class="btn">Delete User </a>
		  <div class="column col-8 col-mx-auto">
		<a href="../index.php" class="btn" style="float:right;"> Logout </a>
		</div> 
		<div class="column col-5 col-mx-auto">
		     <form action="createUser.php" method="POST" class="form-group">
				
				<table>
					<tr>
						<td><label class="form-label" for="username">Username</label></td>
						<td> 
							<input style="width:200px;height:40px;" type="text" name="username">
						</td>
					</tr>
					<tr>
						<td><label class="form-label" for="password">Pasword</label></td>
						<td> <input style="width:200px;height:40px;" type="text" name="password"></td>
					</tr>
					
						<td><label class="form-label" for="role">Role</label></td>
						<td> 
							<select name="role" style="width:200px;height:40px;">
								<?php while ($role = mysqli_fetch_assoc($roleResults)) { ?>
									<option value= <?php echo $role['id']  ?> ><?php echo $role['name']  ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</table>  <br>
              <input type="submit" class="btn btn-primary" value="Add New User" />
         
          </form>
		  
        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->
    <?php
      // clean up and close database
	  mysqli_free_result($roleResults);
      mysqli_close($connection);
    ?>
<?php include 'footer.php'; ?>
  </body>
</html>