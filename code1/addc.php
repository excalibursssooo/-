<?php
    $id = $_GET["id"];
    $name = $_GET["cname"];
    $city = $_GET["city"];
    require_once "conn.php";

    $sql = "INSERT INTO data1.customers (cid, cname, city, visits_made, last_visit_time) VALUES ('$id', '$name', '$city', 1, now());";

    $res = $conn->query($sql);
    if($res){
        $conn->query($sql);
        header("Location:customers.php");
    }
    else{
        echo "输入信息格式错误！";
    }

   

?>