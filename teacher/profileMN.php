<?php require_once '../check.php' ?>
<?php
require_once ('../dbhelp.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách Người Dùng</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
    }

    .title {
    color: black;
    font-size: 18px;
    }

    button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    }

    a {
    text-decoration: none;
    font-size: 14px;
    color: black;
    }

    button:hover, a:hover {
    opacity: 0.7;
    }
    </style>
</head>
<body>
	<?php require_once 'header.php'?>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // echo $id;
        $sql = "SELECT * FROM `student` WHERE `id`='$id'";
        $studentList = executeResult($sql);
        foreach ($studentList as $std) {
            $fullname = $std['fullname'];
            $email = $std['email'];
            $sdt = $std['sđt'];
            $image = $std['image'];
        }
    }
    ?>
    
    <h2 style="text-align:center">User Profile Card</h2>
        <div class="card">
        <img src="../upload/<?php echo $image?>" alt="John" style="width:100%">
        <h1><p class="title"><?php echo $fullname?></p></h1>
        <h1><p class="title">Email: <?php echo $email ?></p></h1>
        <h1><p class="title">SĐT: <?php echo $sdt ?></p></h1>
        <?php
        echo '<td><button class="btn btn-warning" onclick=\'window.open("chat.php?id='.$std['username'].'","_self")\'>Chat</button></td></tr>'
        ?>
    </div>
	<!-- </div> -->
</body>
</html>

<!-- <td>'.$std['email'].'</td>
<td>'.$std['sđt'].'</td>
<td><img src="../upload/'.$std['image'].'" alt="" width="70px"></td> -->