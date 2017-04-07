<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN""http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-image:url(png/back1.png); background-position:center; background-repeat:repeat; background-attachment:fixed; font-family:Microsoft JhengHei,arial; font-weight:bold">
	<img src="png/upperPage.png" height=30 onclick="history.back()" align=left/>
</body>
</html>
<?php
	include("mysql_connect.inc.php");
	header("Content-type: text/html;charset=utf-8");

	//顯示 discount product list 
	$search = $_GET['search'];
	$query = "SELECT * FROM discountProduct_list where name='$search'";
	$result = mysql_query($query);
	
	echo "<center>";
	
	echo "搜尋 '$search' 的結果:<br/><br/>";
	
	echo "<table>";
	while($row = mysql_fetch_assoc($result))
	{ 
		echo "<tr>"."<td rowspan=8>"."<img src=upload/".$row["itemID"].".jpg height=125>"."</td>"."</tr>".
			 "<tr>"."<td>商品名稱: ".$row["name"]."</td>"."</tr>".
			 "<tr>"."<td>商品分類: ".$row["catagory"]."</td>"."</tr>".
			 "<tr>"."<td>優惠資訊: ".$row["productInfo"]."</td>"."</tr>".
			 "<tr>"."<td>截止日期: ".$row["deadline_year"]."/".$row["deadline_month"]."/".$row["deadline_day"]."</td>"."</tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>";
	}
	echo "</table></center>";

?>
