
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['user'])){
            session_destroy();
            session_unset();
        }
        if(isset($_POST['dangnhap'])){
            // session_start();
            $username = $_POST['user'];
            $password = $_POST['pass'];
            // Truy vấn dữ liệu - tìm xem User, Pass nhận được có trong csdl k
            $sql = "SELECT * FROM student Where username = '$username' AND password ='$password'"; 
            // Thực thi truy vấn 
            $conn = mysqli_connect('localhost', 'root', '', 'db1656');
            $username = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($username);
            // Đếm số dòng của kết quả trả về
            $_SESSION['user'] = $data;
            $k = $_SESSION['user'];
            if(mysqli_num_rows($username) > 0 && $k['type'] == 'teacher'){
                header('Location: /challenge5a_daohx/teacher/index.php');
            }
            else if(mysqli_num_rows($username) > 0){
                header('Location: /challenge5a_daohx/student/index.php');
            }
            else{
                header('Location: /challenge5a_daohx/index.php');
            } 
        }
    ?>
    <div class="container">
        <form method="POST" action="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user">Tên Đăng Nhập</label>
                                    <input name="user" class="form-control" placeholder="Tên Đăng Nhập">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Mật Khẩu</label>
                                    <input name="pass" type = "password" class="form-control" placeholder="Mật Khẩu">
                                </div>
                                <button type="submit" class="active" name="dangnhap">Đăng Nhập</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>      
        </form>
    </div>
    
</body>
</html>

