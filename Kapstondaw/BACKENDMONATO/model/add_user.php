<?php
require_once '../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$userType = trim($_POST['usertype-user'] ?? '');

if ($username === '' || $password === '' || $userType === '') {
    setMessageAndRedirect('Please fill up the form completely!', 'danger', '../users.php');
}

$password = sha1($conn->real_escape_string($password));

$query = $conn->prepare("SELECT * FROM tbl_users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();

$result = $query->get_result();

if ($result->num_rows > 0) {
    setMessageAndRedirect('Please enter a unique username!', 'danger', '../users.php');
}

$insert = $conn->prepare("INSERT INTO tbl_users (username, password, role) VALUES (?, ?, ?)");
$insert->bind_param("sss", $username, $password, $userType);

if ($insert->execute()) {
    setMessageAndRedirect('User added!', 'success', '../users.php');
} else {
    setMessageAndRedirect('Something went wrong!', 'danger', '../users.php');
}

$conn->close();

function setMessageAndRedirect($message, $status, $location) {
    $_SESSION['message'] = $message;
    $_SESSION['success'] = $status;
    header("Location: $location");
    exit();
}
