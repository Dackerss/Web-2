<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="pcss">
<?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
 $text=$_POST['price'];
 

?>


</head>
<body>
<p><?php echo("the Price is $$text");?><p>
</body>
<input type='submit' name = 'Another?'  value='Another?'>	
</html>