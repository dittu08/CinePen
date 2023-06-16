<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CinePen</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable=yes>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.3.0/dist/css/glide.core.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.3.0/dist/css/glide.theme.min.css">
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
            
            /* hero (bootstrap) */
            .carousel-bg {
                filter: blur(50px);
                max-height: 400px;
            }
            .carousel-caption {
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 80%;
            }
            .carousel-img {
                max-width: 180px;
                overflow: hidden;
            }
            .carousel-content {
                text-align: left;
                margin: 20px;
            }
            
            /* box office (card: bootstrap / slider: glide) */
            .boxoffice {
                margin-top: 50px;
                margin-left: 20px;
            }
            .card {
                width: 12rem;
                height: 22rem;
                margin: 20px;
                position: relative;
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

            /* my list */
            .mylist {
                margin-top: 30px;
                margin-left: 20px;
            }

            /* reviews */
            .trending {
                margin-top: 30px;
                margin-left: 20px;
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
            $email = $_SESSION['email'];
            $uname = $_SESSION['uname'];
        }
        ?>
        
        <!-- navbar -->
        <nav class="navbar">
            <?php
            if ($signin) {
            ?>
            <div class="logo">
                <a href="">CinePen</a>
            </div>
            <ul class="register">
                <li id="search"><input type="text" name="search" placeholder="검색어를 입력해주세요."></li>
                <li><a href="signout.php">Sign out</a></li>
                <?php } else { ?>
            <div class="logo">
                <a href="">CinePen</a>
            </div>
            <ul class="register">
                <li id="search"><input type="text" name="search" placeholder="검색어를 입력해주세요."></li>
                <li><button onclick="location.href='signin.html'">Sign in</button></li>
                <li><button onclick="location.href='signup.html'">Sign up</button></li>
            </ul>
            <?php } ?>
        </nav>

        <!-- hero -->
        <div id="slideshow" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#slideshow" data-bs-slide-to="4"></button>
            </div>
            
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/fastx.jpg" alt="" class="carousel-bg" style="width:100%">
                <div class="carousel-caption">
                    <img src="images/fastx.jpg" alt="" class="carousel-img" style="width:50%">
                    <div class="carousel-content">
                        <h3>Nature Photo</h3>
                        <p>We had such a great time in this place!</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/fastxW.jpg" alt="" class="carousel-bg" style="width:100%">
                <div class="carousel-caption">
                    <img src="images/johnwick4.jpg" alt="" class="carousel-img" style="width:100%">
                    <div class="carousel-content">
                        <h3>Nature Photo</h3>
                        <p>We had such a great time in this place!</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/fastxW.jpg" alt="" class="carousel-bg" style="width:100%">
                <div class="carousel-caption">
                    <img src="images/gotg3.jpg" alt="" class="carousel-img" style="width:100%">
                    <div class="carousel-content">
                        <h3>Nature Photo</h3>
                        <p>We had such a great time in this place!</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/fastxW.jpg" alt="" class="carousel-bg" style="width:100%">
                <div class="carousel-caption">
                    <img src="images/assets/img/slide/bg4.jpg" alt="" class="carousel-img" style="width:100%">
                    <div class="carousel-content">
                        <h3>Nature Photo</h3>
                        <p>We had such a great time in this place!</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/fastxW.jpg" alt="" class="carousel-bg" style="width:100%">
                <div class="carousel-caption">
                    <img src="images/assets/img/slide/bg5.jpg" alt="" class="carousel-img" style="width:100%">
                    <div class="carousel-content">
                        <h3>Nature Photo</h3>
                        <p>We had such a great time in this place!</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        </div>
        
        <!-- box office -->
        <h3 class="boxoffice">Box Office</h3>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <!-- <li class="glide__slide">
                    <div class="card">
                        <div class="card-img">
                            <img class="card-img-top" src="images/gotg3.jpg" alt="">
                            <div class="card-img-overlay"></div>
                        </div>
                        <p class="card-rank">1</p>
                        <div class="card-body">
                          <p class="card-text">존 윅 4</p>
                        </div>
                    </div>
                </li> -->
              </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
              </div>
          </div>
        </div>

        <!-- my list -->
        <h3 class="mylist">My List</h3>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <li class="glide__slide">
                    <div class="card">
                        <div class="card-img">
                            <img class="card-img-top" src="images/gotg3.jpg" alt="">
                        </div>
                        <div class="card-body">
                          <p class="card-text">가디언즈 오브 갤럭시: Volume 3</p>
                          <p class="card-date">개봉일</p>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
              </div>
          </div>
        </div>
        </div>

        <!-- reviews -->
        <h3 class="trending">Trending Now</h3>
        <div class="card" style="width: 25rem;">
            <div class="re-card-content">
                <p class="re-card-title">What is Lorem Ipsum?</p>
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

        <!-- random movies -->
        <h3 class="randommovies">Random Movies</h3>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <li class="glide__slide">
                    <div class="card">
                        <div class="card-img">
                            <img class="card-img-top" src="images/gotg3.jpg" alt="">
                        </div>
                        <div class="card-body">
                          <p class="card-text">가디언즈 오브 갤럭시: Volume 3</p>
                          <p class="card-date">개봉일</p>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
              </div>
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


        <script src="images/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="images/https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
        <script>
            const config = {
                perView: 5,
                breakpoints: {
                    600: {
                        perView: 1
                    }
                }
            };
            new Glide(".glide", config).mount();
            
            const boxOfficeElement = document.getElementById('glide');
            const apiUrl = 'https://kobis.or.kr/kobisopenapi/webservice/rest/boxoffice/searchDailyBoxOfficeList.json?key=1420db90b400f408c2b0d75c8602283e&targetDt=20230602';
            const glideElement = document.querySelector('.glide__slides');

            fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const boxOfficeList = data.boxOfficeResult.dailyBoxOfficeList;

                boxOfficeList.forEach(item => {
                    const cardElement = document.createElement('li');
                    cardElement.classList.add('glide__slides');
                    cardElement.innerHTML = `
                        <div class="card">
                            <div class="card-img">
                                <img class="card-img-top" src="images/johnwick4.jpg" alt="">
                                <div class="card-img-overlay"></div>
                            </div>                            
                            <p class="card-rank">${item.rank}</p>
                            <div class="card-body">
                                <p class="card-text">${item.movieNm}</p>
                                <p class="card-date">${item.openDt}</p>
                            </div>
                        </div>
                    `;
                    glideElement.appendChild(cardElement);
                })
                new Glide('.glide', config).mount();
            })
            .catch(error => {
                console.log('Error', error);
            });
          </script>
    </body>
</html>