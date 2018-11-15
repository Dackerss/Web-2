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
<table class="w3-table pad ">

<tr><th>Student:</th>
<td><select name="student">
<?php
	
 foreach($resultUserName as $row ) {

 echo "<option value=\"$row[userName]\"> $row[userName] </option>";

}
?>
</select>

</td>
</tr>




<input type="hidden" name="userName" id="hiddenField" value="<?php echo $adminUser;  ?>" />
<input type="hidden" name="pword" id="hiddenField" value="<?php echo $adminPassword;  ?>" />
<tr><th></th><td><input type='submit'onclick="return confirm('Are you sure you want to reset this password password?')" name = 'reset'  value='Reset'></td></tr>
</table>
</div>



