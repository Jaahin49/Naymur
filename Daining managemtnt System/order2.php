<?php 
session_start();

if (isset($_POST['submit'])){
	if(!empty($_SESSION['username'])) {
		$qty1=$_POST['qty1'];
		$qty2=$_POST['qty2'];
		$qty3=$_POST['qty3'];
		$qty4=$_POST['qty4'];
		$qty5=$_POST['qty5'];
		$qty6=$_POST['qty6'];
		$qty7=$_POST['qty7'];
		$qty8=$_POST['qty8'];
		$qty9=$_POST['qty9'];
		$user_info=$_SESSION['username'];
		$date = date("d-m-y");
		$sum=30*(float)$qty1+20*(float)$qty2+10*(float)$qty3+10*(float)$qty4+20*(float)$qty5+20*(float)$qty6+20*(float)$qty7+20*(float)$qty8+15*(float)$qty9;
		$msg="Order placed successfully. Please make a payment of Tk ".$sum." by cash on successful delivery";
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"dainingmanagement") or die("couldn't find database");
$sql1="INSERT INTO orders2(username,qty1,qty2,qty3,qty4,qty5,qty6,qty7,qty8,qty9,`date`)VALUES('$user_info','$qty1','$qty2','$qty3','$qty4','$qty5','$qty6','$qty7','$qty8','$qty9','$date');";
		if(mysqli_query($connect,$sql1))
		{  
			echo '<script type="text/javascript"> alert("'.$msg.'")</script>';
		}
		else
		{  
			echo "<script type='text/javascript'>alert('Could not place order');</script>";
		} 
	}
	else
		echo "<script type='text/javascript'>alert('Please login');</script>";
}
?>
<html>
<head>
<title>Order</title>
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
  font{color:white}
img{width:300; height:200;}
table{border-color:white;height:90%;}
img{border-color:white}
body{no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	background-size: cover;
	background-color:black;
}
</style>
<script type="text/javascript">
 /*function rps(qty) {
    qty.value = qty.value + 3;
}
function rps2(qty) {
    var Score = document.getElementById(qty);
    var number = Score.innerHTML;
    number =+3;
    Score.innerHTML = number;
}
*/
	function subtractQty(qty){
		if(qty.value - 1< 0)
			return;
	else
	qty.value--;
	}
	function addQty(qty){
	qty.value = qty.value*3;
	}
	function chk()
	{
		var qty1=document.getElementById("qty1");
		var qty2=document.getElementById("qty2");
		var qty3=document.getElementById("qty3");
		var qty4=document.getElementById("qty4");
		var qty5=document.getElementById("qty5");
		var qty6=document.getElementById("qty6");
		var qty7=document.getElementById("qty7");
		var qty8=document.getElementById("qty8");
		var qty9=document.getElementById("qty9");
		if((qty1.value=='' && qty2.value=='' && qty3.value=='' && qty4.value=='' &&qty5.value=='' && qty6.value=='' && qty7.value=='' && qty8.value=='' &&qty9.value=='')||(qty1.value=='0' && qty2.value=='0' && qty3.value=='0' && qty4.value=='0' && qty5.value=='0' && qty6.value=='0' && qty7.value=='0' && qty8.value=='0' && qty9.value=='0' ))
		{
			alert("Please select atleast 1 item");
			return false;
		}
		return true;	
	}
</script>
</head>
<body background="bg1.jpg">
<FONT size="4" color="white">
<NAV align="right">
<A HREF="index.php">Home</A>&nbsp&nbsp&nbsp

<?php  
if(isset($_SESSION['username']))
	echo 'Welcome <A HR3EF="welcome.php"> '.$_SESSION['username'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';
?>
</FONT></NAV>
<form action="order2.php" name="orderform" method="post">
<table cellspacing="5" cellpadding="2" align="center">
<caption><font size="5"><U>ORDER HERE</U></font></caption>
<tr><td>
<img src="food/beef1.jpg" width="300" height="200" border="5"><br/>
<font size="4">Beef</font>
&nbsp;&nbsp;<input type='text' name='qty1' id='qty1' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript:addQty(qty1);' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty1);' value='-'/>
<font size="4">Tk. 30</font>
</td>
<td>
<img src="food/chicken2.jpg" width="300" height="200" border="2"><br/>
<font size="4">Chicken</font>
&nbsp;&nbsp;<input type='text' name='qty2' id='qty2' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty2").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty2);' value='-'/>
<font size="4">Tk. 20</font>
</td>
<td>
<img src="food/veg3.jpg" width="300" height="200" border="2"><br/>
<font size="4">Vegetable</font>
&nbsp;&nbsp;<input type='text' name='qty3' id='qty3' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty3").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty3);' value='-'/>
<font size="4">Tk. 10</font>
</td>
</tr>
<tr>
<td>
<img src="food/dall4.jpg" width="300" height="200" border="2" ><br/>
<font size="4">Daal</font>
&nbsp;&nbsp;<input type='text' name='qty4' id='qty4' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty4").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty4);' value='-'/>
<font size="4">Tk. 10</font>
</td><td>
<img src="food/eggs5.jpg" width="300" height="200" border="2"><br/>
<font size="4">Eggs</font>
&nbsp;&nbsp;<input type='text' name='qty5' id='qty5' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty5").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty5);' value='-'/>
			<font size="4">Tk. 20</font>
</td>
<td>
<img src="food/fishes6.jpg" width="300" height="200" border="2"><br/>
<font size="4">Fishes</font>
&nbsp;&nbsp;<input type='text' name='qty6' id='qty6' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty6").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty6);' value='-'/>
<font size="4">Tk. 20</font>
</td>
</tr>
<tr>
<td>
<img src="food/khichuri7.jpg" width="300" height="200" border="2"><br/>
<font size="4">Khichuri</font>
&nbsp;&nbsp;<input type='text' name='qty7' id='qty7' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty7").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty7);' value='-'/>
<font size="4">Tk. 20</font>
</td><td>
<img src="food/polou8.jpg" width="300" height="200" border="2"><br/>
<font size="4">Polao</font>
&nbsp;&nbsp;<input type='text' name='qty8' id='qty8' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty8").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty8);' value='-'/>
<font size="4">Tk. 20</font>
</td>
<td>
<img src="food/colds9.jpg" width="300" height="200" border="2"><br/>
<font size="4">Beverages</font>
&nbsp;&nbsp;<input type='text' name='qty9' id='qty9' size="1" maxlength="2" class="qty" style="width: 25px;"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty9").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty9);' value='-'/>
<font size="4">Tk. 15</font>
</td>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr><td colspan="3"><input type="submit" name="submit" value="Order now!!!"  class="button" onclick="return chk()"></input></td></tr>
</table></form>
</body>
</html>