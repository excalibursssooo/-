<!DOCTYPE html>
<html lang="en" class="h-100">

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

<div class="row">
	<div class="col-3">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">商品详情</button>
			<button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
			<button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
			<button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
		</div>
	</div>
	<div class="col-9">
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<?php
				require_once "conn.php";
				$sql = "show columns from bags"; //展示对应表的列名
				$res = $conn->query($sql);
				$columns = array(); //用来记录列名
				if (!$res)
					die("未找到该表");
				$row = mysqli_num_rows($res);
				$dbrow = mysqli_fetch_array($res);
				for ($i = 1; $i < $row; $i++) {
					$dbrow = mysqli_fetch_array($res);
					array_push($columns, $dbrow[0]);
				}
				$sql = "select Name,Color,Manufacture,Price from bags"; //查找每一行数据
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
							<div class="card">
								<img src="https://ts1.cn.mm.bing.net/th/id/R-C.7d4ae8e49419e84cc85a0df3508d543f?rik=yHSZRxlIGwIWYA&riu=http%3a%2f%2fwww.timenetwork.com.cn%2fuploadfile%2f2020%2f0625%2f20200625113853173.jpg&ehk=jwLvo3KB3AepuReGe%2bow%2b07Jd5wDOVTgofsVIlKSxWg%3d&risl=&pid=ImgRaw&r=0" class="card-img-top">
								<div class="card-body">
									<h5 class="card-title"><?php echo $dbrow[$columns[0]]; ?></h5>
									<p class="card-text"><?php
															for ($j = 1; $j < count($columns); $j++) {
																if ($j == 2) echo "Manufacturer: ";
																else if ($j == 3) echo "Price: ";
																else if ($j == 1) echo "Color: ";
																echo $dbrow[$columns[$j]];
																echo "</br>";
															}

															?></p>
									<a href="#" class="btn btn-primary">Buy it!</a>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">aaa</div>
			<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">bbb</div>
			<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">ccc</div>
		</div>
	</div>
</div>


<script script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>