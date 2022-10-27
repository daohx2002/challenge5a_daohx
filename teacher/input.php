<?php require_once '../check.php' ?>

<?php
require_once ('../dbhelp.php');

$s_fullname = $s_username = $s_password = $s_email = $s_sđt  = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['fullname'])) {
		$s_fullname = $_POST['fullname'];
	}

	if (isset($_POST['username'])) {
		$s_username = $_POST['username'];
	}

	if (isset($_POST['password'])) {
		$s_password = $_POST['password'];
	}
    if (isset($_POST['email'])) {
		$s_email = $_POST['email'];
	}
    if (isset($_POST['sđt'])) {
		$s_sđt = $_POST['sđt'];
	}
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}
	// if (isset($_POST['type'])) {
	// 	$s_type = $_POST['type'];
	// }

	$s_fullname = str_replace('\'', '\\\'', $s_fullname);
	$s_username = str_replace('\'', '\\\'', $s_username);
	$s_password = str_replace('\'', '\\\'', $s_password);
    $s_email    = str_replace('\'', '\\\'', $s_email);
    $s_sđt      = str_replace('\'', '\\\'', $s_sđt);
	$s_id       = str_replace('\'', '\\\'', $s_id);
	// $s_type    = str_replace('\'', '\\\'', $s_type);

	if ($s_id != '') {
		//update
		$sql = "update student set fullname = '$s_fullname', username = '$s_username', password = '$s_password', email = '$s_email', sđt = '$s_sđt',type='student' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into student(fullname, username, password, email, sđt, type) value ('$s_fullname', '$s_username', '$s_password', '$s_email', '$s_sđt', 'student')";
	}

	// echo $sql;

	execute($sql);

	header('Location: /challenge5a_daohx/teacher/index.php');
	// die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_fullname = $std['fullname'];
        $s_username = $std['username'];
        $s_password = $std['password'];
        $s_email    = $std['email'];
        $s_sđt      = $std['sđt'];
		// $s_type      = $std['type'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm Sinh Viên</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Sinh Viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="fullname">Name:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$s_fullname?>">
					</div>
                    <div class="form-group">
					  <label for="usr">Username:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="username" value="<?=$s_username?>">
					</div>
                    <div class="form-group">
					  <label for="usr">Password:</label>
					  <input type="password" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="password" value="<?=$s_password?>">
					</div>
					<div class="form-group">
					  <label for="usr">Email:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="email" value="<?=$s_email?>">
					</div>
					<div class="form-group">
					  <label for="usr">SĐT:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="sđt" value="<?=$s_sđt?>">
					</div>
					<!-- <div class="form-group">
					  <label for="usr">Type:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="type" value="student" readonly>
					</div> -->
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>