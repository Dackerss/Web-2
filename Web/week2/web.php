<!doctype html>
<html>
<head>
<title> Php </title>
<meta charset="UTF-8">

</head>

<body>
<?php




$k=1;
for($i=0;$i<33;$i++){
    for($j=1;$j<=$i;$j++){
		if($k & 1 )
		{
        echo "<img src='angryDino.gif' alt = 'dino' style='width:40px; height:50px;'>";
		}
	else
	{
		 echo "<img src='happyPenguin.gif' alt = 'pen' style='width:50px; height:50px;'>";
	}
        $k++;
    }
    echo "<br>";
} 

?>

</body>
</html>