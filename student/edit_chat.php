<?php require_once '../dbhelp.php' ?>
<?php require_once '../check.php' ?>

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
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];   
		$a = $_GET['a'];
    }
    ?>
    <?php
    if (!empty($_POST)) {
        $nd = $_POST['tinnhan'];
        $sql = "UPDATE `chat` SET `noi_dung` = '$nd' WHERE `noi_dung`='$id'";
        execute($sql);
    }
	if(isset($_POST['save'])){
		header('Location: /challenge5a_daohx/student/chat.php?id='.$a.'');
	}
    ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Tin Nhắn</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="fullname">Tin Nhắn:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="tinnhan" value="<?=$id?>" >
					</div>
					<button type="submit" class="btn btn-success" name="save">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>