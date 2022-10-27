<?php require_once '../check.php' ?>
<?php require_once '../dbhelp.php' ?>
<?php 
$k = $_SESSION['user'];
$m = $k['username'];
if(isset($_POST['check'])){
    //var_dump($_FILES);
    if($_FILES['image']['error'] == 0){
        $file = $_FILES['image'];
        $img = $file['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/'.$_FILES['image']['name']);
        $sql = "UPDATE `student` SET `image`='$img' WHERE `username` = '$m'";
        execute($sql);
        header('Location: /challenge5a_daohx/index.php');
        // var_dump($query);
    }
    else{
        echo "Fails";
    }
}
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upload Avatar</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>  
    <?php require_once 'header.php'?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-info">
                          <!-- <div class="panel-heading">
                                <h3 class="panel-title">Panel title</h3>
                          </div> -->
                          <div class="panel-body">
                                <form action="" method="POST" role="form" enctype="multipart/form-data">
                                    <legend>Upload Avatar</legend>
                                    <div class="form-group">
                                        <label for="">Xác Nhận (Nhập 1 ký tự bất kỳ)</label>
                                        <input type="text" class="form-control" id="" placeholder="Input field" name="check">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Avatar</label>
                                        <input type="file" class="form-control" id="" placeholder="Input field" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
                          </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
