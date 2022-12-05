<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="perff.css" rel="stylesheet">
    <title>详情页</title>
</head>

<body>
    <table class="table">
        <?php
        // 打印列名   
        if (!isset($_GET["tablename"])) die("未选择数据表");

        $tablename = $_GET["tablename"]; //将表名传进来
        require_once "conn.php"; // 连接数据库
        $sql = "show columns from $tablename"; //展示对应表的列名
        $res = $conn->query($sql);
        $columns = array(); //用来记录列名

        if (!$res) die("未找到该表");

        $row = mysqli_num_rows($res);

        echo '<tr>';
        for ($i = 0; $i < $row; $i++) {
            $dbrow = mysqli_fetch_array($res);
            echo '<td>' . $dbrow[0] . '</td>';
            array_push($columns, $dbrow[0]);
        }
        echo '<td>操作</td>';
        echo '</tr>';

        //打印数据
        $sql = "select * from $tablename"; //查找每一行数据
        $res = $conn->query($sql);
        $row = mysqli_num_rows($res);
        for ($i = 0; $i < $row; $i++) {
            echo '<tr>';
            $dbrow = mysqli_fetch_array($res);
            for ($j = 0; $j < count($columns); $j++) {
                echo '<td>' . $dbrow[$columns[$j]] . '</td>';
            }
        ?>
            <td><a href="alter.php?tablename=<?php echo $tablename ?>&primaryKeyName=<?php echo $columns[0] ?>&primaryKeyValue=<?php echo $dbrow[0] ?>"><button type="submit" class="btn btn-primary">更新</button></a>
                <a href="delete.php?tablename=<?php echo $tablename ?>&primaryKeyName=<?php echo $columns[0] ?>&primaryKeyValue=<?php echo $dbrow[0] ?>" onclick="return del()"><button type="submit" class="btn btn-danger">删除</button></a>
            </td>
        <?php echo '</tr>';
        }
        $count = count($columns);
        ?>

    </table>
    <script language="javascript">
        //删除弹出确认框
        function del() {
            if (confirm("确认删除吗？"))
                return true;
            else return false;
        }
    </script>
    <a href="add.php?tablename=<?php echo $tablename ?>&count=<?php echo $count ?>"><button type="submit" class="btn btn-primary">添加</button></a>
    <a href="show.php" class="btn btn-primary">返回</a>
</body>

</html>