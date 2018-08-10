<!doctype html>
<html>
<head>
<title> Php </title>
<meta charset="UTF-8">
</head>

<body>
<?php
$A = rand(1,24);
$B = rand(0,100);
$dataItem = array();
?>
<table>
<tr>
<td> Index </td>
<td> Number </td>
</tr>
<?php
for($i=0; $i < $A;$i++)
{

	$dataItem [] = $B;
	echo ("<tr>");
echo ("<td> $A[index] </td>");
echo ("<td> $A[i]</td>");
}
?>
</body>
</html>