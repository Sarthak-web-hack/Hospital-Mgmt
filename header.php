 
<?php
   require_once('lib/function.php');
   $db      =  new class_functions();
   $flag =  0;
   if(!isset($_SESSION['login_d_name']))
{
    header("Location:admn_login.php");
}

?>

 <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"> User ID:<?php echo $_SESSION['login_d_name']; ?> </p>
                    </div>
                    <a href="admn_login.php?logout" class="btn btn-primary py-2 px-4 ms-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">

        <a href="dashboard.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary">Health Care</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" >
            <div class="navbar-nav ms-auto py-0" style="  ">
                <a href="dashboard.php" class="nav-item nav-link active">Home</a>
               
                <a href="add-doctor.php" class="nav-item nav-link">Add Doctor</a>

                         <a href="appoinment-report.php" class="nav-item nav-link" style="display: flex;">Appointment Report</a>
                          
                           <a href="lab-test-report.php" class="nav-item nav-link">Lab Test Report</a>
                           <a href="prescription.php" class="nav-item nav-link">Add Prescription</a>

                           <a href="prescription-report.php" class="nav-item nav-link"> Prescription Report</a>

                           <a href="Report-doctor.php" class="dnav-item nav-link"> Doctor Report</a>

                           <a href="feedback-form-report.php" class="nav-item nav-link"> Feedback Report</a>


                
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            
           
            
        </div> 
    </nav>
    <!-- Navbar End -->
