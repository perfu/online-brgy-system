<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $fullname         = $conn->real_escape_string($_POST['fullname']);
    $documentFor      = $conn->real_escape_string($_POST['documentFor']);
    $purpose          = $conn->real_escape_string($_POST['purpose']);
    $dateRequested    = $conn->real_escape_string($_POST['dateRequested']);

    if(!empty($fullname) && !empty($documentFor) && !empty($purpose) && !empty($dateRequested)){

        $insert  = "INSERT INTO tbl_idform (`fullname`, `documentFor`, `purpose`, `date-requested`) 
                    VALUES ('$fullname', '$documentFor', '$purpose', '$dateRequested')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Identification form added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../idForm.php");

	$conn->close();