<?php 
 error_reporting (0);
 include 'includes/db_conn.php'; 

 if(isset($_POST['submit']))
 {
 $phonenumber=$_POST['phonenumber'];
 $rewardpoints=$_POST['rewardpoints'];


 $id=$_GET['id'];
 $sql="SELECT rewardpoints FROM sensational_payments WHERE clientcode=:id";
 $query= $conn -> prepare($sql);
 $query->bindParam(':id',$id,PDO::PARAM_STR);
 $query-> execute();
 $results = $query -> fetchAll(PDO::FETCH_OBJ);
 $cnt=1;
     if($query -> rowCount() > 0)
         {
            $sql1="INSERT INTO sensational_redeemhistory (clientcode, employeecode, rewardpoints ) VALUES (:phonenumber, 'admin', :rewardpoints)";
            $query = $conn->prepare($sql1);
            $query->bindParam(':phonenumber',$phonenumber,PDO::PARAM_STR);
            $query->bindParam(':rewardpoints',$rewardpoints,PDO::PARAM_STR);
            $query->execute();

            $sql="UPDATE sensational_payments SET rewardpoints = '0' where clientcode=:id";
            $query = $conn->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
            header("Location: check_points?redeemsuccess= Points Redeemed Successfully !!");
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
            background: #f1f1f1;
        }
       
    </style>
  
</head>


<body>
   
      <!--====== PRELOADER CODE GOES HERE ======--> <!--====== PRELOADER CODE GOES HERE ======-->

     

    <!--====== DASHBOARD START ======-->
    <div class="main-wrapper">

        <!-- INCLUDE DB CONNECTION -->
        <?php include 'includes/db_conn.php'; ?> 

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

                             <!-- Alert Box for Successful Points Redeem -->
                             <?php if ($_GET['redeemsuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['redeemsuccess']) ?></strong>
                                    </div>
                                <?php } ?>
                               
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
				<!-- PAYMENT INFORMATION -->
               
                <form method="post">
				<div class="row">
					<div class="col-12 col-md-12 col-lg-10 col-xl-10" style="margin-left:auto;margin-right:auto;">
                                    
                    <?php	
                        $id=$_GET['id'];
                        $ret="SELECT clientcode, Sum(rewardpoints) AS points from sensational_payments where clientcode=:id";
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
						<div class="card">
							<div class="card-body">
                                <div class="row mt-0"  >
                                                <div class="col">
                                                    <label> Phone Number:</label>
                                                    <input type="text"  class="form-control" value="<?php echo htmlentities($result->clientcode);?>" name="phonenumber" id="phonenumber" readonly>
                                                </div>
                                                <div class="col">   
                                                    <label> Points:</label>
                                                    <input type="text"  class="form-control" value="<?php echo htmlentities($result->points);?>" name="rewardpoints" id="rewardpoints" readonly>
                                                </div>
                                                <div class="col">
                                                     <button class="btn btn-outline-primary take-btn" name="submit"  style="margin-left:40px;margin-right:auto;margin-top:32px;" type="submit" onclick="return confirm('Please Confirm to Proceed ?')">Redeem Points</button>
                                                </div>
                                            
                                </div>
                                        
                                 
							</div>
						</div>         
					</div>

                    <?php }} else{
                            echo ' No Data Available !!';
                        } 
                    ?>

                   
				</div>
                

               
            </form>
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
    }, 5000);
 

    
</script>

    <!--====== Alert Script END ======-->

    

</body>
</html>
