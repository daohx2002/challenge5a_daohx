
<?php require_once '../check.php' ?>

<?php
require_once ('../dbhelp.php');
$s_fullname = $s_username = $s_password = $s_email = $s_sđt = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['fullname'])) {
		$s_fullname = $_POST['fullname'];
	}

	if (isset($_POST['username'])) {
		$s_username = $_POST['username'];
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


	$s_fullname = str_replace('\'', '\\\'', $s_fullname);
	$s_username = str_replace('\'', '\\\'', $s_username);
    $s_email    = str_replace('\'', '\\\'', $s_email);
    $s_sđt      = str_replace('\'', '\\\'', $s_sđt);
	$s_id       = str_replace('\'', '\\\'', $s_id);
    // $s_image    = str_replace('\'', '\\\'', $s_image);

	if ($s_id != '') {
		//update
		$sql = "update student set fullname = '$s_fullname', username = '$s_username', email = '$s_email', sđt = '$s_sđt' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into student(fullname, username, password, email, sđt) value ('$s_fullname', '$s_username', '$s_password', '$s_email', '$s_sđt')";
	}

	// echo $sql;

	execute($sql);

	header('Location: http://localhost/challenge5a_daohx/index.php');
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
        $s_email    = $std['email'];
        $s_sđt      = $std['sđt'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
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
				<h2 class="text-center">Sửa Thông Tin Cá Nhân</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="fullname">Fullname:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$s_fullname?>"readonly >
					</div>
                    <div class="form-group">
					  <label for="usr">Username:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="username" value="<?=$s_username?>" readonly>
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
					<button class="btn btn-success" type="submit">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>