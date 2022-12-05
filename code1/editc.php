<?php
require_once "conn.php";
$id = $_GET["id"];
$table_name = $_GET["table_name"];
$search_name = $_GET["search_name"];
$row_name = $_GET["name"];
$sql = "SELECT $search_name FROM $table_name WHERE $row_name = '$id';";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.css" rel="stylesheet">
    <title>编辑</title>
</head>

<body>
    <form action="updatec.php" method="get">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">请更改id</label>
            <input type="text" class="form-control" value="<?php echo $res['cid']; ?>" id="formGroupExampleInput" placeholder="ID" name="id">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">请更改姓名</label>
            <input type="text" class="form-control" value="<?php echo $res['cname']; ?>" id="formGroupExampleInput2" placeholder="NAME" name="cname">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">请更改城市</label>
            <input type="text" class="form-control" value="<?php echo $res['city']; ?>" id="formGroupExampleInput2" placeholder="CITY" name="city">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="更新">
        </div>
    </form>
</body>

</html>