<?php 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="checkpoint.css">  
      <?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Response', 'You', 'Class'],
          ['Hard/Easy', <?php echo $tool1xSelf?>, <?php echo $tool1xAve?>],
          ['New/Familiar', <?php echo $tool1ySelf?>, <?php echo $tool1yAve?>],
          ['Boring/Interesting', <?php echo $tool2xSelf?>, <?php echo $tool2xAve?>],
          ['Frustrated/Triumphant', <?php echo $tool2ySelf?>, <?php echo $tool2yAve?>],
		  ['Not improved/improved', <?php echo $tool3xSelf?>, <?php echo $tool3xAve?>],
		  ['Didnt know where to start/Clear plan', <?php echo $tool3ySelf?>, <?php echo $tool3yAve?>],
        ]);

        var options = {
          chart: {
            title: '',
            
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      <div class="w3-container w3-black">
            <!--Lab Checkpoint Tool-->
            <h1>You VS The World </h1>
        </div>
    </head>
    <body>


	
	
	






<div class= "container">
<div class="w3-container apple">
<div class= "first"><h2><?php echo $userName ?> </h2><hr></hr></div><div class="third"><div id="barchart_material" class="right" style="width: 890px; height: 515px;"></div></div>
<div class= "first" ><h2><?php echo $labName ?></h2><hr></hr></div>
<div class= "first" style="color:<?php echo $colour ?>"><h2><?php echo ("Lab Complete:  $a") ?></h2><hr></hr></div>



<div class= "first">
		<h2>Filter lab</h2> 	<select name="dynamic_data">

<?php

 foreach($resultLab as $row ) {

 echo "<option value=\"$row[labname]\"> $row[labname] </option>";

}

echo("<input type='submit' name = 'apple'  value='change'>");


?><hr></hr></div>


<div class= "first" >

				<div class = "left" style = "color:<?php echo $winner ?>">
				<?php echo ("<h3>You:</h3> ");
				echo ("<h3>");echo round($userPercent);echo("%");echo ("</h3>");
				?>
				</div>
				
				
				<div class ="right">
				<?php
				echo ("<h3>Class:</h3>");
				echo ("<h3>"); echo round($classPercent);echo("%"); echo ("</h3>");
				?>
				</div>
				
				</div>
				


	

			
	<input class="button" type='submit' name = 'logout'  value='Logout'>

</div>

</div>

  

	
   <input type="hidden" name="userName" id="hiddenField" value="<?php echo $userName;  ?>" />
    <input type="hidden" name="pword" id="hiddenField" value="<?php echo $Password;  ?>" />
 </body>
 </html>