<?php
require_once('lib/function.php');
$db     =   new class_functions();
    
$flag   =   0;
   $res_edit_id="";
    if(isset($_GET['edit_id']))
   {
      $res_edit_id =  $_GET['edit_id'];
      $_SESSION['edit_id'] =  $res_edit_id;
   }
   else if(isset($_SESSION['edit_id']))
   {
      $res_edit_id =  $_SESSION['edit_id'];
   }
   
    
    if (isset($_POST['submit'])) 
   {
        $full_name                          = $_POST['full_name'];
        $mobille_no                         = $_POST['mobile_no'];
        $specialist                         = $_POST['specialist'];
        $doctor_name                        = $_POST['doctor_name'];
        $appointment_date                   = $_POST['appointment_date'];
        $appointment_time                   = $_POST['appointment_time'];
        $reconsulation                      = $_POST['reconsultation'];
        $message                            = $_POST['message'];    


      if($db->update_appointment_details($full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$res_edit_id))
      {
         $flag =1;
      }
   }

$users_data = array();
$users_data = $db->get_appointment_details($res_edit_id);
//print_r($users_data);
if(!empty($users_data))
{
        $res_id                             = $users_data['id'];
        $full_name                          = $users_data['full_name'];
        $mobille_no                         = $users_data['mobile_no'];
        $specialist                         = $users_data['specialist'];
        $doctor_name                        = $users_data['doctor_name'];
        $appointment_date                   = $users_data['appointment_date'];
        $appointment_time                   = $users_data['appointment_time'];
        $reconsulation                      = $users_data['reconsultation'];
        $message                            = $users_data['message'];  

}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Health Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
                if($flag ==1)
                {
            ?>
                
                    <script type="text/javascript">
                        alert(" Appointment Updated Successfully"); 
                       window.location="appoinment-report.php"              
                    </script>
                    
            <?php
                }
            ?>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


 

    <!-- Navbar Start -->
    <?php
   require_once('header.php'); 
   ?>




    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Edit Appointment</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Edit Appointment</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Appointment Start -->
        <div class="container" style="margin-right: 900px;">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                   
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4"> Edit Appointment </h1>
                        <form action="edit-appointment.php" method="post">
                            <div class="row g-3">
                                 <!-- -->
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Full Name" style="height: 55px; " name="full_name" value="<?php echo $full_name; ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control bg-light border-0" placeholder="Your Mobile Number" style="height: 55px;" name="mobile_no" value="<?php echo $mobille_no; ?>">
                                </div>
                                <div class="col-12 col-sm-6">

                                  <input type="text" class="form-control bg-light border-0" placeholder="Enter Dieses" style="height: 55px; " name="specialist" value="<?php echo $specialist; ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <select name="doctor_name" class="form-select bg-light border-0" style="height: 55px;" value="<?php echo $doctor_name; ?>" >
                                      
                                          <option value="Select Doctor"> Select Doctor </option>
                                              <?php
                                              $data = array();
                                              $data = $db->get_all_doctor_details();
                                              $counter = 1;
                                              if(!empty($data))
                                              {
                                                foreach($data as $record)
                                                {
                                                  $res_id       = $record[0];
                                                  $d_name = $record[1];      
                                                $specialist      =  $record[4];
                                        ?>
                                            <option value="<?php echo $res_id; ?>"><?php echo $d_name." - ".$specialist; ?></option>
                                            <?php
                                                }
                                              }
                                            ?>
                    
                                          </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div  id="date1" >
                                        <input type="date" 
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" name="appointment_date" value="<?php echo $appointment_date; ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Time" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;" name="appointment_time" value="<?php echo $appointment_time; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="reconsultation" value="<?php echo $reconsulation; ?>">  
                                        <option selected>Appointment Recunsultation 500/-</option>
                                        <option value="First cunsultation- 500/-">First cunsultation- 500/-</option>
                                        <option value="Pathalogy- 1000/-"<?php if($reconsulation=="Pathalogy- 1000/-"){?> selected <?php } ?>>Pathalogy- 1000/-</option>
                                        <option value="Advance 1- 2000/-"<?php if($reconsulation=="Advance 1- 2000/-"){?> selected <?php } ?>>Advance 1- 2000/-</option>
                                        <option value="Advance 2- 3000/-"<?php if($reconsulation=="Advance 2- 3000/-"){?> selected <?php } ?>>Advance 2- 3000/-</option>
                                    </select>
                                </div>
                                 <div class="col-12 col-sm-6">
                                     <textarea type="text" class="form-control bg-light border-0" placeholder="Message" style="height: 55px;" name="message"><?php echo $message; ?></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit" name="submit">Update Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    
<br>
<br>
    
    



    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>