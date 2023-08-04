<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
  $id 	        = $conn->real_escape_string($_POST['complain_id']);
  $complainant  = $conn->real_escape_string($_POST['complainant']);
  $date         = $conn->real_escape_string($_POST['date']);
  $time 	      = $conn->real_escape_string($_POST['time']);
  $location     = $conn->real_escape_string($_POST['location']);
  $details 	    = $conn->real_escape_string($_POST['details_complain']);
  $status 	    = $conn->real_escape_string($_POST['statusComplain']);

	if(!empty($id)){

		$query = "UPDATE tblcomplain SET `complainant`='$complainant', `date`='$date', `location`='$location', `time`='$time', `details`='$details', `status`='$status' WHERE id=$id;";

		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Complain details has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No Complain ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../complain.php");

	$conn->close();