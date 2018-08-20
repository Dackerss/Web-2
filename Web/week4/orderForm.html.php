<!doctype html>
<html>
<head>
<title> Pizza </title>
<meta charset="UTF-8">
</head>
<body>
<H1> PIZZA </h1>
<?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?>

<Fieldset>
<legend> Place your order</legend>

<p> Select a Size </p>
<input type = 'radio' name='size' value = 'small'> Small<br>
<input type = 'radio' name='size' value = 'Medium'> Medium<br>
<input type = 'radio' name='size' value = 'Large'> Large<br>

<p> Please select your toppings ($1 for each topping</p>
<label>       <input type='checkbox' name='topping[]' value='Peperoni'> Peperoni<br></label>
			 <label> <input type='checkbox' name='topping[]' value='Olives'> Olives<br></label>
			  <label> <input type='checkbox' name='topping[]' value='Mushrooms'> Mushrooms<br></label>
			  <label> <input type='checkbox' name='topping[]' value='Jalapenos'> Jalapenos<br></label>
			  <label> <input type='checkbox' name='topping[]' value='Capsicum'> Capsicum<br></label>
</Fieldset>
<input type='submit' name = 'order'  value='order'>			  
</body>
</html>