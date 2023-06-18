<?php
session_start();
$email = $_SESSION['email'];
include_once('dbconn.php');
$sql = "delete from member where email = '$email'";
if($conn->query($sql)) {
    session_destroy();
    echo "<script>alert('회원 탈퇴가 정상적으로 처리되었습니다.');</script>";
    echo "<script>location.replace('main.php')</script>";
}
else {
    echo "<script>alert('회원 탈퇴 중 오류가 발생하였습니다.');</script>";
    echo "<script>location.replace('index.php')</script>";
}
$conn->close();   # DB disconnection 연결해제 
?>