<?php 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css">  
      <?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?> 
      <div class="w3-container w3-black">
            <!--Lab Checkpoint Tool-->
            <h1>You VS The World </h1>
        </div>
    </head>
    <body>


	
	
	
	
<div class="w3-container w3-display-left">
	<?php
echo ("<h3>$userName<h3>")
?>			 
</div>
			
	
  <div class="w3-container w3-display-middle">
  		<div class="w3-table w3-centered  w3-light-grey">
		<table>
		<tr>
		<th>Mark Checkpoint</th><th>Login</th><th>Admin Login </th>
		</tr>
		<tr>
		<td><a href="checkpointContoller.php"><img src="checkpoint.png" class="w3-bar-item w3-button" ></a></td><td><a href="studentLoginController.php"><img src="student.png" class="w3-bar-item w3-button"></a></td><td><a href="adminContoller.php"><img src="admin.png" class="w3-bar-item w3-button" ></a></td>
		</tr>
		</table>
	
			

</div>
</div>
  


   <input type='submit' name = 'apple'  value='change'>
   <input type="hidden" name="userName" id="hiddenField" value="<?php echo $userName;  ?>" />
    <input type="hidden" name="pword" id="hiddenField" value="<?php echo $pword;  ?>" />
 </body>
 </html>