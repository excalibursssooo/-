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
    include("conn.php");

    // 获取字段名并且构造sql语句
    $query = 'insert into rent_log (';
    $res = mysqli_query($conn, "show columns from rent_log");
    $row = mysqli_num_rows($res);
    $columns = array(); // 记录列名称
    for ($i = 0; $i < $row; $i++) {
        $cname = mysqli_fetch_array($res)[0];
        $query = $query . $cname . ',';
        array_push($columns, $cname);
    }
    $query = substr($query, 0, strlen($query) - 1);   // 去掉末尾逗号
    $query = $query . ') values (';
    for ($i = 0; $i < count($columns); $i++) {
        $cname = $columns[$i];
        if ($cname == 'Date_Rented') $query = $query . "now(),";
        else if ($cname == 'Insurance') {
            if ($_GET[$cname] == 'on') $query = $query . "1,";
            else $query = $query . "0,";
        } else if ($_GET[$cname] == NULL) $query = $query . "NULL,";
        else $query = $query . '"' . $_GET[$cname] . '",';
    }
    $query = substr($query, 0, strlen($query) - 1);   // 去掉,号
    $query = $query . ')';

    // 执行修改sql
    $res = mysqli_query($conn, $query);
    $id = $_GET['Bag_ID'];
    if ($res) {
        $sql = "update bags set rented = 1 where Bag_ID = '$id'";
        echo $sql;
        $res = mysqli_query($conn, $sql);
        header("Location:Userweb.php");
    } else {
        echo "$query";
        //echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";
    }
    ?>
</body>

</html>