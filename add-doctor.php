<?php
    require_once('lib/function.php');
    $db     =   new class_functions();
    
    $flag   =   0;
    
    
    $profile_photo = "";

    if(isset($_POST['submit']))
    {
        $d_name              = $_POST['d_name']; 
        $qualification       = $_POST['qualification'];
        $specialist          = $_POST['specialist'];
        $exp                 = $_POST['exp'];
        $profile_description = $_POST['profile_description'];
        $m_no                = $_POST['m_no'];
        $password            = $_POST['d_pass'];
        

function generateRandomString($length = 5) 
    {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) 
         {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         return $randomString;
      }
                  
      $valid_formats = array("jpg","png","gif","bmp","jpeg","pdf","mp4","JPEG","JPG","BMP","PNG","GIF","PDF","MP4");
      
      if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
      { 
         $name              =   $_FILES['profile_photo']['name'];
         $size              =   $_FILES['profile_photo']['size'];
      
         if(strlen($name))
            {               
               list($txt, $ext) = explode(".", $name);
               
               if(in_array($ext,$valid_formats))
               {
                  $current_random_string = generateRandomString();
                  
                  $profile_photo = $name."-".$current_random_string.".".strtolower($ext);
                  
                  $tmp = $_FILES['profile_photo']['tmp_name'];
                  
                  $img_Dir = "doctor_profiles/";
                  
                  if(!file_exists($img_Dir))
                  {
                     mkdir($img_Dir);
                  }
                  
                  if(move_uploaded_file($tmp,$img_Dir.$profile_photo))
                  {
                  }
                  else
                  {
                     $image_error   =   "failed" ;
                     $flag              =   1;
                  } 
               }
               else
               {
                  $image_error  = "Invalid file format";
                  $flag             =   1;  
               }    
            }   
        }
        
     
        if($db->add_doctor_details($d_name,$profile_photo,$qualification,$specialist,$exp,$profile_description ,$m_no,$password))
        {
            $flag = 1;
        }
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
                        alert(" Doctor Added Successfully");                    
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
                <h1 class="display-3 text-white animated zoomIn">Add Doctor</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Add Doctor</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
<style type="text/css">
    .label1

    {
        color: black;
        bottom: 10px;
    }
</style>

    <!-- Appointment Start -->
   <div class="container" style="margin-right:1000px">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Add Doctor</h1>
                        <form action="add-doctor.php" method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                 <!-- -->
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Doctor Name</label>
                                    <input type="text" class="form-control bg-light border-0" placeholder=" Enter Doctor Name" style="height: 55px; " name="d_name">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Doctor Mobile Number</label>
                                    <input type="number" class="form-control bg-light border-0" placeholder=" Enter Number" style="height: 55px; " name="m_no">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Password</label>
                                    <input type="password" class="form-control bg-light border-0" placeholder="Enter Password" style="height: 55px; " name="d_pass">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Profile Photo</label>
                                    <input type="file" class="form-control bg-light border-0" style="width:100%; height:auto;" placeholder=" Enter Profile Photo" style="height: 55px;" name="profile_photo">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Qualification</label>
                                   <input type="text" class="form-control bg-light border-0" placeholder="Enter Qualification" style="height: 55px;" name="qualification">
                                  
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1">Specialist</label>
                                   <input type="text" class="form-control bg-light border-0" placeholder=" Enter Specialist" style="height: 55px;" name="specialist">
                                  
                                </div>
                                 
                             <div class="col-12 col-sm-6">
                                <label for="full-name" class="label1">Experience</label>
                                   <input type="text" class="form-control bg-light border-0" placeholder=" Enter Experience" style="height: 55px;" name="exp">
                                  
                                </div>
                            
                                <div class="col-12 col-sm-6">
                                     <label for="full-name" class="label1" style="width:100%;">Profile description</label>
                                   <input type="text" class="form-control bg-light border-0" placeholder=" Enter Profile description" style="height: 55px;" name="profile_description">
                                  
                                </div>
                                
                                
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit" name="submit">Add Doctor</button>
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
    <br>
    <br>
    <br>
    <br>

   


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