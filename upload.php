<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd"><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<?php
include("mysql_connect.inc.php");
$id = mysql_insert_id();
mysql_query("INSERT INTO ID values ('NULL','NULL')");//auto increment
printf("Last inserted record has id %d\n", mysql_insert_id());

//-------------------儲存圖片------------------------
header ('Content-Type: text/html; charset=utf-8');
echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
echo "暫存名稱: " . $_FILES["file"]["tmp_name"];

$extension=explode('.',$_FILES['file']['name']);//複製檔案格式
$uid=mysql_insert_id();//會員流水號
$filename = $uid.'.'.$extension[1];//檔名 = 流水號 + 檔案格式
move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$filename);

echo '<br/>'.$extension[1];

?>
