<?php

// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Deny all overcoming errors
error_reporting (0);

session_start();

//redirect to login if User has not logged in(Closing Rule after HTML)

if(isset($_SESSION['user_jobid'])) {

?>

<?php 
 
 include 'includes/db_conn.php'; 

 if(isset($_POST['submit']))
 {
 $phonenumber=$_POST['phonenumber'];
 $clientname=$_POST['clientname'];

 $id=$_GET['id'];
 $sql="SELECT phone FROM sensational_clients WHERE phone=:phonenumber";
 $query= $conn -> prepare($sql);
 $query-> bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
 $query-> execute();
 $results = $query -> fetchAll(PDO::FETCH_OBJ);
 $cnt=1;
     if($query -> rowCount() > 0)
         {
             header("Location: view_clients?altererror= This Client Already Exists!!");
         } 
         else{
            $sql="update  sensational_clients set phone=:phonenumber, clientname=:clientname where phone=:id";
            $query = $conn->prepare($sql);
            $query->bindParam(':phonenumber',$phonenumber,PDO::PARAM_STR);
            $query->bindParam(':clientname',$clientname,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
            header("Location: view_clients?updatesuccess= Client Data Updated!!");
         }
 
 
 }
 ?>

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
                               
                               
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> CASHIER </h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
				<!-- UPDATE EMPLOYEE DATA FORM -->
                
				<div class="row">
					<div class="col-12 col-md-12 col-lg-7 col-xl-7">
						<div class="card">
							<div class="card-header">
                               <h4 class="card-title d-inline-block float-left">UPDATE CLIENT DATA</h4>  
							</div>
							<div class="card-body ">
                                <form method="post"> 
                                <?php	
                                        $id=$_GET['id'];
                                        $ret="select * from sensational_clients where phone=:id";
                                        $query= $conn -> prepare($ret);
                                        $query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query-> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query -> rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                ?>

                                        <div class="row mt-0">
                                                <div class="col">
                                                    <label> Phone Number:</label>
                                                    <input type="text"  class="form-control" value="<?php echo htmlentities($result->phone);?>" name="phonenumber" id="phonenumber" required>
                                                </div>
                                            
                                          
                                        </div>

                                        
                                        <div class="row mt-0">
                                                 <div class="col">   
                                                    <label> Name:</label>
                                                    <input type="text"  class="form-control" value="<?php echo htmlentities($result->clientname);?>" name="clientname" id="clientname" required>
                                                </div>
                                         </div>       
                                                    
                                        <?php }} else{
                                            echo ' No Data Available !!';
                                        } ?>

                                        <div class="row mt-4">
                                             
                                             <button class="btn btn-outline-primary take-btn" name="submit"  style="margin-left:auto;margin-right:auto;" type="submit"onclick="return confirm('Update Client Details?')">Submit</button>
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