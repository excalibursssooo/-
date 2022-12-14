<?php 
$conn=new mysqli("localhost","root","","exper4");
if($conn->connect_error){
    die("无法连接数据库！");
}
