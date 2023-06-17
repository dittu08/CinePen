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
            #search {
                position: absolute;
                float: right;
                right: 200px;
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
                flex-direction: column;
            }
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
            <p class="logo"><a href="">CinePen</a></p>
            <input id="search" type="text" name="search" placeholder="검색어를 입력해주세요.">
            <div class="register">
                <div class="menu" style="float: right;">
                    <a class="nav-pf" href=""><img src="images/grogu.jpg"></a>
                    <div class="menu-content">
                        <a href="profile.html">Profile</a>
                        <a href="signmodify.php">Setting</a>
                        <a href="signout.php">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- profile edit -->
        <div class="pf-edit">
            <div class="pf-img">
                <img src="images/grogu.jpg">
            </div>
            <div class="contents">
                <div class="title">
                    <h3>회원 정보 수정</h3>
                    <input type="submit" value="저장">
                </div>
                <div class="container">
                    <form action="signmodproc.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">이름</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="uname" value="<?= $row[1] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">한 줄 소개</label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="uinfo" value="<?= $row[1] ?>">
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
                                <input type="text" name="uid" value="<?= $row[1] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">비밀번호</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="pwd" value="<?= $row[2] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">비밀번호 확인</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="pwd" value="<?= $row[2] ?>">
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
        </script>
    </body>
</html>