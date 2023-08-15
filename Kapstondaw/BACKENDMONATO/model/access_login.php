<?php
session_start();
include '../server/server.php';

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    setMessageAndRedirect('Username or password is empty!', 'danger', '../login.php');
}

// Only fetch password for given username from database
$query = $conn->prepare("SELECT * FROM tbl_users WHERE `username` = ?");
$query->bind_param("s", $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows) {
    $user = $result->fetch_assoc();

    // Use password_verify to compare input password with hashed password from database
    if (password_verify($password, $user['password'])) {

        if ($user['role'] === 'admin' || $user['role'] === 'staff') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            setMessageAndRedirect('You have successfully logged in to Automated Brgy Management System!', 'success', '../dashboard.php');
        } else {
            setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login.php');
        }

    } else {
        setMessageAndRedirect('Username or password is incorrect!', 'danger', '../login.php');
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