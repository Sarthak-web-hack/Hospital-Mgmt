<?php
   require_once('lib/function.php');
   $db      =  new class_functions();
   
   $flag =  0;
   
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

$users_data = array();
$users_data = $db->get_prescription_details($res_edit_id);
//print_r($users_data);
if(!empty($users_data))
{
        $res_id                     = $users_data['id'];
        $p_name                     = $users_data['p_name'];
        $mobille_no                 = $users_data['mobile_no'];
        $address                    = $users_data['address'];
        $issue                      = $users_data['issue'];
        $dob                        = $users_data['dob'];
        $m_name                     = $users_data['m_name'];
        $m_quantity                 = $users_data['m_quantity'];
        $pils1                      = $users_data['pils1'];      
        $pils2                      = $users_data['pils2'];     
        $pils3                      = $users_data['pils3'];     
        $pils_time                  = $users_data['pils'];
        $date                       = $users_data['date'];
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Health Care </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">

    	body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="page-content container">
<div class="page-header text-blue-d2">
<!--<h1 class="page-title text-secondary-d1">
Invoice
<small class="page-info">
<i class="fa fa-angle-double-right text-80"></i>
ID: #111-222
</small>
</h1>-->
<div class="page-tools">
<div class="action-buttons">

</div>
</div>
</div>
<div class="container px-0">
<div class="row mt-4">
<div class="col-12 col-lg-12">
<div class="row">
<div class="col-12">
<div class="text-center text-150">



<span class="text-600 text-110  text-blue align-middle">Health Care</span>
<div class="my-2"> <span class="text-600  text-90">Prescription</span>  </div>
</div>
</div>
</div>

<hr class="row brc-default-l1 mx-n1 mb-4" />
<div class="row">
<div class="col-sm-6">
<div>
<span class="text-sm text-grey-m2 align-middle">To:</span>

<label class="text-default-d3"  ><?php echo $p_name ?></label>
</div>
<div>
<span class="text-sm text-grey-m2 align-middle"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> Mobile Number:</span>

<label class="text-default-d3"  ><?php echo $mobille_no; ?></label>
</div>
<span class="text-sm text-grey-m2 align-middle">Isuue / Dieses:</span>

<label class="text-default-d3"  ><?php echo $issue; ?></label>
<div class="text-grey-m2">


</div>
</div>

<div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
<hr class="d-sm-none" />
<div class="text-grey-m2">
<div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
Invoice
</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Hospital Name:</span> Health Care </div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?php  echo $date;?></div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Address:</span> <?php echo $address; ?></span></div>
</div>
</div>

</div>
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-1">Sr.No</div>
<div class="col-9 col-sm-5">Medicine Name</div>
<div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
<div class="d-none d-sm-block col-sm-2">Time to Take Pils</div>
</div>
<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-1">1</div>
<div class="col-9 col-sm-5"><?php echo $m_name; ?></div>
<div class="d-none d-sm-block col-2"><?php echo $m_quantity ?></div>
<div class="d-none d-sm-block col-2 text-95"><?php echo $pils1."-".$pils2."-".$pils3; ?></div>
<div class="col-2 text-secondary-d2"></div>
</div>

</div>
</div>
<div class="row border-b-2 brc-default-l2"></div>


<div class="row mt-3">
<div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">

</div>
<div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
<div class="row my-2">
<!--<div class="col-7 text-right">
SubTotal
</div>
<div class="col-5">
<span class="text-120 text-secondary-d1">$2,250</span>
</div>-->
</div>
<div class="row my-2">
<!--<div class="col-7 text-right">
Tax (10%)
</div>
<div class="col-5">
<span class="text-110 text-secondary-d1">$225</span>
</div>-->
</div>
<div class="row my-2 align-items-center bgc-primary-l3 p-2">

<div class="col-5">
<span class="text-150 text-success-d3 opacity-2"></span>
</div>
</div>
</div>
</div>
<hr/>
<div>
<span class="text-secondary-d1 text-105">Thank you for Visiting... Health Care</span>
<a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" onclick="window.print()">Print</a>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>