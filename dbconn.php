<?php
$server = 'localhost';
$user = 'root';
$passwd = '';
$dbname = 'movie';
$conn = new mysqli($server, $user, $passwd, $dbname);
if($conn->connect_error)
    die("데이터베이스 서버 접속 중 오류 발생");
?>