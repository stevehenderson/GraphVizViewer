<html>
  <head>
    <title>Edit Graph</title>    
  </head>
  <body>
  <form name="myform" action="editProcess.php" method="POST">
  	Enter GraphViz Code to render:<br><br>
		<textarea style='text-align:left;' cols="120" rows="35" name="markup"><?php
		if(isset($_GET["id"])) {
		  $filename = "./markup/".$_GET["id"].".dot";
			$fh = fopen($filename, 'r');
			$theData = fread($fh, filesize($filename));
			fclose($fh);
			echo $theData;
		}
		?></textarea>   
		<br>
		<INPUT type="submit" value="Send">
		<a href="index.php"><input type="button" value="cancel"></a>
	</form> 
  </body>
</html>
