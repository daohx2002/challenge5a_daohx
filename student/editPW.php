<?php require_once '../dbhelp.php' ?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Đổi Mật Khẩu</title>
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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `student` WHERE `id` = '$id'";
        $studentList = executeResult($sql);
        foreach ($studentList as $std) {
            $passCu = $std['password'];
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $l1 = $_POST['password'];
            if($passCu !== $l1){
                echo "Sai Mất Rồi";
            }
            else{
                $l2 = $_POST['passwordM'];
                $l3 = $_POST['passwordMM'];
                if($l2 !== $l3){
                    echo "Mật Khẩu Mới Nhập Không Giống Nhau!!!";
                }
                else{
                    $sql1 = "UPDATE `student` SET `password`='$l2' WHERE `id`='$id'";
                    execute($sql1);
                    header('Location: /challenge5a_daohx/index.php');
                }
            }
        }
        // echo $a;
    }
    ?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đổi Mật Khẩu</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="form-group">
					  <label for="usr">Mật Khẩu Cũ:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="password" class="form-control" id="usr" name="password" >
					</div>
					<div class="form-group">
					  <label for="usr">Mật Khẩu Mới:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="password" class="form-control" id="usr" name="passwordM">
					</div>
                    <div class="form-group">
					  <label for="usr">Nhập Lại Mật Khẩu Mới:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="password" class="form-control" id="usr" name="passwordMM">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>