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

</tr>
<tr><th>Admin Name</th><td> <input type="password" placeholder="Admin" name="userName"required ></td></tr>
<tr><th>Admin Password</th><td> <input type="password" placeholder="Password" name="pword"required ></td></tr>

<tr><th></th><td><input type='submit' name = 'change'  value='Login'></td></tr>
</table>
</div>