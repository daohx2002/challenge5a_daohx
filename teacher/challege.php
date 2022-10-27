<?php require_once '../check.php' ?>
<?php require_once '../dbhelp.php' ?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upload Challege</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <?php require_once 'header.php' ?>
        <?php
        
            // session_start(); 
            $k = $_SESSION['user'];
            $m = $k['username'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten = $_POST['tenbai'];
                $hint = $_POST['hint'];
                $errors = [];
                $file = $_FILES['filename'];
                $size_allow = 10; //file upload tối đa là 10MB
                //ĐỔi tên file trước khi upload
                // print_r($file);
               
                $tenfile = $file['name'];
                $filename = explode('.', $tenfile);
                $ext = end($filename);
                // echo $filename;
                // echo $ext;
                
                // $new_file = md5(uniqid()).'.'.$ext;

                //Kiểm tra định dạng
                $allow_ext = ['png', 'jpg', 'jpeg', 'ppt','pptx', 'doc', 'docx', 'txt'];
                if(in_array($ext, $allow_ext)){
                    $size = $file['size']/1024/1024; //đổi từ byte => MB
                    // echo $size;
                    if($size<=$size_allow){
                        $upload = move_uploaded_file($file['tmp_name'], '../challege/'.$tenfile);
                        // $sql = "UPDATE `upload` SET `ten_bai`='$ten', `question`='$new_file' WHERE `username` = '$m'";
                        $sql = "INSERT INTO `challege`(`creator`, `title`, `hint`, `url`) VALUES ('$m','$ten','$hint','$tenfile')";
                        execute($sql);
                        if(!$upload){
                            $errors[] = 'upload_err';
                        }
                    }
                    else{
                        $errors[] = 'ext_err'; 
                    }
                    
                    if(!empty($errors)){
                        $mess = '';
                        if(in_array('ext_err', $errors)){
                            $mess = 'Dinh dang file khong hop le';
                        }
                        elseif(in_array('size_err', $errors)){
                            $mess = 'Dung luong file vuot qua';
                        }
                        else{
                            $mess = 'Khong the upload file';
                        }
                        if(!empty($mess)){
                            ?>
                            <div class="alert">
                                <?php echo $mess ?>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="alert">
                            Upload file thành công
                        </div>
                        <?php
                    }
                }
                // print_r($errors);
            }        
        ?>
        <div class="container">
        <div class="panel-body">
            <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>Upload Challege</legend>
                <div class="form-group">
                    <label for="">Người Tạo Challege</label>
                    <input type="text" class="form-control" id="" placeholder="Tên Challege" value="<?php echo $m ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên Challege</label>
                    <input type="text" class="form-control" id="" placeholder="Tên Challege" name="tenbai">
                </div>
                <div class="form-group">
                    <label for="">Hint</label>
                    <input type="text" class="form-control" id="" placeholder="Hint" name="hint">
                </div>
                <div class="form-group">
                    <label for="">File Bài Tập</label>
                    <input type="file" class="form-control" id="" placeholder="Input field" name="filename">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
        </div>
        <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Danh Sách Challege
				<!-- <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form> -->
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="160px">Người Tạo Challege</th>
                            <th width="160px">Tên Challege</th>
							<th width="400px">Hint</th>
							<th>File Bài Tập</th>
                            <!-- <th>Trả lời</th> -->
                            <!-- <th>Email</th>
							<th>SĐT</th>
							<th>Avatar</th> -->
							<!-- <th width="60px"></th> -->
                            <!-- <th width="60px"></th> -->
						</tr>
					</thead>
					<tbody>
<?php
    // $file = $_FILES['filename'];
	// $name = $file['name'];
	// echo $name;
	// die();
    $sql = 'select * from challege';
    $studentList = executeResult($sql);
    $index = 1;
    foreach ($studentList as $std) {
        echo '<tr>
                <td>'.$std['creator'].'</td>
                <td>'.$std['title'].'</td>
                <td>'.$std['hint'].'</td>
                <td>'.$std['url'].'</td>
               
            </tr>';
    }
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>