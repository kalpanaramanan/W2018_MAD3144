
<!--(289) 804-0571  +12898040571-->
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
    <?php include 'header.php'; ?>

    <div class="container">
      <div class = "columns">
        <div class="column col-8 col-mx-auto">
		<a href="../index.php" class="btn" style="float:right;"> Logout </a>
		</div> 
		<div class="column col-5 col-mx-auto">
          <form action="../sms.php" method="POST" class="form-group">
				<table>
					<tr>
						<td><label class="form-label" for="phoneNumber">Phone Number</label></td>
						<td><input type="text" name="phoneNumber"></td>
					</tr>
					<tr>
						<td><label class="form-label" for="message">Message</label></td>
						<td><textarea rows="4" cols="50" name="message"> </textarea></td>
					</tr>
					
				</table>  
              <input type="submit" class="btn btn-primary" value="Send SMS" />
          </form>


        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->

  <?php include 'footer.php'; ?>

  </body>
</html>
