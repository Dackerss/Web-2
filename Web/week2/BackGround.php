<!DOCTYPE html>
<html>
<?php
$A = rand(0,255);
$B = rand(0,255);
$C = rand(0,255);
 $color = 'rgb(' . rand(0,255) . ',' . rand(0,255) . ',' . rand(0, 255) . ')';

?>
<head>
<style>
body
{
background-color:<?php echo $color ?>;
}
</style>
<title> Php </title>
<meta charset="UTF-8">
</head>

<body>
<?php
 echo ("The background is $color");
 ?>
</body>
</html>