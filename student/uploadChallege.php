<?php
require_once ('../dbhelp.php');
?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Challege</title>
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
				Danh Sách Challege
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<!-- <th>STT</th> -->
                            <th>Tên Bài</th>
							<th>Người Giao Bài</th>
                            <th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
    $sql = 'select * from challege';
    $studentList = executeResult($sql);
    $index = 1;
    foreach ($studentList as $std) {
        echo '<tr>
                <td>'.$std['title'].'</td>
                <td>'.$std['creator'].'</td>
				<td><button class="btn btn-warning" onclick=\'window.open("answerChallege.php?id='.$std['title'].'","_self")\'>Submit</button></td>
            </tr>';
    }
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
    <!-- <td><button class="btn btn-warning"><a href="../bai_tap/'.$std['question'].'" download>Download</a></button></td> -->
	<!-- <td><button class="btn btn-warning" onclick=\'window.open("answer.php?id='.$std['id'].'","_self")\'>Upload</button></td> -->
</body>
</html>

<!-- <td>'.$std['email'].'</td>
<td>'.$std['sđt'].'</td>
<td><img src="../upload/'.$std['image'].'" alt="" width="70px"></td> -->