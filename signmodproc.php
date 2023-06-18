<?php
session_start();
include_once('dbconn.php');
$uname = $_POST['uname'];
$uinfo = $_POST['uinfo'];
$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$chkpwd = $_POST['chkpwd'];
$sql = "update member set uname = '$uname', pf_info = '$uinfo', email = '$email', uid = '$uid', pwd = '$pwd'
        where email = '$email'";

if($pwd !== $chkpwd) {
    echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    echo "<script>location.replace('signmodify.php')</script>";
}

if($conn->query($sql)) {
    echo "<script>alert('회원 정보가 수정되었습니다.');</script>";
    echo "<script>location.replace('signmodify.php')</script>";
}
else {
    echo "<script>alert('회원 정보 수정을 실패하였습니다.');</script>";
    echo "<script>location.replace('signmodify.php')</script>";
}
?>