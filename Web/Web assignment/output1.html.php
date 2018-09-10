<!DOCTYPE html>
<!-- 
 Joshua Dackers 
Student ID :1000043644
Web 2 The Searchable Athletes Page Assignment 
 9/10/2018
 
Displays all Medal winners in the file
-->
<html>
<head>
    <title>Table output</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css">  
    </head>
    <body>

 <div class= "headerdiv">
				<h1>All Records in Table</h1>
			</div>	 

			
   <div class= "bodydiv">
            <table class="w3-table w3-striped w3-bordered">
                <tr>
                    <th>Name</th><th>Medal</th><th>Sport</th><th>Event</th><th>Pic</th>
                </tr>
<?php
// gets the select statment and used the out put to build the table 
 foreach($result2 as $row )
 {
     echo("<tr><td>$row[name]</td><td>$row[medal]</td><td>$row[sport]</td><td>$row[event]</td><td><img src=$row[image]> </td></tr>");
 }
 ?>
 </table>

   
 </body>
 </html>