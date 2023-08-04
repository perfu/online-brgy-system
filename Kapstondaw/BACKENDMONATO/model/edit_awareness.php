<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id 	        = $conn->real_escape_string($_POST['id']);
  $name         = $conn->real_escape_string($_POST['name']);
  $date         = $conn->real_escape_string($_POST['date']);
  $time 	      = $conn->real_escape_string($_POST['time']);
  $location     = $conn->real_escape_string($_POST['location']);
  $details 	    = $conn->real_escape_string($_POST['details_awareness']);
  $status 	    = $conn->real_escape_string($_POST['statusAwareness']);

	if(!empty($id)){

		$query = "UPDATE tblawareness SET `name`='$name', `date`='$date', `time`='$time', `location`='$location', `details`='$details', `status`='$status' WHERE id=$id;";

		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Awareness details has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No Awareness found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../awareness.php");

	$conn->close();