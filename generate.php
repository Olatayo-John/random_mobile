<?php 
include('connection.php');

if (isset($_POST['generate_btn'])) {
	if ((!empty($_POST['const_num'])) && (strlen($_POST['const_num']) == 5)) {
		if ((!empty($_POST['gen'])) && $_POST['gen'] < 2000) {
			$const_num= mysqli_real_escape_string($con,$_POST['const_num']);
			$gen= mysqli_real_escape_string($con,$_POST['gen']);

			$each_mobile= array();
			for ($i=0; $i <= $gen; $i++) {
				$rand_five= mt_rand(0,99999);
				$mobile= $const_num.$rand_five;
				if (strlen($mobile) == 10) {
					array_push($each_mobile, $mobile);
				}	
			}

			$uniquemobile= array_unique($each_mobile);
			$uniquemobile_arr[]= array_unique($each_mobile);

			//export as csv
			// header("Content-Type: text/csv; charset=utf-8");
			// header("Content-Disposition: attachment; filename=mobile_data.csv");
			// $output = fopen("php://output", "w");
			// fputcsv($output, array('Mobile'));
			// foreach ($uniquemobile_arr as $row) {
			// 	fputcsv($output, $row);
			// }
			// fclose($output);

			foreach ($uniquemobile as $row) {
				$query = "INSERT INTO mobile (mobile) VALUES ('$row');";
				$result = mysqli_query($con, $query);
			}
			if ($result == 0) {
				$_SESSION['msg'] = "Error!";
				header("Location: index.php");
				exit();
			} else {
				$_SESSION['msg'] = "Data Inserted to DB!";
				header("Location: index.php");
				exit();
			}
			mysqli_close($con);
			
		}else{
			$_SESSION['msg']= $_POST['gen']." is invalid!";
			header("Location: index.php");
			exit();
		}
	}else{
		$_SESSION['msg']= $_POST['const_num']." is invalid!";
		header("Location: index.php");
		exit();
	}
}else{
	// redirect($_SERVER['HTTP_REFERER']);
	header("Location: index.php");
	exit();
}