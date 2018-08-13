<?php
array_pop($_POST);

	foreach($_POST as $field=>$value)
		echo("$field: $value<br>");
?>

