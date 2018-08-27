<?php

if (isset($_POST['order']))
{
	include 'orderDetails.html.php';
	$price=0;
	foreach($_POST as $field=>$value)
	{

			
			if (is_array($value))
		{
			foreach ($value as $k )
			{
		   $price = $price + 1;
			} 
		
		}
		else
		{
			if($value == 'Small')
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
	
	
}

else
{
	
	if(isset($_POST['confirm']))
	{
		include 'thankyou.html.php';
	}

else
	
	{
		
		include 'orderForm.html.php';
		
	}
	
	}

?>