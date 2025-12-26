<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include ('assets/inc/head.php');?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php');?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php");?>
        <!-- Left Sidebar End -->

       
        <?php
                $acc_number=$_GET['acc_number'];
                $ret="SELECT  * FROM his_accounts WHERE acc_number = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$acc_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reporting</a></li>
                                        <li class="breadcrumb-item active">Accounts</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo $row->acc_number;?> Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row">
                                    <!-- <div class="col-xl-5">

                                        <div class="tab-content pt-0"> -->

                                            <!-- <div class="tab-pane active show" id="product-1-item">
                                                <img src="assets/images/bank.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                            </div> -->

                                        </div>

               <div style="position: relative;">
                                        
                                        <?php
$accType = strtolower($row->acc_type);
$badgeText = ucfirst($accType); // Normalize to lowercase and capitalize
$badgeColor = ($accType === 'Payable') ? '#e53935' : '#43a047'; // Red for payable, green for receivable
?>

<div style="
    position: absolute;
    top: 10px;
    right: 15px;
    background-color: <?= $badgeColor ?>;
    color: white;
    /* font-weight: bold; */
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 14px;
     font-family: 'Poppins', sans-serif;
    z-index: 999;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
    <i class="fas fa-rupee-sign" style="margin-right: 6px;"></i> <?= $badgeText ?>
</div>
                         
                                    </div> <!-- end col -->
                                    <div class="col-xl-12">
                                        <div class="pl-xl-3 mt-3 mt-xl-0">
                                            <h2 class="mb-3">Account Number : <?php echo $row->acc_number;?></h2>
                                            <hr>
                                            <h4 class="text-danger"> Account Name : <?php echo $row->acc_name;?></h6>
                                                <hr>
                                                <h4 class="text-danger">Account Amount : ₹ <?php echo $row->acc_amount;?> </h6>
                                                    <hr>
                                                    <h4 class="text-danger">Account Type : <?php echo $row->acc_type;?> </h6>
                                                        <hr>
                                                        <h4 class="align-centre">Account Description</h6>
                                                            <hr>
                                                            <p class="text-muted mb-4">
                                                                <?php echo $row->acc_desc;?>
                                                            </p>
                                                             </div>
                                    </div> <!-- end col -->
                                </div>
                               

                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php');?>
            <!-- end Footer -->

        </div>
        <?php }?>

        


    </div>
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>