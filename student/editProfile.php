<?php
require_once ('../dbhelp.php');
?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh Sửa Thông Tin</title>
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

	<?php require_once 'header.php'?>	
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Thông Tin Cá Nhân
				<!-- <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form> -->
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Username</th>
                            <!-- <th>Password</th> -->
                            <th>Email</th>
							<th>SĐT</th>
							<!-- <th width="60px"></th> -->
							<th>Avatar</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
$k = $_SESSION['user'];
 	echo '<tr>
 			<td>'.$k['id'].'</td>
 			<td>'.$k['fullname'].'</td>
 			<td>'.$k['username'].'</td>
			<td>'.$k['email'].'</td>
			<td>'.$k['sđt'].'</td>
			<td><img src="../upload/'.$k['image'].'" alt="" width="70px"></td>
			<td><button class="btn btn-warning" onclick=\'window.open("edit.php?id='.$k['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-warning" onclick=\'window.open("editPW.php?id='.$k['id'].'","_self")\'>Đổi MK</button></td>
 		</tr>';

// echo $k['fullname'];
// print_r($_SESSION);
// echo $k["image"];
?>
	<!-- <td><img src="../upload/<?php echo $k['image'] ?>" alt="" width="40px"></td> -->

					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>