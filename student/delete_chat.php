<?php require_once '../dbhelp.php' ?>
<?php require_once '../check.php' ?>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
    $a = $_GET['a'];
    // echo $id;
	$sql = "DELETE FROM `chat` WHERE `noi_dung` = '$id' ";
    execute($sql);
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Xoá thành công")';  
    echo '</script>';  
    header('Location: /challenge5a_daohx/teacher/chat.php?id='.$a.'');
    
	// execute($sql);
}

?>