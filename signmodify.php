<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Reviews</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable=yes>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                width: 1240px;
                margin: 0 auto;
            }

            /* navbar */
            .navbar {
                background-color: #0B304D;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 3px;
                height: 55px;
            }
            .logo {
                position: absolute;
                margin: 10px;
            }
            .logo a {
                color: #FFF0E3;
                text-decoration: none;
                font-size: x-large;
                font-weight: bold;
                padding-left: 10px;
            }
            .register {
                list-style-type: none;
                display: flex;
                margin-left: auto;
                flex-wrap: wrap;
                white-space: nowrap;
            }
            .register button {
                background-color: #0B304D;
                color: #FFF0E3;
                text-decoration: none;
                padding: 5px 8px;
                margin: 5px;
                border: 1px solid #FFF0E3;
                border-radius: 5px;
            }
            .register button:hover {
                background-color: #FFF0E3;
                color: #0B304D;
                border-radius: 5px;
            }
            .menu {
                position: relative;
                display: inline-flex;
                flex-direction: column;
                align-items: flex-end;
                margin-left: auto;
            }
            .nav-pf {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                overflow: hidden;
                margin: 3px;
                margin-right: 20px;
            }
            .nav-pf img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .menu-content {
                display: none;
                background-color: #0B304D;
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 10;
            }
            .menu-content a {
                display: block;
                color: #FFF0E3;
                padding: 12px 16px;
                text-decoration: none;
            }
            .menu:hover .menu-content {
                display: block;
            }
            .menu-content a:hover {
                background-color: #FFF0E3;
                color: #0B304D;
            }

            /* profile edit */
            .pf-edit {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 100px;
            }
            .pf {
                margin-bottom: auto;
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .pf-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background-image: url('images/default.jpg');
                background-position: center;
                background-size: cover;
            }
            .del {
                margin: 20px;
            }
            #modalbtn {
                width: 70px;
                height: 38px;
                color: #0B304D;
                background-color: #FF5E4C;
                border: 1px solid #FF5E4C;
                border-radius: 50px;
            }
            #modalbtn:hover {
                color: #FFF0E3;
                background-color: #ec5040;
                border: 1px solid #ec5040;
            }
            .contents {
                margin-left: 60px;
            }
            .title {
                display: flex;
                padding: 10px;
                justify-content: space-between;
            }
            h3 {
                font-weight: bold;
                text-align: center;
            }
            .container {
                color: #0B304D;
                padding-left: 10px;
                display: flex;
                justify-content: center;
                text-align: center;
            }
            .row {
                padding: 10px;
                width: 400px;
            }
            .col-25 {
                text-align: left;
                margin-bottom: 5px;
            }
            input {
                width: 355px;
                height: 40px;
                border: 1px solid #0B304D;
                border-radius: 5px;
                padding: 2px 13px;
            }
            span {
                color: #999;
            }
            textarea {
                width: 355px;
                height: 80px;
                max-height: auto;
                border: 1px solid #0B304D;
                border-radius: 5px;
                padding: 5px 13px;
                overflow: hidden;
                resize: none;
            }
            .col-id {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .at {
                font-size: 25px;
                padding-right: 7px;
                padding-bottom: 7px;
                color: #999;
            }
            .sbm {
                text-align: left;
                margin-top: 30px;
            }
            .submit {
                width: 70px;
                height: 38px;
                color: #0B304D;
                background-color: #F38011;
                border: 1px solid #F38011;
                border-radius: 50px;
            }
            .submit:hover {
                color: #FFF0E3;
                background-color: #d46800;
                border: 1px solid #bc5300;
            }

            /* delete modal */
            .del-md {
                display: none;
                position: fixed;
                z-index: 1000;
                padding-top:100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.2);
            }
            .md-content {
                background-color: white;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 40px;
                border: 1px solid #888;
                width: 400px;
                height: auto;
                border-radius: 10px;
            }
            .del-p {
                font-size: larger;
                font-weight: bold;
            }
            .md-btns {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .md-close {
                margin: 5px;
                font-size: large;
                color: #0B304D;
                background-color: #f3f3f3;
                border: 1px solid #f3f3f3;
                border-radius: 5px;
                width: 350px;
                height: 50px;
            }
            .md-close:hover {
                background-color: #e7e7e7;
                border: 1px solid #e7e7e7;
            }
            .md-del {
                margin: 5px;
                font-size: large;
                color: #FFF0E3;
                background-color: #FF5E4C;
                border: 1px solid #FF5E4C;
                border-radius: 5px;
                width: 350px;
                height: 50px;
            }
            .md-del:hover {
                background-color: #ec5040;
                border: 1px solid #ec5040;
            }
        </style>
    </head>
    <body>
        <?php
        include_once('dbconn.php');
        $email = $_SESSION['email'];
        $sql = "select * from member where email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
        }
        ?>

        <!-- navbar -->
        <nav class="navbar">
            <p class="logo"><a href="main.php">CinePen</a></p>
            <div class="register">
                <div class="menu" style="float: right;">
                    <a class="nav-pf" href=""><img src="images/default.jpg"></a>
                    <div class="menu-content">
                        <a href="signmodify.php">Setting</a>
                        <a href="signout.php">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- profile edit -->
        <div class="pf-edit">
            <div class="pf">
                <div class="pf-img"></div>
                <div class="del">
                    <button id="modalbtn">탈퇴</button>
                    <div id="delmodal" class="del-md">
                        <div class="md-content">
                            <p class="del-p">정말 탈퇴하시겠습니까?</p>
                            <div class="md-btns">
                                <button class="md-close">아니요</button>
                                <button class="md-del" onclick="location.href = 'signdel.php'">예, 탈퇴하겠습니다</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contents">
                <div class="title">
                    <h3>회원 정보 수정</h3>
                </div>
                <div class="container">
                    <form action="signmodproc.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">이름</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="uname" value="<?= $row[3] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">한 줄 소개</label>
                                <span id="charCount">0/50</span>
                            </div>
                            <div class="col-75">
                            <textarea type="text" name="uinfo" id="uinfo-input" maxlength="50" placeholder="한 줄 소개를 입력해 주세요."><?= $row[4] ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">이메일</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="email" value="<?= $row[0] ?>" id="email" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">아이디</label>
                            </div>
                            <div class="col-75">
                                <div class="col-id">
                                    <div class="at">&#64;</div>
                                    <input type="text" name="uid" value="<?= $row[1] ?>" placeholder="아이디를 입력해 주세요.">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">비밀번호</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="pwd" value="<?= $row[2] ?>" id="pwd">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">비밀번호 확인</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="chkpwd" value="<?= $row[2] ?>" id="cfpwd">
                            </div>
                            <div class="sbm">
                                <input class="submit" type="submit" value="저장">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php
        $result->close();
        $conn->close();
        ?>

        <script>
            // info character count
            const uinfoInput = document.getElementById('uinfo-input');
            const characterCount = document.getElementById('charCount');

            uinfoInput.addEventListener('input', function() {
                const inputText = uinfoInput.value;
                const textLength = inputText.length;
                characterCount.textContent = textLength + '/50';

                if(currentLength > 50) {
                    input.value = input.value.slice(0, 50);
                }
            });

            // password check
            function checkPassword() {
                var pwd = document.getElementById('pwd').value;
                var chkpwd = document.getElementById('cfpwd').value;
                if(pwd !== cfpwd) {
                alert("비밀번호가 일치하지 않습니다.");
                return false;
                }
                else return true;
            }

            // delete
            var modal = document.getElementById("delmodal");
            var btn = document.getElementById("modalbtn");
            var close = document.getElementsByClassName("md-close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            close.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>