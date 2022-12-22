<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://cdn.imgcn.top/20210118/d8dab14a9c2aae92167cb0b4d14d6098.png!logo" width="30" height="30" class="d-inline-block align-top" alt="">
            Luxury Shop
        </a>
    </nav>
    <?php
    require_once "conn.php";
    $id = $_GET['id'];
    $name = $_GET['name'];
    $color = $_GET['color'];
    $manufacturer = $_GET['manufacturer'];
    $price = $_GET['price'];
    $url = $_GET['url'];
    $sql = "insert into bags (Bag_ID,Name,Color,Manufacture,Price,rented,url) values ('$id','$name','$color','$manufacturer','$price',0,'$url');";
    echo $sql;
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>window.alert('添加成功,请返回');history.back(1);</script>";
    } else {
        echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";
    }
    ?>
</body>

</html>