<html>
<head>
<title>Graphs</title>
<style type="text/css">
      body { background: #F5FCFF; color: #333666; font-family: verdana,arial,sans-serif;}
     
      section { text-align: center; margin: 50px 0; }
      
      
      	table.gridtable {
					font-family: verdana,arial,sans-serif;
					font-size:11px;
					color:#333333;
					border-width: 1px;
					border-color: #666666;
					border-collapse: collapse;
				}
				table.gridtable th {
					border-width: 1px;
					padding: 8px;
					font-weight:bold;
					border-style: solid;
					border-color: #666666;
					background-color: #dedede;
				}
				table.gridtable td {
					border-width: 1px;
					padding: 8px;
					border-style: solid;
					border-color: #666666;
					background-color: #ffffff;
				}
     
      
    </style>
</head>
<body>
<a href="edit.php">New Graph</a>
<br><br>

<table class="gridtable">
<tr>
	<th>DTG</th>
	<th>Thumb</th>
	<th width=45% align=center colspan=3>Operations</th>
</tr>

<?php


$files = array();
if ($handle = opendir('images')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {  
            $path = "./images/".$file;          
            $files[filemtime($path)] = $file;            
        }
    }
    closedir($handle);
    krsort($files);
   
     
    foreach($files as $entry) {        
	    //isolate file name
	    $parts = split("\.", $entry);
	    $path = "./images/".$entry;
	    
	    if(count($parts) >0) {
	    
	      $dtg = date ("d-M-Y H:i:s", filemtime($path));
	    	$id = $parts[0];	    	
	      echo ("<tr>");	      
	      echo ("<td>$dtg</td>");
	      echo ("<td><a href='viewer.php?id=$id'><img src='thumbs/$id.jpg' height=200 width=400></a></td>");
	      echo ("<td align=center><a href='viewer.php?id=$id'>View</a></td>");
	      echo ("<td align=center><a href='edit.php?id=$id'>Edit</a></td>");
	      echo ("<td align=center>Delete</td>");
	      echo ("</tr>");          
	            
	            
	    }
	 }               
}
?>
</table>
</body>
</html>