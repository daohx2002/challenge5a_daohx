<?php require_once '../dbhelp.php' ?>
<?php require_once '../check.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: white;
        } */
        /* .navbar navbar-inverse{
            display: none;
        } */
        .aa {
            display: flex;
            flex-wrap: wrap;
            align-items: center;

            /* justify-content: center; */
            flex-direction: column;
        }
        ::-webkit-scrollbar {
            width: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #4c4c6a;
            border-radius: 2px;
        }
        .chatbox {
            width: 500px;
            height: 600px;
            max-height: 800px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 0 4px rgba(0,0,0,.14),0 4px 8px rgba(0,0,0,.28);
        }
        .chat-window {
            flex: auto;
            max-height: calc(100% - 60px);
            background: #2f323b;
            overflow: auto;
        }
        .chat-input {
            flex: 0 0 auto;
            height: 60px;
            background: #40434e;
            border-top: 1px solid #2671ff;
            box-shadow: 0 0 4px rgba(0,0,0,.14),0 4px 8px rgba(0,0,0,.28);
        }
        .chat-input input {
            height: 59px;
            line-height: 60px;
            outline: 0 none;
            border: none;
            width: calc(100% - 60px);
            color: white;
            text-indent: 10px;
            font-size: 12pt;
            padding: 0;
            background: #40434e;
        }
        .chat-input button {
            float: right;
            outline: 0 none;
            border: none;
            background: rgba(255,255,255,.25);
            height: 40px;
            width: 40px;
            border-radius: 50%;
            padding: 2px 0 0 0;
            margin: 10px;
            transition: all 0.15s ease-in-out;
        }
        .chat-input input[good] + button {
            box-shadow: 0 0 2px rgba(0,0,0,.12),0 2px 4px rgba(0,0,0,.24);
            background: #2671ff;
        }
        .chat-input input[good] + button:hover {
            box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }
        .chat-input input[good] + button path {
            fill: white;
        }
        .msg-container {
            position: relative;
            display: inline-block;
            width: 100%;
            margin: 0 0 10px 0;
            padding: 0;
        }
        .msg-box {
            display: flex;
            background: #5b5e6c;
            padding: 10px 10px 0 10px;
            border-radius: 0 6px 6px 0;
            max-width: 80%;
            width: auto;
            float: left;
            box-shadow: 0 0 2px rgba(0,0,0,.12),0 2px 4px rgba(0,0,0,.24);
        }
        .user-img {
            display: inline-block;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #2671ff;
            margin: 0 10px 10px 0;
        }
        .flr {
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            width: calc(100% - 50px);
        }
        .messages {
            flex: 1 0 auto;
        }
        .msg {
            display: inline-block;
            font-size: 11pt;
            line-height: 13pt;
            color: rgba(255,255,255,.7);
            margin: 0 0 4px 0;
        }
        .msg:first-of-type {
            margin-top: 8px;
        }
        .timestamp {
            color: rgba(0,0,0,.38);
            font-size: 8pt;
            margin-bottom: 10px;
        }
        .username {
            margin-right: 3px;
        }
        /* .posttime {
            margin-left: 3px;
        } */
        .msg-self .msg-box {
            border-radius: 6px 0 0 6px;
            background: #2671ff;
            float: right;
        }
        .msg-self .user-img {
            margin: 0 0 10px 10px;
        }
        .msg-self .msg {
            text-align: right;
        }
        .msg-self .timestamp {
            text-align: right;
        }
        a {
        text-decoration: none;
        font-size: 14px;
        color: black;
        }


    </style>
</head>
<?php require_once 'header.php'?>
<body>

    <?php
    $user = $_SESSION['user'];
    $ng = $user['username'];
    if(isset($_GET['id'])){
        $nn = $_GET['id'];
    }
    if(isset($_POST['gui'])){
        $nd = $_POST["value"];
        $sql = "INSERT INTO `chat`(`nguoi_gui`, `nguoi_nhan`, `noi_dung`) VALUES ('$ng','$nn','$nd')";
        execute($sql);
    }
    ?>
<div class= "aa">
    <section class="chatbox">
        <section class="chat-window">
        <?php
        $sql1 = "SELECT * FROM `chat`,`student` WHERE ((`nguoi_gui`='$ng' AND `chat`.`nguoi_nhan`=`student`.`username`) OR (`nguoi_gui`='$nn' AND `chat`.`nguoi_gui`=`student`.`username`));"; 
        // $sql1 = "SELECT * FROM `chat`";
        $studentList = executeResult($sql1);
        // var_dump($studentList);
        // die();
        // $sql2 = "SELECT * FROM "
        // var_dump($studentList);
        // var_dump($studentList);
        $index = 1;
        foreach ($studentList as $std){
            if($std['nguoi_gui'] == $nn && $std['nguoi_nhan'] == $ng){
                echo '
                <article class="msg-container msg-remote" id="msg-0">
                    <div class="msg-box">
                        <img class="user-img" id="user-0" src="../upload/'.$std['image'].'"  />
                        <div class="flr">
                            <div class="messages">
                                <p class="msg" id="msg-0">
                                    '.$std['noi_dung'].'
                                </p>
                            </div>
                            <span class="timestamp"><span class="username">'.$std['nguoi_gui'].'</span>
                        </div>
                    </div>
                </article>';
            }
            if($std['nguoi_gui'] == $ng && $std['nguoi_nhan'] == $nn){
                echo '
                <article class="msg-container msg-self" id="msg-0">
                    <div class="msg-box">
                        <div class="flr">
                            <div class="messages">
                                <p class="msg" id="msg-2">
                                    '.$std['noi_dung'].'
                                </p>
                            </div>
                            <span class="timestamp">
                                <span class="username">'.$std['nguoi_gui'].'</span>&bull;
                                <span class="posttime">
                                    <a class="timestamp" href="../teacher/delete_chat.php?id='.$std['noi_dung'].' & a='.$nn.'">Xóa</a>
                                </span>&bull;
                                <span class="posttime">
                                    <a class="timestamp" href="../teacher/edit_chat.php?id='.$std['noi_dung'].' &a='.$nn.'">Sửa</a>
                                </span>
                            </span>
                        </div>
                        <img class="user-img" id="user-0" src="../upload/'.$std['image'].'" />
                    </div>
                </article>';
            }

        }
        ?>
        </section>
            <form method="POST" class="chat-input">
                <input type="text" autocomplete="on" placeholder="Type a message" name="value"/>
                <button type="submit" class="active" name="gui">
                    Gửi
                </button>
            </form>
    </section>
</div>
    <!-- <a class="timestamp" href="../student/delete_chat.php?id='.$std['noi_dung'].'">Xoa</a> -->
</body>
</html>