<?php

// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Deny all overcoming errors
error_reporting (0);

session_start();

//redirect to login if User has not logged in(Closing Rule after HTML)

if(isset($_SESSION['user_jobid'])) {

?>

<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!--===== Optimization =======-->
    <meta name="description" content="">

    <!--====== Favicon Icon ======-->
     <link rel="icon" type="image/ico" href="img/favicon.ico"/>

     <!--====== Title ======-->
     <title>Sensational --  Beauty -- Parlour </title>

    <!--====== Google Fonts ====-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!--====== Preloader & Footer css ======-->
    <link rel="stylesheet" href="style.css">

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style>
        body{
            background: #f5f5f5;
        }
       
    </style>
    
  
</head>


<body>
   
      <!--====== PRELOADER CODE GOES HERE ======--> <!--====== PRELOADER CODE GOES HERE ======-->

     <!-- INCLUDE DB CONNECTION -->
     <?php include 'includes/db_conn.php'; ?> 

    <!--====== DASHBOARD START ======-->
    <div class="main-wrapper">
        <!-- INCLUDE NAVBAR HERE -->
            <?php include 'includes/navbar.php'; ?> 
        
        <!-- INCLUDE SIDEBAR HERE -->
            <?php include 'includes/sidebar.php'; ?> 

        <div class="page-wrapper">
            <div class="content">
                
                 <!-- USER DATA AND NOTIFICATIONS -->
                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                            <div class="dash-widget-info text-left">
                                <!-- Alert Box for Successful Login -->
                                    <?php if ($_GET['success']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success']) ?></strong>
                                    </div>
                                    <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> SUPERADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
                <!-- DASHBOARD SHOWING USER COUNT -->
                
                <div class="row">

                    <!-- Display No of Customers -->
                    <?php 
                        $sql ="SELECT id from sensational_clients";
                        $query2 = $conn -> prepare($sql);;
                        $query2->execute();
                        $results=$query2->fetchAll(PDO::FETCH_OBJ);
                        $query=$query2->rowCount();
                    ?>
                   
                   <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <a href="view_clients">
                            <div class="dash-widget">
                                <span class="dash-widget-bg1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3><?php echo htmlentities($query);?></h3>
                                    <span class="widget-title1">Clients</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Display No of Employees -->
                    <?php 
                        $sql ="SELECT id from sensational_employees";
                        $query2 = $conn -> prepare($sql);;
                        $query2->execute();
                        $results=$query2->fetchAll(PDO::FETCH_OBJ);
                        $query=$query2->rowCount();
                    ?>
                   
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <a href="view_employees">
                            <div class="dash-widget">
                                <span class="dash-widget-bg2"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3><?php echo htmlentities($query);?></h3>
                                    <span class="widget-title2">Employees</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    
                </div>

				<!-- Employee Performance Report 
                
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block" style="text-transform: uppercase;">Employee Performance Chart </h4> 
                                <a href="#" class="btn btn-outline-primary take-btn float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Name:</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="#"></a>
													<h2><span></span></a></h2>
												</td>                 
												<td class="text-right">
													<a href="#" class="btn btn-outline-primary take-btn">View Details</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div> 
                
                 Employee Performance Report -->
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    

     <!--====== FOOTER PART START ======-->
    <?php 

    //include the footer file
    include 'includes/footer.php';

    ?> 
    
    <!--====== FOOTER PART END ======-->

    <!--====== JQUERY js ======-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    

    <!--====== POPPER js ======-->
	<script src="assets/js/popper.min.js"></script>

    <!--====== BOOTSTRAP js ======-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== UTILITY js ======-->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
    

     <!--====== Main js ======-->
     <!-- SUPPORTS THE PRELOADER FUNCTIONS -->
     <script src="assets/js/main.js"></script>


    <!--====== Alert Script START ======-->
    <script type="text/javascript">

    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);

    </script>

    <!--====== Alert Script END ======-->
    

</body>
</html>

<?php
} else {
    header("Location: ../index?errorlogin=Please Login to Proceed !!");
}
?>