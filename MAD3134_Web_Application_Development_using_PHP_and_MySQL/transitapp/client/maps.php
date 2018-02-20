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
        <div class="column col-10 col-mx-auto">
			<a href="index.php" class="btn" > Go Back</a>
			<a href="../index.php" class="btn" style="float:right;"> Logout </a>
			<br><br>
		   <div id="googleMap" style="width:100%;height:400px;"></div>
		   <br><br>
        </div> <!--// col-12 -->
      </div> <!-- // column -->
    </div> <!--// container -->
<?php include 'footer.php'; ?>
<script>
	function myMap() {
	  var locations = [
      ['Brampton(Charolais Blvd, Near the beer store)', 43.6672, -79.7415, 4],
      ['Mississauga(Square One)', 43.5932, -79.6446, 5],
      ['Lambton College,Toronto', 43.7733, -79.335, 3],
    
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(43.6532, -79.3832),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	}
	
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPPG2Zeh7AmA58WUupvXlDKz8HkqyvDHk&callback=myMap"></script>

  </body>
</html>