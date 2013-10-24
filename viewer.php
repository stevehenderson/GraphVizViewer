<!doctype html>
<html>
  <head>
    <title>Graph Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
      body { background: #F5FCFF; color: #333666; }
      img {min-width:800px; min-height:600px; width:auto;  height:auto;}
      section { text-align: center; margin: 50px 0; }
      .panzoom-parent { border: 2px solid #333; }
      .panzoom-parent .panzoom { border: 2px dashed #666; }
      .buttons { margin: 40px 0 0; }
      
      	table.gridtable {
					font-family: verdana,arial,sans-serif;
					font-size:18px;
					color:#333333;
					border-width: 10px;
					border-color: #666666;
					border-collapse: collapse;
				}
				table.gridtable th {
					border-width: 10px;
					padding: 8px;
					border-style: solid;
					border-color: #666666;
					background-color: #dedede;
				}
				table.gridtable td {
					border-width: 10px;
					padding: 8px;
					border-style: solid;
					border-color: #666666;
					background-color: #ffffff;
				}
     
      
    </style>
    <script src="test/jquery.js"></script>
    <script src="dist/jquery.panzoom.js"></script>
    <script src="bower_components/jquery-mousewheel/jquery.mousewheel.js"></script>
  </head>
  <body>
    <section id="focal">    	      
      <table class="gridtable">
    	<tr>
	      <td width=33%><a href="index.php">List</a><br></td>
	      <td width=33%><a href="edit.php?id=<?php echo $_GET["id"]?>">Edit</a><br></td>
	      <td width=33%>
	        <button class="zoom-in">Zoom In</button>
	        <button class="zoom-out">Zoom Out</button>
	        <input type="range" class="zoom-range">
	        <button class="reset">Reset</button>
	        
	      </td>
      </tr>
      </table>
     
      <div class="parent">
        <div class="panzoom">
         <?php
        	  $id = $_GET['id'];
          	echo "<img src='images/$id.svg'>";
          ?>
        </div>
      </div>
      <script>
        (function() {
          var $section = $('#focal');
          var $panzoom = $section.find('.panzoom').panzoom({
            $zoomIn: $section.find(".zoom-in"),
            $zoomOut: $section.find(".zoom-out"),
            $zoomRange: $section.find(".zoom-range"),
            $reset: $section.find(".reset"),
            startTransform: 'scale(0.9)',
            maxScale: 12.9,
            minScale: 0.01,
            increment: 0.1,
          });
          $panzoom.parent().on('mousewheel.focal', function( e ) {
            e.preventDefault();
            var delta = e.delta || e.originalEvent.wheelDelta;
            var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
            $panzoom.panzoom('zoom', zoomOut, {
              increment: 0.1,
              maxScale: 18.9,
              minScale: 0.01,
              focal: e
            });
          });
        })();
      </script>
    </section>
    
    <hr>
    
   
  </body>
</html>
