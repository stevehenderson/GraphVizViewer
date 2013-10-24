<?php

	$markup = trim($_POST['markup']);

	
	$lastId = -1;
	$nextId = 0;
	
	//Find last file!
	
	$files = array();
	if ($handle = opendir('markup')) {
	    while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != "..") {  
	            //$path = "./markup/".$file;          
	            //$files[filemtime($path)] = $file;            
	            array_push($files,$file);            
	        }
	    }
	    closedir($handle);
	
	    rsort($files,SORT_NUMERIC);
	    print_r($files);
	    
	    //Pull last file
	 		$entry = $files[0];
	 		
	    //isolate file name
	    $parts = split("\.", $entry);	    
	    
	    if(count($parts) >0) {	    	      
	    	$lastId = $parts[0];	  	    	
	    } 	    	    
	    	    
	 }
	
	 $nextId = $lastId + 1;
	
	 //Write some files
	 $filename = "./markup/".$nextId. ".dot";
	 $imagefilename = "./images/".$nextId. ".svg";
	 $thumbsfilename = "./thumbs/".$nextId. ".jpg";
	 
   file_put_contents($filename, $markup);
   exec("dot $filename -Tsvg -o $imagefilename");	
   exec("dot $filename -Tjpg -o $thumbsfilename");	
	 
	 //echo "wrote the following to ".$filename;
	 //echo "<hr>";	
	 //echo $markup;
	 header( 'Location: http://stratosforge.net/rapid/viewer/index.php' ) ;
	
?>
