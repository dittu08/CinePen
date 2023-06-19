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
            h3 {
                margin-top: 30px;
                margin-left: 20px;
                font-weight: bold;
            }
            .card-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .card-link {
                text-decoration: none;
                color: black;
            }
            .card-link:hover {
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
            .review-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .review-container .card {
                width: 370px;
                height: 300px;
                margin: 20px;
                position: relative;
            }
            .review-container .card:hover {
                background-color: white;
                cursor: pointer;
            }
            .re-card-content {
                position: relative;
                height: 180px;
                width: 100%;
                padding: 30px;
                overflow: hidden;
                background-color: #eee;
            }
            .re-card-title {
                font-size: large;
                font-weight: bold;
            }
            .re-card.text {
                text-overflow: ellipsis;
            }
            .re-card-pf {
                position: absolute;
                bottom: 0;
                right: 0;
                height: 200px;
                padding: 20px 40px;
                text-align: right;
            }
            .pf-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background-image: url('images/default.jpg');
                background-position: center;
                background-size: cover;
                margin-left: auto;
            }
            .re-name {
                font-size: larger;
                margin: 0;
            }
            .re-id {
                font-size: smaller;
                font-weight: lighter;
                margin: 0;
            }
            .re-card-body {
                position: absolute;
                bottom: 0;
                width: 230px;
                height: 100px;
                display: flex;
                flex-direction: column;
            }
            .re-card-movietitle {
                font-size: 22px;
                font-weight: bold;
                margin: 10px 20px 10px;
                flex: 1;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .createddate {
                font-size: smaller;
                margin: 25px;
                margin-top: 0;
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
            <div class="register">
                <?php
                if($signin) { ?>
                <div class="menu" style="float: right;">
                    <a class="nav-pf" href=""><img src="images/default.jpg"></a>
                    <div class="menu-content">
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
        <h3>Boxoffice</h3>
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
        <h3>Recent Reviews</h3>
        <div class="review-container">
            <?php
            $reviewQuery = "select reviews.rv_title, reviews.rv_content, reviews.created_date, reviews.movie_id, member.uname, member.email, movieinfo.title
                            from reviews, member, movieinfo
                            where reviews.user_email = member.email and reviews.movie_id = movieinfo.id
                            order by reviews.created_date desc";
            $result = $conn->query($reviewQuery);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $rvTitle = $row['rv_title'];
                    $rvContent = $row['rv_content'];
                    $createdDate = $row['created_date'];
                    $movieId = $row['movie_id'];
                    $uname = $row['uname'];
                    $userEmail = $row['email'];
                    $movieTitle = $row['title'];
                    ?>

                <div class="card" onclick="goToMoviePage('<?= $movieId ?>')">
                    <div class="re-card-content">
                        <p class="re-card-title"><?= $rvTitle ?></p>
                        <p class="re-card-text"><?= $rvContent ?></p>
                    </div>
                    <div class="re-card-pf">
                        <div class="pf-img"></div>
                        <p class="re-name"><?= $uname ?></p>
                        <p class="re-id">&#64;<?= $userEmail ?></p>
                    </div>
                    <div class="re-card-body">
                        <p class="re-card-movietitle"><?= $movieTitle ?></p>
                        <p class="createddate"><?= $createdDate ?></p>
                    </div>
                </div>
            <?php }
            }
            else echo "<script>alert('리뷰가 존재하지 않습니다.');</script>";
            ?>
        </div>
        <script>
            function goToMoviePage(movieId) {
                window.location.href = 'moviedetails.php?id=' + movieId;
            }
        </script>
    </body>
</html>