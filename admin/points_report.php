<?php 
error_reporting (0);
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'sensational_beauty_parlour');
// Include the main TCPDF library (search for installation path).
include('tcpdf/tcpdf.php');

         // create new PDF document
ob_start();
$pdf = new TCPDF('P','mm','A4');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', ' Points Redeem History Report <hr />', 0, 0, 0, true, '', true);

$html .='<table cellspacing="0" style=" fontweight:bold; font-size:10px; color:purple; line-height:15px; width:100%;">
        <tr style="margin-bottom:30px;">
            <td style="text-align:left;"><img src="img/logo.jpg" style="padding:30px;border-radius:10px;height:125px;"></td>
            <td style="text-align:right;"><b style="font-size:10px;">Sensational Beauty Parlour</b> <br> Tel : 0711530740 <br> Email : gathuimmanuel@gmail.com</td>
        </tr>';
$html .='</table>';
$html .= '<p style="text-align:left;margin-top:-20px; font-size:10px; color:purple; font-weight:bold;">
<table>
    <tr>
        <td></td>
    </tr>
</table>';
$html .= '<table border ="0.1"  cellspacing="0" style="text-align:center; font-size:10px; fontweight:bold; color:purple; line-height:15px; width:100%;">
      <tr style="color:blue; font-weight:bold;">
      <td style="width:5%;">No:</td>
      <td style="width:20%;">Client Phone</td>
      <td style="width:25%;">Employee Incharge </td>
      <td style="width:25%;">Reward Points</td>
      <td style="width:25%;">Date Redeemed</td>
    </tr>
			';
      // Generate from database
      $query = mysqli_query($conn,"SELECT * from sensational_redeemhistory");
      $count = mysqli_num_rows($query);
      if ($count > 0){
        //set counter variable
      $counter = 1;
      while($row = mysqli_fetch_assoc($query))
      {
            $html .= '
            <tr>
            <td style="width:5%;">'.$counter.'</td>
            <td>'.$row["clientcode"].'</td>
            <td>'.$row["employeecode"].'</td>
            <td>'.$row["rewardpoints"].'</td>
            <td>'.$row["date_redeemed"].'</td>
            </tr>
            ';
            $counter++; //increment counter by 1 on every pass
      }
    }
    else{
        $html .= '
        <tr>
          <td style="width:100%;color:red;">No Data Found !!</td>
        </tr>
        ';
  
    }

      // Generate from database

$html .="</table>";
$html .= '<p style="text-align:center; font-size:8px; color:purple;"> This Report Shows Points Reedemal Activity as Done by the Respective System Users. </p>
			';
$pdf->Ln(12);
$pdf->writeHTML($html);
$title = "Points Redeem Report";
 $pdf->SetTitle($title);
ob_end_clean();
$pdf->Output("Points.pdf"); //rename your file generated here


    



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
                               <!-- Alerts Go Here -->
                                <!-- Alert Box for No Report Data -->
                                <?php if ($_GET['failure']) { ?>
                                    <div class="alert alert-warning fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['failure']) ?></strong>
                                    </div>
                                <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
				<!-- NUTRITIONIST DATA -->

                <?php
                                    
                include 'includes/database.php';
                    $result = mysqli_query($con,"SELECT * FROM sensational_employees");
                ?>
                
				<div class="row" style="margin-left: auto;margin-right:auto;max-width:600px;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                                    <form method="post">
                                        <label class="dash-widget-info text-right">Search Box:</label>
                                        <input class="form-control" name="employeecode" id="employeecode" style="margin-left:auto;margin-right:auto;margin-bottom:18px;" placeholder="Search Employee Code..." required>
                                                        <datalist id="ecode">
                                                                <?php while($row = mysqli_fetch_array($result)):; ?>
                                                                <option type="optgroup" value="<?= $row['code'] ?>"><?= $row['name'] ?></option>
                                                                <?php endwhile;?> 
                                                        </datalist> 
                                        <input type="submit" class="btn btn-outline-primary take-btn" style="float: right;" value="Show Report" name="submit">
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
