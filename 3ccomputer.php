<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN""http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background:url(png/back1.png) no-repeat center center fixed; background-position:center; background-repeat:repeat; background-attachment:fixed; -webkit-background-size: cover; background-size: cover;font-size:15px; font-family:Microsoft JhengHei,arial; font-weight:bold">
	<center>
	<form action=searchProduct.php  method=get>
	<a href="catagory.html"><img src="png/upperPage.png" height=30/></a>
	<input type='text' name='search' placeholder='輸入欲搜尋商品' style="background: rgba(255, 255, 255, .3);border-style: solid;border-width: 0px 0px 1px 0px;"></input> 
	<input type='image' src="png/search.png" height=30 value='search'></input>
	<a href="addProduct.php"><img src="png/add.png" height=30 /></a>
	</form>
	</center>
	<br/>
</body>
</html>

<?php
	include("mysql_connect.inc.php");
	header("Content-type: text/html;charset=utf-8");

	//顯示 discount product list 
	$query = "SELECT * FROM `discountProduct_list` WHERE catagory='3c電子、周邊'";
	$result = mysql_query($query);
	
	echo "<center>";
	echo "<table>";
	while($row = mysql_fetch_assoc($result))
	{ 
		echo "<tr>"."<td rowspan=8>"."<img src=upload/".$row["itemID"].".jpg height=125>"."</td>"."</tr>".
			 "<tr>"."<td>商品名稱: ".$row["name"]."</td>"."</tr>".
			 "<tr>"."<td>優惠資訊: ".$row["productInfo"]."</td>"."</tr>".
			 "<tr>"."<td>截止日期: ".$row["deadline_year"]."/".$row["deadline_month"]."/".$row["deadline_day"]."</td>"."</tr>".
			 "<tr>"."<td>地點: ".$row["location"]."</td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>";
	}
	echo "</table></center>";

?>
