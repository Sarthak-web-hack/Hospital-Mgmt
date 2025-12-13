<?php
   require_once('lib/function.php');
   $db      =  new class_functions();
   
   $flag =  0;
   if(isset($_GET['delete_id']))
   {
      $delete_id  =  $_GET['delete_id'];
      
      if($db->delete_feedback_details($delete_id))
      {
         $flag =  3;
      }
   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .card-title
        {
            font-size: 35px;
        }
        .custom-table{

width: 100%;            margin-top: 30px;
        }
    .custom-table th,
    .custom-table td {
        transition: background-color 0.3s ease;
    }

    /* Hover effect for table cells */
    .custom-table th:hover,
    .custom-table td:hover 
    {
        background-color: #06A3DA; 
        color: white;
    }
    .custom-table th
    {text-align: center;
        color: black;
        background-color: #06A3DA;
    }
    .custom-table td {
        border-color: white; /* Border color */
        padding: 8px; /* Padding for content */
        text-align: center; /* Center align content */
    }
    </style>
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
                        alert(" Appointment Book Successfully");                    
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
                <h1 class="display-3 text-white animated zoomIn">Feedback Report</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Feedback Report</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


  <div class="card-header d-flex justify-content-between flex-wrap" >
                <div class="header-title">
                    <h4 class="card-title mb-0">Feedback Report</h4>
                </div>
            
           <div class="custom-table  ">
    <table class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>User Name</th>
                <th>Mobile Number</th>
                <th>Message</th>
                <th>Date</th>
                <th>Time</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
                        <tbody>
                     <?php
                        $groups_data   =  array();
                        $groups_data   =  $db->get_all_feedback_details();
                        $counter = 1;
                        if(!empty($groups_data))
                        {
                           foreach($groups_data as $record)
                           {
                              $res_id            =  $record[0];
                              $u_name            =  $record[1];
                              $mobile            =  $record[2];
                              $message           =  $record[3];
                              $date              =  $record[4];
                              $time              =  $record[5];
                             
                     ?>
                            <tr class="">
                        <td class=""><?php echo $counter++; ?></td>
                                
                        <td class=""><?php echo $u_name; ?></td>
                        <td class=""><?php echo $mobile; ?></td>


                        <td class=""><?php echo $message; ?></td>
                       
                        
                        
                        <td class=""><?php echo $date; ?></td>
                        <td class=""><?php echo $time; ?></td>
                        
                  

                                
                                <td class="text-center">
                                    <a class="btn btn-sm btn-icon text-danger "  data-bs-toggle="tooltip" title="Delete User" onclick="return confirm('Are You Sure To Delete?');" href="<?php echo $_SERVER['PHP_SELF']."?delete_id=".$res_id; ?>">
                                            <span class="btn-inner">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </a>
                                </td>
                            </tr>
                     
                     <?php
                           }
                        }
                     ?>
                  </tbody>
                    </table>
                  
                </div>
            </div>
   </div>
</div>
</div>

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