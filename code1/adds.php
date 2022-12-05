<?php
    $id = $_GET["id"];
    $name = $_GET["cname"];
    $city = $_GET["city"];
    $tel = $_GET["tel"];
    require_once "conn.php";

    $sql = "INSERT INTO data1.suppliers (sid, sname, city,telephone_no) VALUES ('$id', '$name', '$city','$tel');";
    $res = $conn->query($sql);
    if($res){
        $conn->query($sql);
        header("Location:suppliers.php");
    }
    else{
        echo "输入信息格式错误！";
        echo "INSERT INTO data1.suppliers (sid, sname, city,telephone_no) VALUES ('$id', '$name', '$city','$tel');";
    }
    
    
   

?>