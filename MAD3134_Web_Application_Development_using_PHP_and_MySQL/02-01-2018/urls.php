
<a href="<?php echo "urls.php?id=". "Apple&Orange" ?>">Click me A </a> <br>
<a href="<?php echo "urls.php?id=". urlencode("Apple&Orange") ?>">Click me B</a> <br>



<?php
  $id = $_GET["id"];
  echo "The id is: " . $id;
?>
