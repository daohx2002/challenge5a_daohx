<?php
require_once ('../dbhelp.php');
?>
<?php require_once '../check.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách Bài Tập</title>
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
				Danh Sách Bài Tập Sinh Viên Nộp
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<!-- <th>STT</th> -->
                            <th>Tên Bài</th>
							<th>Người Nộp Bài</th>
							<th >Đáp Án</th>
                            <!-- <th>Trả lời</th> -->
                            <!-- <th>Email</th>
							<th>SĐT</th>
							<th>Avatar</th> -->
							<th width="10px"></th>
                            <!-- <th width="80px"></th> -->
						</tr>
					</thead>
					<tbody>
<?php
    // $file = $_FILES['filename'];
	// $name = $file['name'];
	// echo $name;
	// die();
    $sql = 'select * from answer';
    $studentList = executeResult($sql);
    $index = 1;
    foreach ($studentList as $std) {
        echo '<tr>
                <td>'.$std['ten_bai'].'</td>
                <td>'.$std['username'].'</td>
                <td>'.$std['answer'].'</td>
				<td><button class="btn btn-warning"><a href="../answer/'.$std['answer'].'" download>Download</a></button></td>
            </tr>';
    }
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- <td><button class="btn btn-warning" onclick=\'window.open("download.php?id='.$std['question'].'","_self")\'>Download</button></td> -->
	<!-- <a href="../bai_tap/2dfaa993ecdb11973dc2e26622d64918.png" download>Download</a> -->
	<!-- <td><button class="btn btn-warning" onclick=\'window.open("answer.php?id='.$std['id'].'","_self")\'>Upload</button></td> -->
</body>
</html>

<!-- <td>'.$std['email'].'</td>
<td>'.$std['sđt'].'</td>
<td><img src="../upload/'.$std['image'].'" alt="" width="70px"></td> -->