<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $province_name      = $conn->real_escape_string($_POST['province_name']);
    $b_name             = $conn->real_escape_string($_POST['b_name']);
    $town_name          = $conn->real_escape_string($_POST['town_name']);
    $tel_no             = $conn->real_escape_string($_POST['tel_no']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["municipality_logo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $target_dir2 = "uploads/";
    $target_file2 = $target_dir2 . basename($_FILES["barangay_logo"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

    if(!empty($province_name) && !empty($b_name) && !empty($town_name)&& !empty($tel_no)){

        $insert  = "INSERT INTO brgy_information (`province_name`, `brgy_name`, `municipality_logo`, `town_name`, `tel_no`, `brgy_logo`) 
                    VALUES ('$province_name', '$b_name', '$imageFileType', '$town_name','$tel_no', '$imageFileType2')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Barangay information was updated!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../request.php");

	$conn->close();