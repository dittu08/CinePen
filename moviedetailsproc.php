<!-- moviedetailsproc.php -->
<?php
session_start();
include_once('dbconn.php');
$rvTitle = $_POST['rv_title'];
$rvContent = $_POST['rv_content'];
$userEmail = $_POST['user_email'];
$movieId = $_POST['movie_id'];

$sql = "update reviews set rv_title = '$rvTitle', rv_content = '$rvContent' where user_email = '$userEmail'";

if ($conn->query($sql)) {
    echo "<script>alert('리뷰가 저장되었습니다.');</script>";
    echo "<script>window.history.go(-1);</script>";
}
else {
    echo "<script>alert('리뷰 저장 중 오류가 발생했습니다: " . $conn->error . "');</script>";
    echo "<script>window.history.go(-1);</script>";
}
?>