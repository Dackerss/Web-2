<!DOCTYPE html>
      <?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?> 
<html>
<head>
    <title>Yeet</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css">  
    <link rel="stylesheet" type="text/css" href="checkpoint.css">

   
      <div class="w3-container w3-black">
            <!--Lab Checkpoint Tool-->
            <h1>Checkpoint tool</h1>
        </div>
    </head>
    <body>


				
	<div class="containerSlider">		
	
	<P> Please give honest feed back</P>
	<P> If you dont feel like answering any questions leave the value at 0 </P>
	<P> Values are saved in pairs and as such not answering one will void the answer for the other </P>
	<hr>
<div class = "set1">
<div class=" slidecontainer1">	
	<h3> Easy/Hard </h3>
<div class=" slidecontainer">

  <input type="range" name="easy/hard" min="-10" max="10" value="0" class="slider" id="a">
  <span id="1"></span>
</div>
</div>
<div class=" slidecontainer2">
<h3> Boring/Interesting </h3>
<div class="slidecontainer">

  <input type="range" name="boring/interesting" min="-10" max="10" value="0" class="slider" id="b">
  <span name="apple" id="2"></span>
</div>
</div>
</div>
<hr>
<div class = "set2">
<div class=" slidecontainer4">
<h3> Content was all new/Content was familiar </h3>
<div class="slidecontainer">

  <input type="range" name="new/familiar" min="-10" max="10" value="0" class="slider" id="c">
  <span id="3"></span>
</div>
</div>
<div class=" slidecontainer3">
<h3> Didnt know how to approach the problem/Had a Clear plan </h3>
<div class="slidecontainer">

  <input type="range"  name="problem/clear" min="-10" max="10" value="0" class="slider" id="d">
  <span  id="4"></span>
</div>
</div>
</div>
<hr>
<div class = "set3">
<div class=" slidecontainer5">
<h3> My skills have not improved/My skills have improved </h3>
<div class="slidecontainer">

  <input type="range" name="notImproved/improved" min="-10" max="10" value="0" class="slider" id="e">
  <span id="5"></span>
</div>
</div>
<div class=" slidecontainer6">
<h3> I feel frustrated/I feel triumphant </h3>
<div class="slidecontainer">

  <input type="range" name="frustrated/triumphant" min="-10" max="10" value="0" class="slider" id="f">
  <span id="6"></span>
</div>
	</div>
	</div>
	<div class ="buttonholder">
<input type='submit' name = 'submit'  value='confirm'>
</div>
			
</div>

  </div>


   
 </body>
<input type="hidden" name="userName" id="hiddenField" value="<?php echo $userName;  ?>" />
<input type="hidden" name="labID" id="hiddenField" value="<?php echo $labID;  ?>" />
<input type="hidden" name="labName" id="hiddenField" value="<?php echo $labName;  ?>" />
 </html>
 
  <script>
var slider = document.getElementById("a");
var output = document.getElementById("1");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}


var slider1 = document.getElementById("b");
var output1 = document.getElementById("2");
output1.innerHTML = slider1.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider1.oninput = function() {
    output1.innerHTML = this.value;
}


var slider2 = document.getElementById("c");
var output2 = document.getElementById("3");
output2.innerHTML = slider2.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider2.oninput = function() {
    output2.innerHTML = this.value;
}


var slider3 = document.getElementById("d");
var output3 = document.getElementById("4");
output3.innerHTML = slider3.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider3.oninput = function() {
    output3.innerHTML = this.value;
}


var slider4 = document.getElementById("e");
var output4 = document.getElementById("5");
output4.innerHTML = slider4.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider4.oninput = function() {
    output4.innerHTML = this.value;
}

var slider5 = document.getElementById("f");
var output5 = document.getElementById("6");
output5.innerHTML = slider5.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider5.oninput = function() {
    output5.innerHTML = this.value;
}
</script>