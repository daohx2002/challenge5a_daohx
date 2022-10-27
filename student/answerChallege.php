<?php
require_once ('../dbhelp.php');
?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Challlege</title>
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
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            // echo $id;
        }
        $sql = "SELECT * FROM `challege` WHERE `title`= '$id'";
        // $conn = mysqli_connect('localhost', 'root', '', 'db1656');
        // $query = mysqli_query($conn, $sql);
        $studentList= executeResult($sql);
        foreach ($studentList as $std){
            $title =  $std['title'];
            $hint = $std['hint'];
            $filename = $std['url'];
        }
        $sub = $filename;
        $filename = explode('.', $filename);
        $file =  $filename[0];
        $ext = end($filename);
        // echo $file;
        if(isset($_POST['dapan'])){
            if($file == $_POST['dapan']){
                echo "Đúng rồi nè!!!!!!!!!<br>";
                echo "Hãy thưởng thức bài văn này nha!!!!<br>";
                readfile('../challege/'.$sub.'');
                // echo $read;
            }
            else{
                echo "Sai mất rồi!!!!!!!!!<br>";
            }
        }
        // echo $ext;
    ?>
	<div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-info">
                          <!-- <div class="panel-heading">
                                <h3 class="panel-title">Panel title</h3>
                          </div> -->
                          <div class="panel-body">
                                <form action="" method="POST" role="form" enctype="multipart/form-data">
                                    <legend>Challege</legend>
                                    <div class="form-group">
                                        <label for="">Tên Bài</label>
                                        <input type="text" class="form-control" id="" placeholder="Input field" name="tenbai" value='<?php echo $title ?>' readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hint</label>
                                        <input type="text" class="form-control" id="" placeholder="Input field" name="hint" value='<?php echo $hint ?>' readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Đáp Án (Không Dấu)</label>
                                        <input type="text+" class="form-control" id="" placeholder="Input field" name="dapan">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
                          </div>
                    </div>
                    
                </div>
            </div>
        </div>
	<!-- </div> -->
	<!-- <td><button class="btn btn-warning"><a href="../bai_tap/'.$std['question'].'" download>Download</a></button></td>
	<td><button class="btn btn-warning" onclick=\'window.open("answer.php?id='.$std['ten_bai'].'","_self")\'>Upload</button></td> -->
</body>
</html>

<!-- <td>'.$std['email'].'</td>
<td>'.$std['sđt'].'</td>
<td><img src="../upload/'.$std['image'].'" alt="" width="70px"></td> -->