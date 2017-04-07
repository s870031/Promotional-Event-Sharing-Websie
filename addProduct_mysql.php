<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN""http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background-image:url(png/back1.png); background-position:center; background-repeat:repeat; background-attachment:fixed; font-size:15pt; font-family:Microsoft JhengHei,arial; font-weight:bold">
</body>
</html>
<?php
	include("mysql_connect.inc.php");
	header("Content-type: text/html;charset=utf-8");
	//新增優惠商品
	if($_POST['addProductName']){
		$addProductName = $_POST['addProductName'];
		$addProductCatagory = $_POST['addProductCatagory'];
		$addDiscountInfo = $_POST['addDiscountInfo'];
		$addDeadline_year = $_POST['addDeadline_year'];
		$addDeadline_month = $_POST['addDeadline_month'];
		$addDeadline_day = $_POST['addDeadline_day'];
		$addLocation = $_POST['addLocation'];
		$addComment = $_POST['addComment'];
		
		$query = "INSERT INTO discountProduct_list VALUES('NULL','$addProductName','$addProductCatagory','$addDiscountInfo','$addDeadline_year','$addDeadline_month','$addDeadline_day','$addLocation','$addComment')";
		mysql_query($query);
	}
	//儲存商品圖片到upload資料夾
	$extension=explode('.',$_FILES['file']['name']);//附檔名
	$uid=mysql_insert_id();//會員流水號
	$filename = $uid.'.'.$extension[1];//檔名 = 流水號 + 附檔名
	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$filename);
	
	//顯示 discount product list
	$query = "SELECT * FROM discountProduct_list where itemID='$uid'";
	$result = mysql_query($query);
	$upperPage = $_POST['upperPage'];//上一頁網址
	echo "<center>";
	echo "<a href='$upperPage'><img src='png/upperPage.png' height=30 onclick=/></a>";
	echo "已成功新增 $addProductName"."<br/>";
	echo "<table>";
	while($row = mysql_fetch_assoc($result))
	{ 
		echo "<tr>"."<td>"."<img src=upload/".$row["itemID"].".jpg height=125>"."</td>"."</tr>".
			 "<tr>"."<td>商品名稱: ".$row["name"]."</td>"."</tr>".
			 "<tr>"."<td>商品分類: ".$row["catagory"]."</td>"."</tr>".
			 "<tr>"."<td>優惠資訊: ".$row["productInfo"]."</td>"."</tr>".
			 "<tr>"."<td>截止日期: ".$row["deadline_year"]."/".$row["deadline_month"]."/".$row["deadline_day"]."</td>"."</tr>".
			 "<tr>"."<td>地點: ".$row['location']."</td></tr>".
			 "<tr>"."<td>詳情".$row['comment']."</td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>".
			 "<tr><td></td></tr>";
	}
	echo "</table></center>";
	
	//$upperPage = $_POST['upperPage'];//自動跳回上一頁
	//header("Location: $upperPage");
    //exit;
?>
