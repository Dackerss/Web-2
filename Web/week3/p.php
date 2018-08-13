<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="pcss">
</head>
<body>
<table>


<?php

array_pop($_POST);

	foreach($_POST as $field=>$value)
	{

			
			if (is_array($value)
		{
			foreach($_POST as $field=>$value)
			{
				echo("<tr><td> $field:</td> <td> $value</td></tr>");
			}
			
		}
		else
		{
			strip_tags($value);
			echo("<tr><td> $field:</td> <td> $value</td></tr>");
		}
			

	}

?>
</table>
</body>
</html>

