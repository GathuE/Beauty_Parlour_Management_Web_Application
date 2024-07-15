<?php include('employee_pagination.php'); ?>
<?php
error_reporting (0);
include 'includes/db_conn.php'; 


if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE from sensational_employees  WHERE code=:code";
$query = $conn->prepare($sql);
$query -> bindParam(':code',$id, PDO::PARAM_STR);
$query -> execute();
header("Location: view_employees?deletesuccess= Data Successfully Deleted !!");

}

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
                                <!-- Alert Box for Successful Employee Deletion -->
                                <?php if ($_GET['deletesuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['deletesuccess']) ?></strong>
                                    </div>
                                <?php } ?>

                                <!-- Alert Box for Successful Employee Update -->
                                <?php if ($_GET['updatesuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['updatesuccess']) ?></strong>
                                    </div>
                                <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> CASHIER </h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
				<!-- NUTRITIONIST DATA -->
                
				<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                                    <form method="post">
                                        <label class="dash-widget-info text-right">Search Box:</label>
                                        <input type="text" class="form-control" name="employeecode" style="margin-left:auto;margin-right:auto;margin-bottom:18px;" placeholder="Search Employee Code...">
                                        <input type="submit" class="btn btn-outline-primary take-btn" style="float: right;" value="Search" name="submit">
                                    </form>

                        </div>
                    
                    </div>
                </div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
                            <a href="view_employees" style="float:right;color:#fff;" class="btn btn-primary" >View All</a> <h4 class="card-title d-inline-block float-left">EMPLOYEES</h4> 
							</div>
							<div class="card-body p-0">
								<div class="table-responsive mb-0">
                                    <!-- Table Data Here -->
                                    <form>
                                    <table class="table table-hover mb-0" style="font-size: 14px;font-weight:600; color: #7a0e88;">
                                    <thead>
                                        <tr style="color:#a81164;">
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Employee Code</th>
                                           <!--  <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        include 'includes/database.php';
                                        if(!isset($_POST['submit'])){
                                            $query = "SELECT * FROM sensational_employees $limit";
                                                $data = mysqli_query($con, $query) or die('error');
                                                if(mysqli_num_rows($data) > 0){
                                                    while($row = mysqli_fetch_assoc($data)){
                                                        
                                                        $name = $row['name'];
                                                        $code = $row['code'];
                                    ?>
                                    <tr>
                                            <td><?php echo htmlentities($name);?></td>
                                            <td><?php echo htmlentities($code);?></td>
                                        <!--    <td>
                                                <a href="update_employees?id=<?php echo htmlentities($code);?>" style="font-size:11px;color:#fff;" class="btn btn-primary" >Update</a> 
                                                <a href="view_employees?del=<?php echo htmlentities($code);?>" style="font-size:11px;color:#fff;" class="btn btn-warning" onclick="return confirm(' De-Register Client?')"> Delete </a>
                                            </td>  -->
                                    </tr>
                                    <?php
                                                    }
                                                }
                                                else{
                                     ?>
                                     <tr>
                                                        
                                                        <td colspan="2" style="text-align: center;color:red;"> Employees not Found !!</td>
                                                        
                                     </tr>

                                    <?php
                                                    }
                                            
                                        }
                                    else{
                                        $code = $_POST['employeecode'];

                                            if($code != ""){
                                               $query = "SELECT * FROM sensational_employees WHERE code='$code'";
                                                $data = mysqli_query($con, $query) or die('error');
                                                if(mysqli_num_rows($data) > 0){
                                                    while($row = mysqli_fetch_assoc($data)){
                                                        
                                                        $name = $row['name'];
                                                        $code = $row['code'];
                                    ?>
                                    <tr>
                                            <td><?php echo htmlentities($name);?></td>
                                            <td><?php echo htmlentities($code);?></td>
                                         <!--    <td>
                                                <a href="update_employees?id=<?php echo htmlentities($code);?>" style="font-size:11px;color:#fff;" class="btn btn-primary" >Update</a> 
                                                <a href="view_employees?del=<?php echo htmlentities($code);?>" style="font-size:11px;color:#fff;" class="btn btn-warning" onclick="return confirm(' De-Register Client?')"> Delete </a>
                                            </td> -->
                                    </tr>
                                    <?php
                                                    }
                                                }
                                                else{
                                     ?>
                                     <tr>
                                                        
                                                        <td colspan="2" style="text-align: center;color:red;"> Employees not Found !!</td>
                                                        
                                     </tr>

                                    <?php
                                                    }
                                            }

                                    }
                                    ?>
                                    
                                    </tbody>
                                    </table>
                                    </form>
                                    <!-- Table Data Ends Here -->
								</div>
							</div>
                            <div class="card-footer">
                                <div style="padding:10px;text-align:center;" id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                            </div>
						</div>
					</div>
				</div>
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

