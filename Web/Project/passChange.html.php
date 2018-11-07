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
            <h1>Checkpoint tool</h1>
        </div>
    </head>
<table class="w3-table ">
<?php
echo ("<tr><th>$userName</th>");
?>
</tr>
<tr><th>Old Password</th><td> <input type="password" placeholder="Password" name="oldpword"required ></td></tr>
<tr><th>New Password</th><td> <input type="password" placeholder="Password" name="newpword"required ></td></tr>


<input type="hidden" name="userName" id="hiddenField" value="<?php echo $userName;  ?>" />
<tr><th></th><td><input type='submit' name = 'change'  value='change'></td></tr>
</table>
