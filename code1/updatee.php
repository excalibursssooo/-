<?php
    $id = $_GET["id"];
    $name = $_GET["cname"];
    $city = $_GET["city"];
    require_once "conn.php";

    $sql = "UPDATE data1.employees SET eid = '$id', ename = '$name', city = '$city' WHERE eid = '$id';";
    //echo "UPDATE data1.customers SET eid = '$id', ename = '$name', city = '$city' WHERE eid = '$id';";
    $res = $conn->query($sql);
    if($res){
        $conn->query($sql);
        header("Location:employees.php");
    }
    else{
        echo "输入信息格式错误！";
    }

?>