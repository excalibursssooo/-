<?php
require_once "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<table class = "table">
        <thead>
        <tr>
            <th scope="col">PID</th>
            <th scope="col">NAME</th>
            <th scope="col">QOH</th>
            <th scope="col">qoh threshold</th>
            <th scope="col">original price</th>
            <th scope="col">discntrate</th>
            <th scope="col">SID</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            $table_name = "products";
            $name = "pid";
        ?>
        <?php
            while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["pid"]?></td>
            <td><?php echo $row["pname"]?></td>
            <td><?php echo $row["qoh"]?></td>
            <td><?php echo $row["qoh_threshold"]?></td>
            <td><?php echo $row["original_price"]?></td>
            <td><?php echo $row["discnt_rate"]?></td>
            <td><?php echo $row["sid"]?></td>
            <td><a href="delc.php?id=<?php echo $row['pid']?>&table_name=<?php echo $table_name?>&name=<?php echo $name?>"><button type="submit" class="btn btn-primary">删除</button></a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <a href="test.php"><button type="submit" class="btn btn-primary">返回</button></a>
</body>
</html>