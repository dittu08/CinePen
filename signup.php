<?php
include_once('dbconn.php');
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$regdate = date('Y/m/d');
$sql = "insert into member values('$email','$uname','$pwd','$regdate'";
if($conn->query($sql)) {
  echo "<script>alert('회원가입 성공!');</script>";
  echo "<script>location.replace('index.php')</script>";
}
else {
  echo "<script>alert('회원가입에 실패하였습니다.');</script>";
  echo "<script>location.replace('signup.html')</script>";
}
?>