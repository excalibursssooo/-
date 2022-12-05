<?php
    $id = $_GET["id"];
    $name = $_GET["cname"];
    $city = $_GET["city"];
    require_once "conn.php";

    $sql = "UPDATE data1.customers SET cid = '$id', cname = '$name', city = '$city',last_visit_time = now() WHERE cid = '$id';";
    $res = $conn->query($sql);
    if($res){
        $conn->query($sql);
        header("Location:customers.php");
    }
    else{
        //echo "UPDATE data1.customers SET cid = '$id', cname = '$name', city = '$city',last_visit_time = now() WHERE cid = '$id';";
        echo "输入信息格式错误！";
    }

?>