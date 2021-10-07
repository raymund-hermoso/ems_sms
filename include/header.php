<?php 
	if(isset($_SESSION['user_id'])){
		include_once('FetchUser.php');
		$user = new FetchUser();
		
		//fetch user data
		$sql = "SELECT * FROM tbl_users WHERE user_id = '".$_SESSION['user_id']."'";
		$row = $user->details($sql);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMS</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <?php 
			if (strpos($_SERVER['REQUEST_URI'], "pages") !== false){
		?>
				<!-- Custom fonts for this template-->
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

                <!-- Custom styles for this template-->
                <link href="../css/sb-admin-2.min.css" rel="stylesheet">

				<!-- Custom styles ems.css-->
                <link href="../css/ems.css" rel="stylesheet">

				<!-- aos -->
  				<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
				  
		<?php	
			}
			else{
		?>
                <!-- Custom fonts for this template-->
                <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

                <!-- Custom styles for this template-->
                <link href="css/sb-admin-2.min.css" rel="stylesheet">

				<!-- Custom styles ems.css-->
                <link href="css/ems.css" rel="stylesheet">

				<!-- aos -->
  				<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

		<?php
			}
		?>

</head>

<body class="bg-gradient-primary" id="page-top">
<?php

    if(isset($_SESSION['message'])){
        if (strpos($_SERVER['REQUEST_URI'], "pages") !== false){
?>
        <div id="user_message" class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
            unset($_SESSION['message']);
        }
        
    }
?>