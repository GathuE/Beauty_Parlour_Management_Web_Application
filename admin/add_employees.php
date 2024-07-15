<?php 
error_reporting (0);
include 'includes/db_conn.php'; 


if(!empty($_POST["code"])){
    $employeecode = $_POST["code"];

    $sql="SELECT code FROM sensational_employees WHERE code=:employeecode";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':employeecode', $employeecode, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
        if($query -> rowCount() > 0)
            {
                header("Location: add_employees?adderror= Employee Code Already Taken!!");
            } 
        elseif(isset($_POST['submit']))
        {
            $ename=$_POST['name'];
            $employeecode=$_POST['code'];
            $sql = "INSERT INTO sensational_employees (code,name) values (:employeecode,:ename)";
            $query = $conn->prepare($sql);
            $query->bindParam(':employeecode',$employeecode,PDO::PARAM_STR);
            $query->bindParam(':ename',$ename,PDO::PARAM_STR);
            $query->execute();
            header("Location: add_employees?addsuccess= Employee Successfully Enrolled!!");
        }
           
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
                            <!-- Alerts go Here -->

                            <!-- Alert Box for Successful Employee Enrollment -->
                             <?php if ($_GET['addsuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['addsuccess']) ?></strong>
                                    </div>
                                <?php } ?>
                            <!-- Alert Box for Duplicate Employee Code -->
                            <?php if ($_GET['adderror']) { ?>
                                    <div class="alert alert-warning fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['adderror']) ?></strong>
                                    </div>
                                <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
				<!-- ADD NEW EMPLOYEE -->
                
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
						<div class="card">
							<div class="card-header">
                            <h4 class="card-title d-inline-block float-left">ADD NEW EMPLOYEE</h4>  
							</div>
							<div class="card-body">
                            <form method="post"> 

                                        <div class="row mt-0">
                                            
                                                <div class="col">
                                                    <label>Name:</label>
                                                    <input type="text"  class="form-control" name="name" id="name" placeholder="Enter Name" required>
                                                </div>                            
                                         
                                        </div>

                                        <div class="row mt-4">                                          
                                            
                                                <div class="col">
                                                    <label>Employee Code:</label>
                                                    <input type="text" class="form-control" name="code" id="code" placeholder="Eg. SBP-001" style="color:#a81164;text-transform:uppercase;font-weight:500;" required>
                                                </div>
                                           
                                        </div>
                                        <div class="row mt-4">
                                             <button class="btn btn-outline-primary take-btn" name="submit" id="submit" style="margin-left:auto;margin-right:auto;" type="submit"  onclick="return confirm(' Add New Employee?')">Submit</button>
                                        </div>

                                </form>
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
    }, 6000);



    </script>

    <!--====== Alert Script END ======-->
    

</body>
</html>

?>