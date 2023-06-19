<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Reviews - Profile</title>
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
                width: 355px;
                height: 40px;
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

            /* hero */
            .hero {
                position: relative;
                width: 100%;
                height: 350px;
                border: 1px solid #0B304D;
            }
            .hero-profile {
                position: absolute;
                bottom: 0;
                margin: 0 50px;
                display: flex;
            }
            .pf-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background-image: url('images/default.jpg');
                background-position: center;
                background-size: cover;
            }
            .pf-body {
                display: flex;
                flex-direction: column;
                margin: 20px;
            }
            .pf-user {
                display: flex;
            }
            .pf-name {
                font-size: x-large;
                font-weight: bold;
            }
            .pf-id {
                display: flex;
                margin-left: 10px;
            }
            .at, .userid {
                color: #999;
                margin: 12px 0 16px;
            }
            .pf-info {
                width: 400px;
                height: 50px;
            }

            /* buttons */
            .pf-btns {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
            .pf-btns div {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #0B304D;
                border-radius: 15px;
                color: #FFF0E3;
                width: 400px;
                height: 125px;
                margin-top: 30px;
            }
            .myRv-w, .mtRt-w, .myL-w {
                margin-bottom: 5px;
            }
            .myRv-f, .mtRt-f, .myL-f {
                font-size: 28px;
            }
            
            /* my reviews */
            .reviews {
                width: 100%;
                margin-top: 30px;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            .rv-container {
                width: 610px;
                border: 1px solid black;
                border-radius: 30px;
            }
            .rv-movie {
                margin: 20px 40px;
                font-size: x-large;
                font-weight: bold;
            }
            .rv-content {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
            }
            .rv-poster {
                width: 170px;
                margin-left: 40px;
                border-radius: 15px;
            }
            .rv-detail {
                width: 320px;
                margin: 20px;
                margin-top: auto;
            }
            .rv-title {
                font-size: larger;
                margin: 25px 0;
            }
            .rv-text {
                height: 150px;
                overflow: hidden;
                margin: 0;
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
            <input id="search" type="text" name="search" placeholder="검색어를 입력해주세요.">
            <div class="register">
                <div class="menu" style="float: right;">
                    <a class="nav-pf" href=""><img src="images/default.jpg"></a>
                    <div class="menu-content">
                        <a href="profile.php">Profile</a>
                        <a href="signmodify.php">Setting</a>
                        <a href="signout.php">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- hero -->
        <div class="hero">
            <div class="hero-profile">
                <div class="pf-img"></div>
                <div class="pf-body">
                    <div class="pf-user">
                        <p class="pf-name"><?= $row[3] ?></p>
                        <div class="pf-id">
                            <div class="at">&#64;</div>
                            <p class="userid"><?= !empty($row[1]) ? $row[1] : '아이디를 입력해 주세요.'; ?></p>
                        </div>
                    </div>
                    <p class="pf-info"><?= !empty($row[4]) ? $row[4] : '한 줄 소개를 입력해 주세요.'; ?></p>
                </div>
            </div>
        </div>

        <!-- button -->
        <div class="pf-btns">
            <div class="myReview">
                <p class="myRv-w">남긴 리뷰 수</p>
                <p class="myRv-f"><?= $row[5] ?></p>
            </div>
            <div class="myRating">
                <p class="mtRt-w">평균 별점</p>
                <p class="mtRt-f">⭐<?= $row[6] ?></p>
            </div>
            <div class="myLike">
                <p class="myL-w">보고 싶어요</p>
                <p class="myL-f"><?= $row[7] ?></p>
            </div>
        </div>

        <!-- my reviews -->
        <div class="reviews">
            <div class="rv-container">
                <p class="rv-movie">가디언즈 오브 갤럭시: Volume 3</p>
                <div class="rv-content">
                    <img class="rv-poster" src="images/johnwick4.jpg">
                    <div class="rv-detail">
                        <p class="rv-title">What is Lorem Ipsum?</p>
                        <p class="rv-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="rv-container">
                <p class="rv-movie">가디언즈 오브 갤럭시: Volume 3</p>
                <div class="rv-content">
                    <img class="rv-poster" src="images/johnwick4.jpg">
                    <div class="rv-detail">
                        <p class="rv-title">What is Lorem Ipsum?</p>
                        <p class="rv-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="rv-container">
                <p class="rv-movie">가디언즈 오브 갤럭시: Volume 3</p>
                <div class="rv-content">
                    <img class="rv-poster" src="images/johnwick4.jpg">
                    <div class="rv-detail">
                        <p class="rv-title">What is Lorem Ipsum?</p>
                        <p class="rv-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="rv-container">
                <p class="rv-movie">가디언즈 오브 갤럭시: Volume 3</p>
                <div class="rv-content">
                    <img class="rv-poster" src="images/johnwick4.jpg">
                    <div class="rv-detail">
                        <p class="rv-title">What is Lorem Ipsum?</p>
                        <p class="rv-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>

         <!-- footer (bootstrap) -->
         <footer class="py-3 my-4">
            <hr>
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2023 Daejin University</p>
        </footer>

        <script></script>
    </body>
</html>