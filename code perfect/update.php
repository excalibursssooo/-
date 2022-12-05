<?php 
include("conn.php");

$tableName = $_GET["tableName"];
$primaryKeyName = $_GET["primaryKeyName"];
$primaryKeyValue = $_GET["primaryKeyValue"];

$query = 'update ' . $tableName . ' set ';
$res = mysqli_query($conn, "show columns from " . $tableName);
$row = mysqli_num_rows($res);
for($i=0; $i<$row; $i++) {
    $cname = mysqli_fetch_array($res)[0];
    $query = $query . $cname . '="' . $_GET[$cname] . '",';
}
$query = substr($query, 0, strlen($query)-1);   // 去掉,号
$query = $query . ' where ' . $primaryKeyName . '="'. $primaryKeyValue.'";';
//echo $query;
// 执行修改sql
$res = mysqli_query($conn, $query);
if($res){
    //echo "<script>window.alert('修改成功,请返回');</script>";
    header("Location:tableInfo.php?tablename= $tableName");
}
else
    echo "<script>window.alert('修改失败,请返回');history.back(1);</script>";
