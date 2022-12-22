<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $cid = $_GET['Cus_ID'];
    $bid = $_GET['Bag_ID'];
    $sql = "select rented from bags where Bag_ID = '$bid'";
    $res = mysqli_query($conn, $sql);
    $rented = mysqli_fetch_array($res)[0];
    if ($rented == 0) {
        echo "<script>window.alert('你没有租借此商品,请返回');history.back(1);</script>";
    } else {
        $sql = "select * from rent_log where Bag_ID = '$bid' and Cus_ID = '$cid' ";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo "<script>window.alert('你没有租借此商品*,请返回');history.back(1);</script>";
        } else {
            $sql = "update rent_log set Date_Returned = curdate() where Bag_ID = '$bid' and Cus_ID = '$cid' and (select rented from bags where Bag_ID = '$bid') = 1 and Date_Returned >= curdate()";
            $res = mysqli_query($conn, $sql);
            $sql = "update bags set rented = 0 where Bag_ID = '$bid'";
            $res = mysqli_query($conn, $sql);
            $sql = "SELECT Price from bags where Bag_ID = '$bid'";
            $res = mysqli_query($conn, $sql);
            $rented = mysqli_fetch_array($res)[0];
            $sql = "SELECT datediff(Date_Returned,Date_Rented)* ($rented+Insurance) as Cost from rent_log WHERE
rent_log.Cus_ID='$cid' AND rent_log.Bag_ID = '$bid' AND Date_Returned = curdate();";
            echo $sql;
            $res = mysqli_query($conn, $sql);
            $rented = mysqli_fetch_array($res)[0];
            echo "<script>window.alert('归还成功！共需支付$$rented');history.back(1);</script>";
        }
    }
    ?>
</body>

</html>