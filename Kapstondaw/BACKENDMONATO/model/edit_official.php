<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	= $conn->real_escape_string($_POST['official_id']);
	$name 	= $conn->real_escape_string($_POST['fullname']);
	$chair 	= $conn->real_escape_string($_POST['chairmanship']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$start 	= $conn->real_escape_string($_POST['term-start']);
    $end 	= $conn->real_escape_string($_POST['term-end']);
	$status = $conn->real_escape_string($_POST['status']);

	if(!empty($id)){

		$query 		= "UPDATE tblofficials SET `name`='$name', `chairmanship`='$chair', `position`='$pos', termstart='$start', termend='$end', `status`='$status' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy Official has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No Brgy Official ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../barangayOfficials.php");

	$conn->close();