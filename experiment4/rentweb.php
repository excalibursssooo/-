<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Sticky Footer Navbar Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body><?php
        include("conn.php");
        $id = $_GET["bagid"];
        $sql = "SELECT rented FROM bags WHERE Bag_ID = $id";
        $res = mysqli_query($conn, $sql);
        $rented = mysqli_fetch_array($res)[0];
        if ($rented == 1) {
            echo "<script>window.alert('商品已被借走,请返回');history.back(1);</script>";
        }
        ?>
    <div style='margin:0 auto;width:500px;height:500px'>
        <form action="sub.php" method="GET" margin: 0 auto class="was-validated">
            <div class="form-group">
                <label for="exampleInputEmail1">Your ID</label>
                <div class="input-group is-invalid">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Cus_ID" required></input>
                </div>
                <div class="invalid-feedback">please wirte an ID !</div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Return date</label>
                <div class="input-group is-invalid"><input type="date" class="form-control" id="exampleInputPassword1" name="Date_Returned" required></input></div>
                <div class="invalid-feedback">please choose your Returned date!</div>
            </div>
            <div class="form-group form-check">

                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="Insurance"></input>
                <label class="form-check-label" for="exampleCheck1">Insurance</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="col-12"><input type="text" name="Bag_ID" style="display:none;" value="<?php echo $id; ?>"></input></div>
        </form>
    </div>
    <script script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>