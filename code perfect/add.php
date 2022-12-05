<?php
$tablename = $_GET["tablename"];
$count = $_GET["count"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="perff.css" rel="stylesheet">
</head>

<body>
    <form action="aa.php" method="GET">
        <table class="table">
            <tr>
                <td>请添加数据</td>
            </tr>
            <?php
            if (!isset($_GET["tablename"])) die("未选择数据表");
            //$tablename = $_GET["tablename"]; //将表名传进来
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
            echo '<tr>';
            for ($j = 0; $j < $count; $j++) {
                echo '<td>
            <div class="mb-3">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="请填写' . $columns[$j] . '" name = "' . $columns[$j] . '">
            </div></input></td>';
            }
            echo '<td><input type="submit" class="btn btn-primary value="添加记录"></td>';
            echo '<div class = "col-12"><input type="text" name="tablename" style="display:none;" value=' . $tablename . '></input></div>';
            echo '</tr>';
            ?>
        </table>
    </form>
</body>

</html>