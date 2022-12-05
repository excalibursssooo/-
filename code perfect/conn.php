<?php 
$conn=new mysqli("localhost","root","","data1");
if($conn->connect_error){
    die("无法连接数据库！");
}
