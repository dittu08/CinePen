<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'movie';

$email = $_GET['uid'];

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as count FROM member WHERE email = '" . $conn->real_escape_string($email) . "'";
$result = $conn->query($sql);

if($result === false) {
    die("쿼리 실행 실패: " . $conn->error);
}

$row = $result->fetch_assoc();
$count = $row['count'];

$response = array('exists' => ($count > 0));
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
