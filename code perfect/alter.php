<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新页面</title>
    <link href="perff.css" rel="stylesheet">
</head>

<body>
    <form action="update.php" method="GET">
        <table class="table">
            <?php
            if (!isset($_GET["tablename"])) die("未选择数据表");
            $tableName = $_GET["tablename"];
            $primaryKeyName = $_GET["primaryKeyName"];
            $primaryKeyValue = $_GET["primaryKeyValue"];
            //$tablename = $_GET["tablename"]; //将表名传进来
            require_once "conn.php"; // 连接数据库
            $sql = "show columns from $tableName"; //展示对应表的列名
            $res = $conn->query($sql);
            $columns = array(); //用来记录列名
            if (!$res) die("未找到该表");
            $row = mysqli_num_rows($res);
            echo '<tr>';
            for ($i = 0; $i < $row; $i++) {
                $dbrow = mysqli_fetch_array($res);
                echo '<td>' . $dbrow[0] . '</td>';
                array_push($columns, $dbrow[0]);
            } //显示列名
            echo '<tr>';
            $sql = "select * from  $tableName where $primaryKeyName = '$primaryKeyValue';";
            //echo "$sql";
            $res = $conn->query($sql); //找出要更新的一行
            $data = mysqli_fetch_assoc($res);
            if (!$res) die("没有找到该数据！");
            for ($j = 0; $j < count($columns); $j++) {
                echo '<td>
            <div class="mb-3">
            <input type="text" class="form-control" id="formGroupExampleInput" value = ' . $data[$columns[$j]] . ' name = "' . $columns[$j] . '">
            </div></input></td>';
            }
            echo '<td><a onclick = "return upd()"><input type="submit" class="btn btn-primary value="更新记录"></a></td>';
            echo '</tr>';
            //提交隐藏数据
            echo '<input type="text" name="tableName" style="display:none;" value=' . $tableName . '></input>';
            echo '<input type="text" name="primaryKeyName" style="display:none;" value=' . $primaryKeyName . '></input>';
            echo '<input type="text" name="primaryKeyValue" style="display:none;" value=' . $primaryKeyValue . '></input>';
            ?>
        </table>
    </form>
    <a href="tableInfo.php?tablename=<?php echo $tableName ?>" class="btn btn-primary">返回</a>
    <script language="javascript">
        //弹出确认框
        function upd() {
            if (confirm("确认更改吗？"))
                return true;
            else return false;
        }
    </script>
</body>

</html>