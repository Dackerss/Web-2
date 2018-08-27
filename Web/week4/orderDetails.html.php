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
echo("<h> Your order </h>");
echo("<table>");




	foreach($_POST as $field=>$value)
	{

			
			if (is_array($value))
		{
			foreach ($value as $k )
			{
		   echo("<tr> <td> $field</td> <td> $k</td> </tr>");
		   $price = $price + 1;
			} 
		
		}
		else
		{				
			strip_tags($value);
			echo("<tr><td> $field</td> <td> $value</td></tr>");
				
				if($value == 'small')
			{
                $price = $price + 5;
			}
				if($value == 'Medium')
			{
                $price = $price + 10;
			}	
				if($value == 'Large')
			{
                $price = $price =+15;
			}	
		}
			

	}
	
			

	
	echo("</table>");
	


?>
</table>
<p><?php echo("the Price is $$price");?><p>
<input type="hidden" name="price" value="<?php echo $price; ?>">
<input type='submit' name = 'confirm'  value='confirm'>	
<input type='submit' name = 'cancel'  value='cancel'>	
</body>
</html>