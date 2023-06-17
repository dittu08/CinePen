<?php
session_start();
include_once('dbconn.php');
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$sql = "select * from member where email = '$email' and pwd = '$pwd'";
$set = $conn->query($sql);

if($set->num_rows > 0) {
    $row = $set->fetch_assoc();
    $_SESSION['email'] = $email;
    echo "<script>alert('환영합니다!');</script>";
    echo "<script>location.replace('main.php');</script>";
}
else {
    echo "<script>alert('로그인에 실패하였습니다.');</script>";
    echo "<script>location.replace('signin.html');</script>";
}
?>