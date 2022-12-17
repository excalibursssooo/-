<?php
require_once "conn.php";
$id = $_GET['id'];
$name = $_GET['name'];
$color = $_GET['color'];
$manufacturer = $_GET['manufacturer'];
$price = $_GET['price'];
$url = $_GET['url'];
$sql = "insert into bags (Bag_ID,Name,Color,Manufacture,Price,rented,url) values ('$id','$name','$color','$manufacturer','$price',0,'$url');";
echo $sql;
$res = mysqli_query($conn,$sql);
if($res){
    echo "<script>window.alert('添加成功,请返回');history.back(1);</script>";
}
else{
    echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";
}
?>