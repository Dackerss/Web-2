<!doctype html>
<html>
<head>
<style>
table, th, td {
   border: 1px solid black;
}
</style>
</head>
<body>
<table>


<?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
$price = 0;
array_pop($_POST);

echo("<table>");
echo("<tr>");
echo("<th> Input </th>");
echo("<th> Input </th>");
echo("</tr>"); 
	foreach($_POST as $field=>$value)
	{

			
			if (is_array($value))
		{
			foreach ($value as $k )
			{
		   echo("<tr> <td> $field</td> <td> $k</td> </tr>");
		
			} 
		
		}
		else
		{				
			strip_tags($value);
			echo("<tr><td> $field</td> <td> $value</td></tr>");
		}
			

	}
	echo("</table>");
	


?>
</table>
<input type='submit' name = 'confirm'  value='confirm'>	
<input type='submit' name = 'cancel'  value='cancel'>	
</body>
</html>