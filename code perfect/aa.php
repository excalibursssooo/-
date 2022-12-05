<?php 
include("conn.php");

$tablename = $_GET["tablename"];

// 获取字段名并且构造sql语句
$query = 'insert into ' . $tablename . ' (';
$res = mysqli_query($conn, "show columns from " . $tablename);
$row = mysqli_num_rows($res);
$columns = array(); // 记录列名称
for($i=0; $i<$row; $i++) {
    $cname = mysqli_fetch_array($res)[0];
    $query = $query . $cname . ',';
    array_push($columns, $cname);
}
$query = substr($query, 0, strlen($query)-1);   // 去掉末尾逗号
$query = $query . ') values (';
for($i=0; $i<count($columns); $i++) {
    $cname = $columns[$i];
    if($cname == 'last_visit_time'||$cname == 'ptime') $query = $query . "now(),";
    else if($_GET[$cname] == NULL) $query = $query . "NULL,";
    else $query = $query . '"' . $_GET[$cname] . '",';
}
$query = substr($query, 0, strlen($query)-1);   // 去掉,号
$query = $query . ')';
echo "$query";
// 执行修改sql
$res = mysqli_query($conn, $query);
if($res)
    header("Location:tableinfo.php?tablename=$tablename");
else
    echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";
