<?php
    require_once "conn.php";
    $tableName = $_GET["tablename"];
    $primaryKeyName = $_GET["primaryKeyName"];
    $primaryKeyValue = $_GET["primaryKeyValue"];
    $sql = "delete from $tableName where $primaryKeyName ='$primaryKeyValue'";
    echo "delete from $tableName where $primaryKeyName ='$primaryKeyValue'";
    $res = $conn->query($sql);
    if(!$res) echo "<script>window.alert('删除失败,请返回');history.back(1);</script>";
    else header("Location:tableinfo.php?tablename=$tableName");
