<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CinePen</title>
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
                height: 400px;
                border: 1px solid #0B304D;
            }
            .hero-movie {
                position: absolute;
                bottom: 0;
                margin: 40px 100px;
                display: flex;
            }
            .poster img {
                width: 180px;
                border-radius: 10px;
            }
            .movie-info {
                display: flex;
                flex-direction: column;
                margin: auto 20px 0;
            }
            .mv-info {
                display: flex;
            }
            .mv-title {
                font-size: x-large;
                font-weight: bold;
            }
            .mv-engtitle {
                color: #999;
                margin: 12px 10px 16px;
            }
            .mv-etc {
                width: 400px;
                height: 50px;
                color: #777;
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
            .myRv-w, .avgRt-w, .myRt-w {
                margin-bottom: 5px;
            }
            .myRv-f, .avgRt-f, .myRt-f {
                font-size: 28px;
            }

            /* review */
            .rv {
                margin-top: 60px;
            }
            .rv-tt {
                font-size: x-large;
                font-weight: bold;
            }
            .review {
                display: flex;
                flex-direction: column;
                padding: 20px;
                border: 1px solid black;
                border-radius: 10px;
            }
            .rv-user {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto 10px 10px;
            }
            .pf-img {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background-image: url('images/default.jpg');
                background-position: center;
                background-size: cover;
                margin-top: auto;
            }
            .pf-body {
                display: flex;
                flex-direction: column;
                margin: 20px;
            }
            .pf-user {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .pf-name {
                font-size: x-large;
                font-weight: bold;
                margin: 12px 8px 10px 20px;
            }
            .pf-id {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .at, .userid {
                color: #999;
                margin: 12px 0 auto;
                font-size: small;
            }
            .rv-title {
                width: 100%;
                height: 50px;
                margin: 10px 0;
                padding: 10px;
                border: 1px solid black;
                border-radius: 5px;
            }
            .rv-content {
                width: 100%;
                height: 400px;
                margin: 10px 0;
                resize: none;
                padding: 10px;
                border: 1px solid black;
                border-radius: 5px;
            }
            .submit {
                margin: 10px 0;
                width: 100%;
                height: 40px;
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
        </style>
    </head>
    <body>
        <?php
        $signin = false;
        if(isset($_SESSION['email'])) {
            $signin = true;
        }
        ?>
        
        <!-- navbar -->
        <nav class="navbar">
            <p class="logo"><a href="main.php">CinePen</a></p>
            <input id="search" type="text" name="search" placeholder="검색어를 입력해주세요.">
            <div class="register">
                <?php
                if($signin) { ?>
                <div class="menu" style="float: right;">
                    <a class="nav-pf" href=""><img src="images/default.jpg"></a>
                    <div class="menu-content">
                        <a href="profile.php">Profile</a>
                        <a href="signmodify.php">Setting</a>
                        <a href="signout.php">Sign out</a>
                    </div>
                </div>
                <?php } else { ?>
                <button onclick="location.href='signin.html'">Sign in</button>
                <button onclick="location.href='signup.html'">Sign up</button>
                <?php } ?>
            </div>
        </nav>

        <?php
        include_once('dbconn.php');

        $movieId = $_GET['id'];
        $sql = "select * from movieinfo where id = '$movieId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row['title'];
            $engtitle = $row['engtitle'];
            $poster = $row['poster'];
            $releaseDate = $row['release_date'];
            $genre = $row['genre'];
            $country = $row['country'];
            $runtime = $row['runtime'];
        ?>

        <!-- hero -->
        <div class="hero">
            <div class="hero-movie">
                <div class="poster">
                    <img src="<?= $poster ?>">
                </div>
                <div class="movie-info">
                    <div class="mv-info">
                        <p class="mv-title"><?= $title ?></p>
                        <div class="mv-engtitle"><?= $engtitle ?></div>
                    </div>
                    <div class="mv-etc">
                        <?= $releaseDate ?> &bull;
                        <?= $genre ?> &bull;
                        <?= $runtime ?> &bull;
                        <?= $country ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        } else {
            echo '해당 영화를 찾을 수 없습니다.';
        }
        ?>

        <!-- button -->
        <?php
        $rvcount = $row['rv_count'];
        $avgrating = $row['avg_rating'];
        ?>

        <div class="pf-btns">
            <div class="avgRating">
                <p class="avgRt-w">평균 별점</p>
                <p class="avgRt-f">⭐<?= $avgrating ?></p>
            </div>
            <div class="myRating">
                <p class="myRt-w">내 별점</p>
                <p class="myRt-f">132</p>
            </div>
            <div class="mvReview">
                <p class="myRv-w">남긴 리뷰 수</p>
                <p class="myRv-f"><?= $rvcount ?></p>
            </div>
        </div>

        <!-- review -->
        <div class="rv">
            <form action="moviedetailsproc.php" method="post">
                <p class="rv-tt">리뷰 작성</p>
                <div class="review">
                    <?php
                    $email = $_SESSION['email'];
                    $usersql = "select * from member where email = '$email'";
                    $result = $conn->query($usersql);
                    if($result->num_rows > 0) {
                        $row = $result->fetch_row();
                    }
                    ?>
                    <div class="rv-user">
                        <div class="pf-img"></div>
                        <p class="pf-name"><?= $row[3] ?></p>
                        <div class="pf-id">
                            <div class="at">&#64;</div>
                            <p class="userid"><?= !empty($row[1]) ? $row[1] : 'ID를 입력해 주세요.'; ?></p>
                        </div>
                    </div>

                    <!-- moviedetails.php -->
                    <?php
                    $email = $_SESSION['email'];
                    $reviewsql = "select * from reviews where user_email = '$email'";
                    $result = $conn->query($reviewsql);
                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        // var_dump($row);
                        $rvtitle = $row['rv_title'];
                        $rvcontent = $row['rv_content'];
                        $userEmail = $row['user_email'];
                        $movieId = $row['movie_id'];
                        $id = $row['id'];
                    }
                    else {
                        $rvtitle = '';
                        $rvcontent = '';
                    }
                    ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="movie_id" value="<?= $movieId ?>">
                    <input type="hidden" name="user_email" value="<?= $userEmail ?>">
                    <input type="text" class="rv-title" name="rv_title" value="<?= $rvtitle ?>" placeholder="제목을 입력하세요.">
                    <textarea class="rv-content" name="rv_content" placeholder="내용을 입력하세요."><?= $rvcontent ?></textarea>
                    <input class="submit" type="submit" value="저장">
                </div>
            </form>
        </div>
        <?php
        $result->close();
        $conn->close();
        ?>
    </body>
</html>