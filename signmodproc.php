<?php
session_start();
include_once('dbconn.php');
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$sql = "update member set pwd = '$pwd'
        where email = '$email'";
if($conn->query($sql)) {
    echo "<script>alert('회원 정보 수정 완료!');</script>";
    echo "<script>location.replace('main.php')</script>";
}
else {
    echo "<script>alert('회원 정보 수정을 실패하였습니다.');</script>";
    echo "<script>location.replace('signmodify.php')</script>";
}