<?php
session_start();
include '../server/server.php';

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if($username === '' || $password === ''){
    setMessageAndRedirect('Username or password is empty!', 'danger', '../login.php');
}

$password = sha1($conn->real_escape_string($password));

$query = $conn->prepare("SELECT * FROM tbl_users WHERE `username` = ? AND `password` = ?");
$query->bind_param("ss", $username, $password);
$query->execute();

$result = $query->get_result();

if($result->num_rows) {
    $user = $result->fetch_assoc();
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'staff') {
        setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../dashboard.php');
    }

    if($_SESSION['role'] === 'user') {
        setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../../capstone-frontend/main.php');
        exit();
    }

} else {
    setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    header("Location: $location");
    exit();
}
