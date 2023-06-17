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
            body {
                width: 1240px;
            }
            .navbar {
                background-color: #0B304D;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 3px;
                height: 55px;
            }
            .logo a {
                color: #FFF0E3;
                text-decoration: none;
                font-size: x-large;
                font-weight: bold;
                margin-left: 20px;
            }
            #search {
                margin-top: 10px;
                margin-right: 20px;
            }
            .register {
                list-style-type: none;
                display: flex;
                margin-right: 0;
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

            /* profile edit */
            .pf-img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                overflow: hidden;
            }
            .pf-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    </head>
    <body>

        <?php
        session_start();
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
            <div class="logo">
                <a href="">Movie Reviews</a>
            </div>
            <ul class="register">
                <li id="search"><input type="text" name="search" placeholder="검색어를 입력해주세요."></li>
                <li><button>Sign in</button></li>
                <li><button>Sign up</button></li>
            </ul>
        </nav>

        <!-- profile edit -->
        <div class="container">
            <form action="signmodproc.php" method="post">
                <!-- <div class="pf-img">
                    <img src="images/grogu.jpg">
                </div>
                <h3 class="pf-edit">Profile Edit</h3>
                <button class="submit" type="submit" value="submit">저장</button>
                <div class="name">
                    <p>이름</p>
                    <input type="text" name="name" value="" id="name">
                </div>
                <div class="info">
                    <p>소개</p>
                    <input type="text" name="info" value="" id="info" placeholder="한 줄 소개를 입력하세요.">
                </div>
                <div class="email">
                    <p>이메일</p>
                    <input type="text" name="email" value="" id="email" readonly>
                </div>
                <div class="id">
                    <p>아이디</p>
                    <input type="text" name="id" value="" id="id">
                </div>
                <div class="pwd">
                    <p>비밀번호</p>
                    <input type="password" name="pwd" value="" id="pwd">
                </div>
                <div class="pwd-chk">
                    <p>비밀번호 확인</p>
                    <input type="password" name="pwd-chk" value="" id="pwd-chk">
                </div>
                <div class="cancel">
                    <p>계정 탈퇴</p>
                    <input type="submit" value="탈퇴하기">
                </div> -->
            </form>
        </div>
        
        <?php
        $result->close();
        $conn->close();
        ?>

        <script>
            function checkEmail() {
                const email = document.getElementById('email');
                const uid = email.value;
                if(email.value.length == 0) {
                alert("이메일을 입력하세요.");
                }
                else {
                    const xhs = new XMLHttpRequest();
                    xhs.onreadystatechange = function() {
                        if(xhs.readyState === xhs.DONE) {
                        if(xhs.status === 200) {
                            const result = JSON.parse(xhs.responseText);
                            if(result.succ === true) alert("이미 등록된 이메일입니다.");
                            else alert("사용 가능한 이메일입니다.");
                        }
                        }
                }
                xhs.open('GET', 'checkemail.php?uid='+uid);
                xhs.send();
                }
            }
        </script>
    </body>
</html>