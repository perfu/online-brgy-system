<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if(!empty($id)){
		$query 		= "DELETE FROM tbl_businessClearance WHERE id = '$id'";
		
		$result 	= $conn->query($query);
		
		if($result === true){
            $_SESSION['message'] = 'Clearance has been removed!';
            $_SESSION['success'] = 'danger';
            
        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }
	}else{

		$_SESSION['message'] = 'Missing Clearance ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../businessClearance.php");
	$conn->close();

