<!doctype html>
<html>
<head>
<title> Php </title>
<meta charset="UTF-8">
</head>

<body>
<?php
$A = rand(0,255);
$B = rand(0,255);
$C = rand(0,255);
 $color = 'rgb(' . rand(0,255) . ',' . rand(0,255) . ',' . rand(0, 255) . ')';
echo ("The background is $color");
?>
<?php
?>
<body style="background-color:<?php echo $color ?>;">
 




</body>
</html>