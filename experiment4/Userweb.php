<!DOCTYPE html>
<html lang="zh" class="h-100">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.101.0">
	<title>Sticky Footer Navbar Template · Bootstrap v4.6</title>

	<!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sticky-footer-navbar/"> -->



	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
</head>

<body>
	<!--导航栏 -->
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="#">
			<img src="https://cdn.imgcn.top/20210118/d8dab14a9c2aae92167cb0b4d14d6098.png!logo" width="30" height="30" class="d-inline-block align-top" alt="">
			Luxury Shop
		</a>
	</nav>

	<div class="row">
		<div class="col-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">商品详情</button>
				<button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">用户详情</button>
				<button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">最佳用户</button>
				<button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">归还处</button>
				<button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-sss" type="button" role="tab" aria-controls="v-pills-sss" aria-selected="false">增设商品</button>
			</div>
		</div>
		<div class="col-9">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="form-check form-check-inline">
						<ul>
							<form action="Userweb.php" method="post">
								<?php
								$connect = mysqli_connect('localhost', 'root', '');
								if ($connect) {
									mysqli_select_db($connect, 'exper4');
									$sql = "select distinct Manufacture from bags";
									$res = mysqli_query($connect, $sql);
									$i = 0;
									while ($row = mysqli_fetch_array($res)) {
										echo "<input class='form-check-input'type = 'checkbox' name = 'manus[]' id='inlineCheckbox$i' value='$row[0]'><label class='form-check-label' for='inlineCheckbox$i'><p class='font-weight-bold'>" . $row[0] . "&nbsp&nbsp&nbsp&nbsp&nbsp</p></label>";
										$i++;
									}
									echo "<button type = 'submit' class = 'btn btn-primary' style='margin-left: 20px; margin-top:10px;padding:5px'>select</button>";
								} else {
									echo "fail";
								}
								?>
							</form>
						</ul>
					</div>
					<?php
					require_once "conn.php";
					$sql = "show columns from bags "; //展示对应表的列名
					$res = $conn->query($sql);
					$columns = array(); //用来记录列名
					if (!$res)
						die("未找到该表");
					$row = mysqli_num_rows($res);
					//$dbrow = mysqli_fetch_array($res);
					for ($i = 0; $i < $row; $i++) {
						$dbrow = mysqli_fetch_array($res);
						array_push($columns, $dbrow[0]);
					}
					$sql = "select Bag_ID,Name,Color,Manufacture,Price,rented,url from bags "; //查找每一行数据
					if (!empty($_POST['manus'])) {
						$sql = $sql . 'where ';
						$fenhao = "'";
						$manus = $_POST['manus'];
						$cnt = count($manus);
						for ($i = 0; $i < $cnt; $i++) {
							if ($i != $cnt - 1) {
								$sql = $sql . 'Manufacture = ' . $fenhao . $manus[$i] . $fenhao . 'or ';
							} else {
								$sql = $sql . 'Manufacture = ' . $fenhao . $manus[$i] . $fenhao;
							}
						}
					}
					$res = $conn->query($sql);
					$row = mysqli_num_rows($res);
					for ($i = 0; $i < $row; $i = $i + 3) {
					?>
						<div class="card-deck">
							<?php
							for ($k = 0; $k < 3; $k++) {
								$dbrow = mysqli_fetch_array($res);
								if (!$dbrow) break;
							?>
								<div class="card" style="max-width: 300px;">
									<img src="<?php echo $dbrow[$columns[6]]; ?>" class="figure-img img-fluid rounded" style="Max-height: 400px">
									<div class="card-body">
										<h5 class="card-title"><?php echo $dbrow[$columns[1]]; ?></h5>
										<p class="card-text"><?php
																for ($j = 0; $j < count($columns) - 1; $j++) {
																	if ($j == 1) continue;
																	if ($j == 0) echo "<b>ID:</b>";
																	if ($j == 3) echo "<b>Manufacturer: </b>";
																	else if ($j == 4) echo "<b>Price: </b>";
																	else if ($j == 2) echo "<b>Color: </b>";
																	else if ($j == 5) {
																		if ($dbrow[$columns[$j]] == 0) echo "<b>Availabel</b>";
																		else echo "Unavailabel";
																	}
																	if ($j != 5)
																		echo $dbrow[$columns[$j]];
																	echo "</br>";
																}

																?></p>
										<a href="rentweb.php?bagid=<?php echo $dbrow[$columns[0]] ?>" class="btn btn-primary">Rent it!</a>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<table class="table">
						<?php

						$sql = "show columns from customers "; //展示对应表的列名
						$res = $connect->query($sql);
						$columns = array(); //用来记录列名
						if (!$res)
							die("未找到该表");
						$row = mysqli_num_rows($res);
						?>
						<thead class="thead-dark">
							<tr>
								<?php
								for ($i = 0; $i < $row; $i++) {
									$dbrow = mysqli_fetch_array($res);
									echo "<th scope='col'>$dbrow[0]</th>";
									array_push($columns, $dbrow[0]);
								}
								?>
								<th scope="col">#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "select * from customers "; //查找每一行数据
							$res = $conn->query($sql);
							$row = mysqli_num_rows($res);
							for ($i = 0; $i < $row; $i++) {
							?>
								<tr>
									<?php
									$dbrow = mysqli_fetch_array($res);
									for ($j = 0; $j < count($columns); $j++) {
									?>
										<th scope="col">
											<?php
											echo $dbrow[$columns[$j]];
											?>
										</th>
									<?php
									}
									?>
									<th scope="col">
										<a href="rent.php?id=<?php echo $dbrow[$columns[0]] ?>"><button type='submit' class='btn btn-primary'>show rental</button></a>
									</th>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th scope="col">#</th>
								<th scope="col">ID</th>
								<th scope="col">Lastname</th>
								<th scope="col">Firstname</th>
								<th scope="col">Address</th>
								<th scope="col">Tele#</th>
								<th scope="col">Total Rent day</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$connect = mysqli_connect('localhost', 'root', '');
							if ($connect) {
								mysqli_select_db($connect, 'exper4');
								mysqli_query($connect, "set @res = '' ");
								$res = mysqli_query($connect, "call best_customer(@res)");
								$res = mysqli_fetch_array($res);
								$res = $res[0];
								$token = strtok($res, ';');
								$i = 0;
								while ($token != false) {
									if ($i == 0) {
										echo "<tr>";
										echo "<td><p><strong>" . '1' . "</td></p></strong>";
									}
									if ($i % 6 == 0 && $i >= 6) {
										if ($i % 2 == 0) {
											echo "<tr>";
											$ii = $i / 6 + 1;
											echo "<td><p><strong>" . $ii . "</td></p></strong>";
										} else echo "</tr>";
									}

									echo "<td>" . $token . "</td>";
									$token = strtok(';');
									$i++;
								}
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
					<div style='margin:0 auto;width:500px;height:500px'>
						<form action="return.php" method="GET" class="was-validated">
							<div class="mb-3">
								<label for="validationTextarea">请输入你的ID</label>
								<div class="input-group is-invalid">
									<input type="text" class="form-control" id="exampleInputEmail1" name="Cus_ID" required></input>
								</div>
							</div>
							<div class="mb-3">
								<label for="validationTextarea">请输入包的ID</label>
								<div class="input-group is-invalid">
									<input type="text" class="form-control" id="exampleInputEmail1" name="Bag_ID" required></input>
								</div>
							</div>
							<!-- Button trigger modal -->
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-sss" role="tabpanel" aria-labelledby="v-pills-sss-tab">
					<form class="was-validated" method="GET" action="add.php">
						<div class="col-md-6 mb-3">
							<label for="validationTextarea1">ID</label>
							<textarea class="form-control is-invalid" id="validationTextarea1" placeholder="Required id" name="id" required></textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTextarea2">Name</label>
							<textarea class="form-control is-invalid" id="validationTextarea2" placeholder="Required Name" name="name" required></textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTextarea3">Color</label>
							<textarea class="form-control is-invalid" id="validationTextarea3" placeholder="Required Color" name="color" required></textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTextarea4">Manufacture</label>
							<textarea class="form-control is-invalid" id="validationTextarea4" placeholder="Required Manufacture" name="manufacturer" required></textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTextarea5">Price</label>
							<textarea class="form-control is-invalid" id="validationTextarea5" placeholder="Required Price" name="price" required></textarea>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTextarea6">Image URL</label>
							<textarea class="form-control is-invalid" id="validationTextarea6" placeholder="Required image url" name="url" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>

			</div>
		</div>
	</div>


	<script script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>