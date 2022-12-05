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
            <th scope="col">PURID</th>
            <th scope="col">CID</th>
            <th scope="col">EID</th>
            <th scope="col">PID</th>
            <th scope="col">QUANT</th>
            <th scope="col">TOTAL PRICE</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM purchases";
            $result = $conn->query($sql);
            $table_name = "purchases";
            $name = "purid";
        ?>
        <?php
            while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["purid"]?></td>
            <td><?php echo $row["cid"]?></td>
            <td><?php echo $row["eid"]?></td>
            <td><?php echo $row["pid"]?></td>
            <td><?php echo $row["qty"]?></td>
            <td><?php echo $row["total_price"]?></td>
            <td><a href="delc.php?id=<?php echo $row['purid']?>&table_name=<?php echo $table_name?>&name=<?php echo $name?>"><button type="submit" class="btn btn-primary">删除</button></a></td>
            
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <a href="test.php"><button type="submit" class="btn btn-primary">返回</button></a>
</body>
</html>