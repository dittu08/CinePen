<?php
session_start();
include_once('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rvTitle = $_POST['rv_title'];
    $rvContent = $_POST['rv_content'];
    $movieId = $_POST['movie_id'];
    $id = $_POST['id'];

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $email = $_SESSION['email'];

        $sql = "INSERT INTO reviews (rv_title, rv_content, user_email, movie_id) VALUES ('$rvTitle', '$rvContent', '$userEmail', '$movieId')";

        if ($conn->query($sql) === true) {
            echo "<script>alert('리뷰가 저장되었습니다.');</script>";
            echo "<script>window.history.go(-1);</script>";
        } else {
            echo "<script>alert('리뷰 저장 중 오류가 발생했습니다: " . $conn->error . "');</script>";
            echo "<script>window.history.go(-1);</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('잘못된 요청입니다.');</script>";
        echo "<script>window.history.go(-1);</script>";
    }
}
?>
