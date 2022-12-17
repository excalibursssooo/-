<?php
include("conn.php");

// 获取字段名并且构造sql语句
$query = 'insert into rent_log (';
$res = mysqli_query($conn, "show columns from rent_log");
$row = mysqli_num_rows($res);
$columns = array(); // 记录列名称
for ($i = 0; $i < $row; $i++) {
    $cname = mysqli_fetch_array($res)[0];
    $query = $query . $cname . ',';
    array_push($columns, $cname);
}
$query = substr($query, 0, strlen($query) - 1);   // 去掉末尾逗号
$query = $query . ') values (';
for ($i = 0; $i < count($columns); $i++) {
    $cname = $columns[$i];
    if ($cname == 'Date_Rented') $query = $query . "now(),";
    else if ($cname == 'Insurance') {
        if ($_GET[$cname] == 'on') $query = $query . "1,";
        else $query = $query . "0,";
    } else if ($_GET[$cname] == NULL) $query = $query . "NULL,";
    else $query = $query . '"' . $_GET[$cname] . '",';
}
$query = substr($query, 0, strlen($query) - 1);   // 去掉,号
$query = $query . ')';

// 执行修改sql
$res = mysqli_query($conn, $query);

if ($res) {
    $sql = "update bags set rented = 1 where Bag_ID = $_GET[Bag_ID]";
    echo $sql;
    $res = mysqli_query($conn, $sql);
    header("Location:Userweb.php");
} else {
    echo "$query";
    //echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";
}
