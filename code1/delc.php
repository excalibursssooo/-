<?php
$id = $_GET["id"];
$table_name = $_GET["table_name"];
$row_name = $_GET["name"];
require_once "conn.php";

$sql = "DELETE FROM $table_name WHERE $row_name = '$id'";

//echo "DELETE FROM $table_name WHERE $row_name = '$id'";

if ($conn->query($sql)) {
    //$conn->query($sql);
    header("Location:$table_name.php");
} else echo "无法删除！";
