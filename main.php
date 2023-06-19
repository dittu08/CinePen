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

            /* boxoffice */
            .card-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .card-link {
                text-decoration: none;
                color: black;
            }
            .card {
                width: 12rem;
                height: 22rem;
                margin: 20px;
                position: relative;
            }
            .card:hover {
                background-color: rgba(0, 0, 0, 0.5);
                color: black;
            }
            .card-img {
                position: relative;
                overflow: hidden;
            }
            .card-img-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.09) 35%, rgba(0, 0, 0, 0.85));
            }
            .card-img-top {
                display: block;
            }
            .card-rank{
                position: absolute;
                bottom: 45px;
                right: 5px;
                margin: 0;
                font-size: 90px;
                font-weight: bold;
                color: white;
            }
            .card-text {
                font-weight: bold;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                margin: 0;
            }
            .card-date {
                font-size: small;
                font-weight: lighter;
                margin: 0;
            }
            .card-text a, .card-date a {
                text-decoration: none;
            }
            
            /* reviews */
            .trending {
                margin-top: 30px;
                margin-left: 20px;
                font-weight: bold;
            }
            .card {
                width: 12rem;
                height: 22rem;
                margin: 20px;
                position: relative;
            }
            .re-card-content {
                height: 260px;
                width: 300px;
                padding-top: 20px;
                padding-left: 25px;
                overflow: hidden;
            }
            .re-card.text {
                text-overflow: ellipsis;
            }
            .re-card-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 260px;
                background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 5%, rgba(255, 255, 255, 0.5) 20%, rgba(255, 255, 255, 0) 100%);;
            }
            .re-card-pf {
                position: absolute;
                bottom: 0;
                right: 0;
                height: 200px;
                padding: 20px;
                text-align: right;
            }
            .re-card-profile {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                overflow: hidden;
                margin: 10px;
                margin-bottom: 5px;
            }
            .re-card-profile img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .re-name {
                font-size: larger;
                margin: 0;
                padding-right: 20px;
            }
            .re-id {
                font-size: smaller;
                font-weight: lighter;
                margin: 0;
                padding-right: 20px;
            }
            .re-card-body {
                position: absolute;
                bottom: 0;
                width: 70%;
                height: 100px;
                display: flex;
                flex-direction: column;
            }
            .re-card-movietitle {
                font-size: 22px;
                font-weight: bold;
                margin: 20px;
                margin-top: 10px;
                flex: 1;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .re-card-like {
                font-size: smaller;
                margin: 20px;
                margin-top: 0;
                height: 20px;
            }

            /* random movies */
            .randommovies {
                margin-top: 30px;
                margin-left: 20px;
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
        
        <!-- box office -->
        <div class="card-container">
            <?php
            include_once('dbconn.php');
            $sql = "select * from movieinfo";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($count >= 10) {
                        break; // 10개의 카드만 생성하고 루프를 종료합니다.
                    }
                    
                    $movieId = $row['id'];
                    $boxoffice = $row['boxoffice'];
                    $title = $row['title'];
                    $poster = $row['poster'];
                    $date = $row['release_date'];
                    
                    echo '<a href="moviedetails.php?id=' . $movieId . '" class="card-link">';
                    echo '<div class="card">';
                    echo '<div class="card-img">';
                    echo '<img src="' . $poster . '" class="card-img-top" alt="">';
                    echo '<div class="card-img-overlay"></div>';
                    echo '</div>';
                    echo '<p class="card-rank">' . $boxoffice . '</p>';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">' . $title . '</p>';
                    echo '<p class="card-date">' . $date . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    
                    $count++;
                }
            } else {
                echo "조회된 결과가 없습니다.";
            }
            ?>
        </div>

        <!-- reviews -->
        <h3 class="trending">Trending Now</h3>
        <div class="card" style="width: 25rem;">
            <div class="re-card-content">
                <p class="re-card-title">가디언즈 오브 갤럭시3 리뷰</p>
                <p class="re-card-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <div class="re-card-overlay"></div>
            <div class="re-card-pf">
                <div class="re-card-profile">
                    <img src="images/grogu.jpg" alt="">
                </div>
                <p class="re-name">User123</p>
                <p class="re-id">@user123123</p>
            </div>
            <div class="re-card-body">
              <p class="re-card-movietitle">가디언즈 오브 갤럭시: Volume 3</p>
              <p class="re-card-like">좋아요 1  &nbsp;|  &nbsp;댓글 3</p>
            </div>
        </div>


        <script>
            
          </script>
    </body>
</html>
