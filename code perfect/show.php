<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="perff.css" rel="stylesheet">
    <title>主页</title>
</head>

<body>
    <div style='margin:0 auto;width:500px;height:500px'>
        <table class="table">
            <?php
            require_once "conn.php"; // 连接数据库
            $sql = "show tables";
            $res = $conn->query($sql);
            if (!$res) echo "NO TABLES"; // 出错则报错

            $row = mysqli_num_rows($res); //row代表表的个数

            for ($i = 0; $i < $row; $i++) {
                $tableinfo = mysqli_fetch_array($res); //将表的名称，列名称存入数组
                $tablename = $tableinfo[0];  // 名称在第一列，将名称存入$tablename
                $tr = '<a href="tableInfo.php?tablename=' . $tablename . '"><button type="submit" class="btn btn-primary">查看详情</button></a>'; //查看详情按钮
                echo "<tr><td>$tablename</td><td>$tr</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>