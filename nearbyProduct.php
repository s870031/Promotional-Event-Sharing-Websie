<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN""http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-image:url(png/back1.png); background-position:center; background-repeat:repeat; background-attachment:fixed; font-family:Microsoft JhengHei,arial; font-weight:bold">
</body>
</html>
<?php
	include("mysql_connect.inc.php");
	header("Content-type: text/html;charset=big5");

	//��� discount product list 
	$query = "SELECT * FROM discountProduct_list";
	$result = mysql_query($query);
	echo "<center><table>";
	while($row = mysql_fetch_assoc($result))
	{ 
		echo "<tr>"."<td rowspan=8>"."<img src=upload/".$row["itemID"].".jpg height=125>"."</td>"."</tr>".
			 "<tr>"."<td>�ӫ~�W��: ".$row["name"]."</td>"."</tr>".
			 "<tr>"."<td>�ӫ~����: ".$row["catagory"]."</td>"."</tr>".
			 "<tr>"."<td>�u�f��T: ".$row["productInfo"]."</td>"."</tr>".
			 "<tr>"."<td>�I����: ".$row["deadline_year"]."/".$row["deadline_month"]."/".$row["deadline_day"]."</td>"."</tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>";
	}
	echo "</table></center>";

?>
