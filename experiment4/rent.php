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
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Bag</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php
            $connect = mysqli_connect('localhost', 'root', '');
            if ($connect) {
                //调用存储过程
                $id = $_GET['id'];
                mysqli_select_db($connect, 'exper4');
                mysqli_query($connect, "set @res = '' ");
                $res = mysqli_query($connect, "call rental_cost('$id',@res)");
                $res = mysqli_fetch_array($res);
                $res = $res[0];
                $token = strtok($res, ';');
                $i = 0;
                $ii = 0;
                $tot = 0;
                while ($token !== false) {
                    if ($i == 0) {
                        echo "<tr>";
                    }
                    if ($i % 5 == 0 && $i >= 5) {
                        echo "<tr>";
                        if ($ii == 5) {
                            echo "</tr>";
                            $ii = 0;
                        }
                    }
                    if ($ii == 4) {
                        echo "<td>" . $token . "</td>";
                        $tot += number_format($token);
                    } else {
                        echo "<td>" . $token . "</td>";
                    }
                    $token = strtok(';');
                    $i++;
                    $ii++;
                }
                echo "<tr><td></td><td></td><td></td><td></td><td>" . '$' . $tot . "</td>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>