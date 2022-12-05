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
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">CITY</th>
            <th scope="col">telephone number</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM suppliers";
            $result = $conn->query($sql);
            $table_name = "suppliers";
            $name = "sid";
        ?>
        <?php
            while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["sid"]?></td>
            <td><?php echo $row["sname"]?></td>
            <td><?php echo $row["city"]?></td>
            <td><?php echo $row["telephone_no"]?></td>
            <td><a href="delc.php?id=<?php echo $row['sid']?>&table_name=<?php echo $table_name?>&name=<?php echo $name?>"><button type="submit" class="btn btn-primary">删除</button></a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="adds.html"><button type="submit" class="btn btn-primary">添加</button></a>
    <a href="test.php"><button type="submit" class="btn btn-primary">返回</button></a>
</body>
</html>