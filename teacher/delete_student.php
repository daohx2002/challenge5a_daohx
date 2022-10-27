
<?php require_once '../check.php' ?>
<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('../dbhelp.php');
	$sql = 'delete from student where id = '.$id;
	execute($sql);

	echo 'Xoá sinh viên thành công';
}