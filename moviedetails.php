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
            .myRating .star {
                font-size: 28px;
                cursor: pointer;
            }
            .myRating .star.filled {
                color: gold;
            }

            /* review */
            h3 {
                margin-top: 30px;
                margin-left: 20px;
                font-weight: bold;
            }
            .rv {
                margin-top: 60px;
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
            .rv-pf {
                display: flex;
                flex-direction: column;
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
                margin-left: 20px;
            }
            .at, .userid {
                color: #999;
                margin: 0;
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

            /* user reviews */
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
        <div class="pf-btns">
            <div class="avgRating">
                <p class="avgRt-w">평균 별점</p>
                <?php
                $movieId = $_GET['id'];
                $query = "select AVG(rating) as avg_rating from movie_rating where movie_id = $movieId";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $avgrating = $row['avg_rating'];
                ?>
                <p class="avgRt-f">&#9733;<?= number_format($avgrating, 1) ?></p>
            </div>
            <div class="myRating">
                <p class="myRt-w">내 별점</p>
                <p class="myRt-f">
                    <span class="star" data-rating="1">&#9733;</span>
                    <span class="star" data-rating="2">&#9733;</span>
                    <span class="star" data-rating="3">&#9733;</span>
                    <span class="star" data-rating="4">&#9733;</span>
                    <span class="star" data-rating="5">&#9733;</span>
                </p>
            </div>
            <div class="mvReview">
                <p class="myRv-w">리뷰 수</p>
                <?php
                $reviewCountSql = "select count(*) as reviewCount from reviews where movie_id = '$movieId'";
                $reviewCountResult = $conn->query($reviewCountSql);

                if($reviewCountResult) {
                    $reviewCountRow = $reviewCountResult->fetch_assoc();
                    $reviewCount = $reviewCountRow['reviewCount'];
                    ?>
                    <p class="myRv-f"><?= $reviewCount ?></p>
                <?php
                }
                else echo "리뷰 수를 가져오는 데 실패했습니다.";
                ?>
            </div>
        </div>

        <!-- review -->
        <div class="rv">
            <form action="moviedetailsproc.php" method="post">
                <h3 class="rv-tt">리뷰 작성</h3>
                <div class="review">
                    <?php
                    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                    
                        if(!empty($email)) {
                            $usersql = "select * from member where email = '$email'";
                            $result = $conn->query($usersql);

                            if($result->num_rows > 0) {
                                $row = $result->fetch_row();
                        ?>
                                <div class="rv-user">
                                    <div class="pf-img"></div>
                                    <div class="rv-pf">
                                        <p class="pf-name"><?= !empty($row[3]) ? $row[3] : '로그인해 주세요.'; ?></p>
                                        <div class="pf-id">
                                            <div class="at">&#64;</div>
                                            <p class="userid"><?= !empty($row[1]) ? $row[1] : '아이디를 입력해 주세요.'; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } 
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                        $email = $_SESSION['email'];

                        $reviewsql = "select * from reviews where user_email = '$email' and movie_id = '$movieId'";
                        $result = $conn->query($reviewsql);
                        if($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            // var_dump($row);
                            $rvtitle = $row['rv_title'];
                            $rvcontent = $row['rv_content'];
                            $movieId = $row['movie_id'];
                            $id = $row['id'];
                        }
                        else {
                            $rvtitle = '';
                            $rvcontent = '';
                        }
                    }
                    else {
                        $rvtitle = '';
                        $rvcontent = '';
                    }
                    ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="movie_id" value="<?= $movieId ?>">
                    <input type="text" class="rv-title" name="rv_title" value="<?= $rvtitle ?>" placeholder="제목을 입력하세요.">
                    <textarea class="rv-content" name="rv_content" placeholder="내용을 입력하세요."><?= $rvcontent ?></textarea>
                    <input class="submit" type="submit" value="저장">
                </div>
            </form>
        </div>

        <!-- user review -->
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
                    $moviereviewid = $_GET['id'];

                    if($movieId === $moviereviewid) {
                    ?>
                        <div class="card">
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
            <?php   }
                }
            }
            else echo "<script>alert('리뷰가 존재하지 않습니다.');</script>";
            ?>
        </div>
        
        <?php
        $result->close();
        $conn->close();
        ?>

        <script>
            document.querySelectorAll('.myRt-f .star').forEach(star => {
                star.addEventListener('click', function() {
                    var rating = this.getAttribute('data-rating');
                    updateStarRating(this.parentNode, rating);

                    var movieId = '<?php echo $movieId; ?>';
                    var userEmail = '<?php echo $userEmail; ?>';
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'save_rating.php');
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            var response = xhr.responseText;
                            if (response === 'success') {
                                alert('평점이 저장되었습니다.');
                            } else {
                                alert('평점 저장에 실패했습니다.');
                            }
                        }
                        else {
                            alert('요청 실패: ' + xhr.status);
                        }
                    };
                    xhr.send('rating=' + rating + '&movieId=' + movieId + '&userEmail=' + userEmail);

                    console.log('별점:', rating);
                });
            });

            function updateStarRating(starContainer, rating) {
                starContainer.querySelectorAll('.star').forEach(star => {
                    var starRating = star.getAttribute('data-rating');
                    if (starRating <= rating) {
                        star.classList.add('filled');
                    } else {
                        star.classList.remove('filled');
                    }
                });
            }
        </script>
    </body>
</html>