<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'movie');
    if ($conn->connect_error) {
        die('데이터베이스 연결 실패: ' . $conn->connect_error);
    }

    $rating = $_POST['rating'];
    $movieId = $_POST['movieId'];
    $userEmail = $_SESSION['email'];

    $ratingInsertSql = "INSERT INTO movie_rating (user_email, movie_id, rating) VALUES ('$userEmail', '$movieId', '$rating')";
    if ($conn->query($ratingInsertSql) === true) {
        echo 'success';
    } else {
        echo '평점 등록에 실패했습니다: ' . $conn->error;
    }

    $conn->close();
}
?>
