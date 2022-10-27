<?php
require_once ('../dbhelp.php');
?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách Người Dùng</title>
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<?php require_once 'header.php' ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Danh Sách Người Dùng
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Username</th>
                            <!-- <th>Email</th>
							<th>SĐT</th>
							<th>Avatar</th> -->
							<th width="60px"></th>

						</tr>
					</thead>
					<tbody>
<?php
$user = $_SESSION['user'];
$m = $user['username'];
// echo $m;
$sql = "SELECT * FROM `student` WHERE `username` != '$m'";

$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['fullname'].'</td>
			<td>'.$std['username'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("profileMN.php?id='.$std['id'].'","_self")\'>Profile</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</body>
</html>