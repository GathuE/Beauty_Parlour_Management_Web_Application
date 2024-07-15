<?php 
 error_reporting (0);
 include 'includes/db_conn.php'; 
 
 if(!empty($_POST["clientcode"])){
    $clientcode=$_POST['clientcode'];

    $sql="SELECT phone FROM sensational_clients WHERE phone=:clientcode";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':clientcode', $clientcode, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
        if($query -> rowCount() == 0)
            {
                header("Location: record_payment?payerror= Register Client First!!");
            } 

             else if(isset($_POST['submit']))
                    {
                        $clientcode=$_POST['clientcode'];
                        $employeecode=$_POST['employeecode'];
                        $servicecluster=$_POST['servicecluster'];
                        $service=$_POST['service'];
                        $amount=$_POST['amount'];
                        $employeeretainer=$_POST['employeeretainer'];
                        $businessretainer=$_POST['businessretainer'];
                        $productretainer=$_POST['productretainer'];
                        $rewardpoints=$_POST['rewardpoints'];
                        $sql = "INSERT INTO sensational_payments (clientcode, employeecode, redeemable, service, amount,  employeeretainer, businessretainer, productretainer, rewardpoints, user ) values (:clientcode, :employeecode, :servicecluster, :service , :amount, :employeeretainer, :businessretainer, :productretainer, :rewardpoints, 'admin')";
                        $query = $conn->prepare($sql);
                        $query->bindParam(':clientcode',$clientcode,PDO::PARAM_STR);
                        $query->bindParam(':employeecode',$employeecode,PDO::PARAM_STR);
                        $query->bindParam(':servicecluster',$servicecluster,PDO::PARAM_STR);
                        $query->bindParam(':service',$service,PDO::PARAM_STR);
                        $query->bindParam(':amount',$amount,PDO::PARAM_STR);
                        $query->bindParam(':employeeretainer',$employeeretainer,PDO::PARAM_STR);
                        $query->bindParam(':businessretainer',$businessretainer,PDO::PARAM_STR);
                        $query->bindParam(':productretainer',$productretainer,PDO::PARAM_STR);
                        $query->bindParam(':rewardpoints',$rewardpoints,PDO::PARAM_STR);
                        $query->execute();
                        header("Location: record_payment?addsuccess= Payment Recorded Successfully !!");
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

                            <!-- Alert Box for Successful Payment Record -->
                                <?php if ($_GET['addsuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['addsuccess']) ?></strong>
                                    </div>
                                <?php } ?>
                               
                                <!-- Alert Box for UnSuccessful Payment Record -->
                                <?php if ($_GET['payerror']) { ?>
                                    <div class="alert alert-danger fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['payerror']) ?></strong>
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
					<div class="col-12 col-md-12 col-lg-3 col-xl-3">
                                    
                                    <?php
                                    
                                    include 'includes/database.php';
                                        $result = mysqli_query($con,"SELECT * FROM sensational_clients ORDER BY phone ASC");
                                    ?>
						<div class="card">
							<div class="card-body ">
                                    <div class="row mt-0">
                                            <div class="col">
                                                <label class="card-title d-inline-block float-right">Client:</label>
                                                    <input class="form-control" name="clientcode" id="clientcode" list="cphone" placeholder="Search Client Phone..." required>
                                                        <datalist id="cphone">
                                                                <?php while($row = mysqli_fetch_array($result)):; ?>
                                                                <option type="optgroup" value="<?= $row['phone'] ?>"><?= $row['phone'] ?></option>
                                                                <?php endwhile;?> 
                                                        </datalist>  

                                            </div>
                                    </div>  
							</div>
						</div>


                                    
					</div>
                    <div class="col-12 col-md-12 col-lg-3 col-xl-3">
                                    <?php
                                    
                                    include 'includes/database.php';
                                        $result = mysqli_query($con,"SELECT * FROM sensational_employees");
                                    ?>
						<div class="card">
							<div class="card-body ">
                                    <div class="row mt-0">
                                            <div class="col">
                                                <label class="card-title d-inline-block float-right">Employee:</label>
                                                    <input class="form-control" name="employeecode" id="employeecode" list="ecode" placeholder="Search Employee Code..." required>
                                                        <datalist id="ecode">
                                                                <?php while($row = mysqli_fetch_array($result)):; ?>
                                                                <option type="optgroup" value="<?= $row['code'] ?>"><?= $row['name'] ?></option>
                                                                <?php endwhile;?> 
                                                        </datalist>  
                                            </div>
                                    </div>  
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-12 col-lg-3 col-xl-3">
                        <div class="card">
							<div class="card-body">
                                    <div class="row mt-0">
                                        <div class="col">
                                            <label class="card-title d-inline-block float-right">Service Cluster:</label>
                                                <select class="form-control" id="servicecluster" name="servicecluster" required>
                                                    	    <option type="optgroup"   value="" >Choose type of Service...</option>
                                                            <option type="optgroup"   value="no" >Normal</option>
                                                            <option type="optgroup"   value="yes">Redeemable</option>
                                                </select>
                                        </div>

                                    </div>
                                       

                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-12 col-lg-3 col-xl-3">
                                    <?php
                                    
                                    include 'includes/database.php';
                                        $result = mysqli_query($con,"SELECT * FROM sensational_services");
                                    ?>
						<div class="card">
							<div class="card-body ">
                                    <div class="row mt-0">
                                            <div class="col">
                                                <label class="card-title d-inline-block float-right">Service:</label>
                                                    <input class="form-control" name="service" id="service" list="servicename" placeholder="Search Service Name..." required>
                                                        <datalist id="servicename" >
                                                                <?php while($row = mysqli_fetch_array($result)):; ?>
                                                                <option type="optgroup" value="<?= $row['id'] ?>"><?= $row['service_name'] ?></option>
                                                                <?php endwhile;?> 
                                                        </datalist>  
                                               
                                            </div>
                                    </div>  
							</div>
						</div>
					</div>
                   
                    
				</div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-3 col-xl-3">
						<div class="card">
                            <div class="card-header">
                                <h4 class="dash-widget-info text-right">Amount:</h4>  
							</div>
							<div class="card-body ">
                                    <div class="row mt-0">
                                            <div class="col">
                                                <label class="dash-widget-info text-right">Amount Charged: (Ksh) </label>
                                                <input type="number" id="amount" name="amount" onkeyup="manage(this)" min="0" placeholder="Enter Amount Charged..." class="form-control" required>

                                            </div>
                                    </div>
							</div>
						</div>
                        
					</div>
                    

                    <div class="col-12 col-md-12 col-lg-5 col-xl-5">
						<div class="card">
                            <div class="card-header">
                                <h4 class="dash-widget-info text-right">Retainer:</h4>  
							</div>
							<div class="card-body ">
                                    <div class="row mt-0">
                                        
                                            <div class="col">
                                                <label class="dash-widget-info text-right">Employee: (Ksh) </label>
                                                <h4 class="dash-widget-info text-left"  id="employeeretainer" ></h4>
                                                <input type="number" min="0" class="form-control" name="employeeretainer"  required>
                                            </div>
                                            <div class="col">
                                                <label class="dash-widget-info text-right">Business: (Ksh)  </label>
                                                <h4 class="dash-widget-info text-left" name="businessretainer" id="businessretainer" ></h4>
                                                <input type="number" min="0" class="form-control" name="businessretainer"  required>
                                            </div>
                                            <div class="col">
                                                <label class="dash-widget-info text-right">Products: (Ksh)  </label>
                                                <h4 class="dash-widget-info text-left"  name="productretainer" id="productretainer" ></h4>
                                                <input type="number" min="0" class="form-control" name="productretainer"  required >
                                            </div>
                                    </div>
                                    <div class="row mt-4">
                                            <div class="col">
                                                <input type="button" id="retainer" class="btn btn-outline-primary take-btn" style="float: right;" value=" Calculate Retainer" onclick="calculator();" hidden>
                                            </div>
                                    </div>
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-12 col-lg-4 col-xl-4">
						<div class="card">
                            <div class="card-header">
                                <h4 class="dash-widget-info text-right">Reward Points:</h4>  
							</div>
							<div class="card-body ">
                                    <div class="row mt-0">
                                        
                                            <div class="col">
                                                <label class="dash-widget-info text-right">Reward Points:  </label>
                                                <h4 class="dash-widget-info text-left"  id="rewardpoints" ></h4>
                                                <input type="number" class="form-control" name="rewardpoints"  required>
                                            </div>
                                           
                                    </div>
                                    <div class="row mt-4">
                                            <div class="col">
                                            <button class="btn btn-outline-primary take-btn" name="submit" id="btn" style="float: right;" type="submit" onclick="return confirm('Are you Sure you want to Record this Payment?');" hidden>Submit</button>
                                            </div>
                                    </div>
							</div>
						</div>
					</div>
                   
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
