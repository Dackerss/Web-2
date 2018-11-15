<html>
<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css">  
   <link rel="stylesheet" type="text/css" href="checkpoint.css">
      <?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?> 
   
      <div class="w3-container w3-black">
            <!--Lab Checkpoint Tool-->
            <a href="landing.html.php"> <h1>Checkpoint tool</h1></a>
        </div>
    </head>
	<div class ="containerLogin">
	
<table class="w3-table ">

<tr><th>Student:</th>
<td><select name="userName">
<?php

 foreach($resultUserName as $row ) {

 echo "<option value=\"$row[userName]\"> $row[userName] </option>";

}
?>
</select>
</td>
</tr>
<tr><th>Lab</th>
<td><select name="labname">
<?php

 foreach($resultLab as $row ) {

 echo "<option value=\"$row[labname]\"> $row[labname] </option>";

}
?>
</select>
</td>
</tr>
<tr><th>Tutor Password</th><td> <input type="password" placeholder="Password" name="pword"required ></td></tr>



<tr><th></th><td><input type='submit' name = 'checkpoint'  value='confirm'></td></tr>
</table>
</div>



