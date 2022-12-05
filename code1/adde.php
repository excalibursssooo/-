<?php
$id = $_GET["id"];
$name = $_GET["cname"];
$city = $_GET["city"];
require_once "conn.php";

$sql = "INSERT INTO data1.employees (eid, ename, city) VALUES ('$id', '$name', '$city');";
$res = $conn->query($sql);
if ($res) {
    $conn->query($sql);
    header("Location:employees.php");
} else {
    echo "输入信息格式错误！";
}
