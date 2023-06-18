<?php
include_once('dbconn.php');
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$pf_pic = "images/default.jpg";
$regdate = date('Y/m/d');
$sql = "insert into member (email, uname, pwd, pf_pic, regdate) values ('$email','$uname','$pwd','$pf_pic','$regdate')";
if($conn->query($sql)) {
  echo "<script>alert('회원 가입이 완료되었습니다. 로그인해 주세요.');</script>";
  echo "<script>location.replace('signin.html')</script>";
}
else {
  echo "<script>alert('회원가입에 실패하였습니다.');</script>";
  echo "<script>location.replace('signup.html')</script>";
}
?>