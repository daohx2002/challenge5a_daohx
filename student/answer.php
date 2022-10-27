<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upload Bài Tập</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <?php require_once 'header.php' ?>
        <?php require_once '../dbhelp.php' ?>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            // session_start(); 
            $k = $_SESSION['user'];
            // $m = $k['username'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // echo $_POST['id'];
                // die();
                $user = $k['username'];
                $ten = $_POST['tenbai'];
                $errors = [];
                $file = $_FILES['filename'];
                $size_allow = 10; //file upload tối đa là 10MB
                //ĐỔi tên file trước khi upload
                // print_r($file);
               
                $filename = $file['name'];
                $filename = explode('.', $filename);
                $ext = end($filename);
                $new_file = md5(uniqid()).'.'.$ext;

                $check = "UPDATE `upload` SET `answer`='Đã Nộp' WHERE `ten_bai` = '$id'";
                execute($check);

                //Kiểm tra định dạng
                $allow_ext = ['png', 'jpg', 'jpeg', 'ppt','pptx', 'doc', 'docx'];
                if(in_array($ext, $allow_ext)){
                    $size = $file['size']/1024/1024; //đổi từ byte => MB
                    // echo $size;
                    if($size<=$size_allow){
                        $upload = move_uploaded_file($file['tmp_name'], '../answer/'.$new_file);
                        $sql = "SELECT * FROM `answer` WHERE `ten_bai`= '$id' AND `username`='$user'";
                        $conn = mysqli_connect('localhost', 'root', '', 'db1656');
                        $query = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($query) == 0){
                            $sql1 = "INSERT INTO `answer`(`ten_bai`, `username`, `answer`) VALUES ('$id','$user','$new_file')";
                            execute($sql1);
                            // echo "KHONG";
                        }
                        else{
                            $sql1 = "UPDATE `answer` SET `answer`='$new_file' WHERE `ten_bai`='$id' AND `username`='$user'";
                            execute($sql1);
                        }
                        // var_dump($query);
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
                            <div class="alart">
                                <?php echo $mess ?>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="alert">
                            Upload câu trả lời thành công !!!
                        </div>
                        <?php
                    }
                }
                // print_r($errors);
            }        
        ?>

        <div class="panel-body">
            <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>Upload Câu Trả Lời</legend>
            <?php
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            ?>
                <div class="form-group">
                    <label for="">Tên Bài</label>
                    <input type="text" class="form-control" id="" placeholder="Input field" name="tenbai" value="<?php echo $id ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Sinh Viên Nộp Bài</label>
                    <input type="text" class="form-control" id="" placeholder="Input field" name="tenbai" value="<?php echo $k['username'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">File Câu Trả Lời</label>
                    <input type="file" class="form-control" id="" placeholder="Input field" name="filename">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
