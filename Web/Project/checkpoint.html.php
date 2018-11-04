<html>
<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css">  
   
      <div class="w3-container w3-black">
            <!--Lab Checkpoint Tool-->
            <h1>Checkpoint tool</h1>
        </div>
    </head>
<table class="w3-table ">
<tr><th>First Name</th><td> <input type="text" placeholder="Enter first name" name="fname"required ></td></tr>
<tr><th>Last Name</th><td> <input type="text" placeholder="Enter last name" name="lname"required > </td></tr>
<tr><th>Sport</th><td><input type="text" placeholder="Enter sport" name="sport"required > </td></tr>
<tr><th>Higest Medal Obtained</th><td>				<select name="medal"required >
<tr><th>Apples</th>
<td><select name="dynamic_data">
<?php

 foreach($result as $row ) {

 echo "<option value=\"$row[userName]\"> $row[userName] </option>";



}
?>
</select>
</td>
</tr>



<tr><th></th><td><input type='submit' name = 'submit'  value='submit'></td></tr>
</table>

