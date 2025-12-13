<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	
	class class_functions
	{
		private $con;
		
		function __construct()
		{
			$this->con	=	new mysqli("localhost","root","","clinic");
			//$this->con	=	new mysqli("localhost","bravemy8_yash_admin","JpWX^EpK_?lO","bravemy8_yash_developer_mis");
		}

		function insert_appointment_details($full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message)
		{
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("INSERT INTO `appoinment`(`full_name`, `mobile_no`, `specialist`, `doctor_name`, `appointment_date`, `appointment_time`, `reconsultation`, `messsage`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?)"))
			{
				$stmt_insert->bind_param("ssssssssss",$full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$date,$time);
				
				if($stmt_insert->execute())
				{
					return true;
				}
					return false;
			} 	
		}
		function get_all_appointment_details()
		{
			if($stmt_insert = $this->con->prepare("SELECT `id`, `full_name`, `mobile_no`, `specialist`, `doctor_name`, `appointment_date`, `appointment_time`, `reconsultation`, `messsage`, `date`, `time` FROM `appoinment`  "))
			{	
				$stmt_insert->bind_result($res_id,$full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$date,$time);
				
				if($stmt_insert->execute())
				{
					$counter	=	0;
					$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$res_id;
						$details[$counter][1]	=	$full_name;
						$details[$counter][2]	=	$mobille_no;
						$details[$counter][3]	=	$specialist;
						$details[$counter][4]	=	$doctor_name;
						$details[$counter][5]	=	$appointment_date;
						$details[$counter][6]	=	$appointment_time;
						$details[$counter][7]	=	$reconsulation;
						$details[$counter][8]	=	$message;
						$details[$counter][9]	=	$date;
						$details[$counter][10]	=	$time;
					
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function delete_Appointment_details($delete_id)
		{
			if($stmt_select = $this->con->prepare("DELETE FROM `appoinment` WHERE `id`=?"))
			{
				$stmt_select->bind_param("i",$delete_id);
			
				if($stmt_select->execute())
				{					
						return true;
				}
					return false;
			}
		}
		function update_appointment_details($full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$res_edit_id)
		{ 
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("UPDATE `appoinment` SET `full_name`=?,`mobile_no`=?,`specialist`=?,`doctor_name`=?,`appointment_date`=?,`appointment_time`=?,`reconsultation`=?,`messsage`=?,`date`=?,`time`=? WHERE  `id`=?"))
			{ 
				$stmt_insert->bind_param("ssssssssssi",$full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$date,$time,$res_edit_id);
				
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			} 	
		}
		function get_appointment_details($res_edit_id)
		{ 
        if($stmt = $this->con->prepare("SELECT `id`, `full_name`, `mobile_no`, `specialist`, `doctor_name`, `appointment_date`, `appointment_time`, `reconsultation`, `messsage`, `date`, `time` FROM `appoinment` WHERE `id`=?"))
		{
            $stmt->bind_param("i",$res_edit_id);
            $stmt->bind_result($res_id,$full_name,$mobille_no,$specialist,$doctor_name,$appointment_date,$appointment_time,$reconsulation,$message,$date,$time);
				
			if($stmt->execute())
			{
				$users_data = array();
				$counter = 0; 
			}
			while($stmt->fetch())
			{ 
            $users_data['id'] 						= $res_id;
			$users_data['full_name'] 				= $full_name;
			$users_data['mobile_no'] 				= $mobille_no;
			$users_data['specialist'] 				= $specialist;
			$users_data['doctor_name'] 				= $doctor_name;
			$users_data['appointment_date'] 		= $appointment_date;
			$users_data['appointment_time'] 		= $appointment_time;
			$users_data['reconsultation'] 			= $reconsulation;
			$users_data['message'] 					= $message;	
			$users_data['date']						= $date;
			$users_data['time'] 					= $time;
            }
                if(!empty($users_data))
				{
                    return $users_data;
                }
                else
				{
                    return false;
                }
        }
    }
    function insert_lab_test_details($p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule)
		{
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("INSERT INTO `lab_test`(`p_name`, `mobile_no`, `address`, `lab_test_names`, `exp_date`, `schedule`, `date`, `time`) VALUES (?,?,?,?,?,?,?,?)"))
			{
				$stmt_insert->bind_param("ssssssss",$p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule,$date,$time);
				
				if($stmt_insert->execute())
				{
					return true;
				}
					return false;
			} 	
		}
	function get_all_lab_test_details()
		{
			if($stmt_insert = $this->con->prepare("SELECT  `id`, `p_name`, `mobile_no`, `address`, `lab_test_names`, `exp_date`, `schedule`, `date`, `time` FROM `lab_test` "))
			{	
				$stmt_insert->bind_result($res_id,$p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule,$date,$time);
				
				if($stmt_insert->execute())
				{
					$counter	=	0;
					$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$res_id;
						$details[$counter][1]	=	$p_name;
						$details[$counter][2]	=	$mobille_no;
						$details[$counter][3]	=	$address;
						$details[$counter][4]	=	$lab_test_names;
						$details[$counter][5]	=	$exp_date;
						$details[$counter][6]	=	$schedule;
						$details[$counter][7]	=	$date;
						$details[$counter][8]	=	$time;
					
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function delete_lab_test_report_details($delete_id)
		{
			if($stmt_select = $this->con->prepare("DELETE FROM `lab_test` WHERE `id`=?"))
			{
				$stmt_select->bind_param("i",$delete_id);
			
				if($stmt_select->execute())
				{					
						return true;
				}
					return false;
			}
		}
		function update_lab_test_details($p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule,$res_edit_id)
		{ 
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("UPDATE `lab_test` SET `p_name`=?,`mobile_no`=?,`address`=?,`lab_test_names`=?,`exp_date`=?,`schedule`=?,`date`=?,`time`=? WHERE `id`=?"))
			{ 
				$stmt_insert->bind_param("ssssssssi",$p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule,$date,$time,$res_edit_id);
				
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			} 	
		}
		function get_lab_test_inedit_details($res_edit_id)
		{ 
        if($stmt = $this->con->prepare("SELECT `id`, `p_name`, `mobile_no`, `address`, `lab_test_names`, `exp_date`, `schedule`, `date`, `time` FROM `lab_test` WHERE `id`=?"))
		{
            $stmt->bind_param("i",$res_edit_id);
            $stmt->bind_result($res_id,$p_name,$mobille_no,$address,$lab_test_names,$exp_date,$schedule,$date,$time);
				
			if($stmt->execute())
			{
				$users_data = array();
				$counter = 0; 
			}
			while($stmt->fetch())
			{ 
            $users_data['id'] 						= $res_id;
			$users_data['p_name'] 					= $p_name;
			$users_data['mobile_no'] 				= $mobille_no;
			$users_data['address'] 					= $address;
			$users_data['lab_test_names'] 			= $lab_test_names;
			$users_data['exp_date'] 				= $exp_date;
			$users_data['schedule'] 				= $schedule;
			$users_data['date']						= $date;
			$users_data['time'] 					= $time;
            }
                if(!empty($users_data))
				{
                    return $users_data;
                }
                else
				{
                    return false;
                }
        }
    }
    function add_hospital_details($p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$current_login_id)
		{
			$date = date("Y-m-d");
			$time = date("H-i-s A");
						
			if($stmt_insert = $this->con->prepare("INSERT INTO `hospital_management`(`p_name`, `mobile_no`, `address`, `issue`, `dob`, `m_name`, `m_quantity`, `pils1`, `pils2`, `pils3`, `pils`,`mobile_nu` ,`date`, `time`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{ 
				$stmt_insert->bind_param("ssssssssssssss",$p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$current_login_id,$date,$time);
				
				if($stmt_insert->execute())
				{ 
					return true;		
				} 
				return false;
			} 	
		}
		function get_all_hospital_management_details($current_login_id)
		{
			if($stmt_insert = $this->con->prepare("SELECT `id`, `p_name`, `mobile_no`, `address`, `issue`, `dob`, `m_name`, `m_quantity`, `pils1`, `pils2`, `pils3`, `pils`, `mobile_nu`,`date`, `time` FROM `hospital_management` WHERE `mobile_nu`=?	 "))
			{	
				$stmt_insert->bind_param("s",$current_login_id);

				$stmt_insert->bind_result($res_id,$p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$current_login_id,$date,$time);
				
				if($stmt_insert->execute())
				{
					$counter	=	0;
					$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$res_id;
						$details[$counter][1]	=	$p_name;
						$details[$counter][2]	=	$mobille_no;
						$details[$counter][3]	=	$address;
						$details[$counter][4]	=	$issue;
						$details[$counter][5]	=	$dob;
						$details[$counter][6]	=	$m_name;
						$details[$counter][7]	=	$m_quantity;
						$details[$counter][8]	=	$pils1;
						$details[$counter][9]	=	$pils2;
						$details[$counter][10]	=	$pils3;
						$details[$counter][11]	=	$pills_time;

						$details[$counter][12]	=	$current_login_id;
						$details[$counter][14]	=	$date;
						$details[$counter][15]	=	$time;

					
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function delete_hospital_management_details($delete_id)
		{
			if($stmt_select = $this->con->prepare("DELETE FROM `hospital_management` WHERE `id`=?"))
			{
				$stmt_select->bind_param("i",$delete_id);
			
				if($stmt_select->execute())
				{					
						return true;
				}
					return false;
			}
		}
		function update_hospital_management_details($p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$res_edit_id)
		{ 
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("UPDATE `hospital_management` SET `p_name`=?,`mobile_no`=?,`address`=?,`issue`=?,`dob`=?,`m_name`=?,`m_quantity`=?,`pils1`=?,`pils2`=?,`pils3`=?,`pils`=?,`date`=?,`time`=? WHERE `id`=?"))
			{ 
				$stmt_insert->bind_param("sssssssssssssi",$p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$date,$time,$res_edit_id);
				
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			} 	
		}
		function get_hospital_management_details($res_edit_id)
		{ 
        if($stmt = $this->con->prepare("SELECT  `id`, `p_name`, `mobile_no`, `address`, `issue`, `dob`, `m_name`, `m_quantity`, `pils1`, `pils2`, `pils3`, `pils`,`date`, `time` FROM `hospital_management` WHERE  `id`=?"))
		{
            $stmt->bind_param("i",$res_edit_id);
            $stmt->bind_result($res_id,$p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pills_time,$date,$time);
				
			if($stmt->execute())
			{
				$users_data = array();
				$counter = 0;
			}
			while($stmt->fetch())
			{ 
            $users_data['id'] 					= $res_id;
			$users_data['p_name'] 				= $p_name;
			$users_data['mobile_no'] 			= $mobille_no;
			$users_data['address'] 				= $address;
			$users_data['issue'] 				= $issue;
			$users_data['dob'] 					= $dob;
			$users_data['m_name'] 				= $m_name;
			$users_data['m_quantity'] 			= $m_quantity;
			$users_data['pils1'] 				= $pils1;
			$users_data['pils2'] 				= $pils2;
			$users_data['pils3'] 				= $pils3;
			$users_data['pils']					= $pills_time;
			$users_data['date']					= $date;
			$users_data['time'] 				= $time;
            }
                if(!empty($users_data))
				{
                    return $users_data;
                }
                else
				{
                    return false;
                }
        }
    }
    function get_doctor_title_from_project_id($current_login_id)
		{
			if($stmt_select = $this->con->prepare("SELECT `m_no` from `add_doctor` where `id`=?"))
			{
				$stmt_select->bind_param("s",$current_login_id);
			
				$stmt_select->bind_result($result_name);
			
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_name;
					}
				}
				return false;
			}
		}

    function add_doctor_details($d_name,$profile_photo,$qualification,$specialist,$exp,$profile_description,$m_no,$password )
		{
			$date = date("Y-m-d");
			$time = date("H-i-s A");
						
			if($stmt_insert = $this->con->prepare("INSERT INTO `add_doctor`( `d_name`, `profile_photo`, `qualification`, `specialist`, `exp`, `profile_description`,`m_no`,`pass`,`date`,`time`) VALUES (?,?,?,?,?,?,?,?,?,?)"))
			{ 
				$stmt_insert->bind_param("ssssssssss",$d_name,$profile_photo,$qualification,$specialist,$exp,$profile_description,$m_no,$password,$date,$time);
				
				if($stmt_insert->execute())
				{ 
					return true;
				} 
				return false;
			} 	
		}
		function get_all_doctor_details()
		{
			if($stmt_insert = $this->con->prepare("SELECT `id`, `d_name`, `profile_photo`, `qualification`, `specialist`, `exp`, `profile_description`, `m_no`,`pass`, `date`, `time` FROM `add_doctor` "))
			{	
				$stmt_insert->bind_result($res_id,$d_name,$profile_photo,$qualification,$specialist,$exp,$profile_description,$m_no,$password,$date,$time);
				
				if($stmt_insert->execute())
				{
					$counter	=	0;
					$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$res_id;
						$details[$counter][1]	=	$d_name;
						$details[$counter][2]	=	$profile_photo;
						$details[$counter][3]	=	$qualification;
						$details[$counter][4]	=	$specialist;
						$details[$counter][5]	=	$exp;
						$details[$counter][6]	=	$profile_description;
						$details[$counter][7]	=	$m_no;
						$details[$counter][8]	=	$password;
						$details[$counter][9]	=	$date;
						$details[$counter][10]	=	$time;
					
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function delete_doctor_details($delete_id)
		{
			if($stmt_select = $this->con->prepare("DELETE FROM `add_doctor` WHERE `id`=?"))
			{
				$stmt_select->bind_param("i",$delete_id);
			
				if($stmt_select->execute())
				{					
						return true;
				}
					return false;
			}
		}
		function update_doctor_details($d_name,$qualification,$specialist,$exp,$profile_description,$res_edit_id)
		{ 
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("UPDATE `add_doctor` SET `d_name`=?,`qualification`=?,`specialist`=?,`exp`=?,`profile_description`=?,`date`=?,`time`=? WHERE `id`=?"))
			{ 
				$stmt_insert->bind_param("sssssssi",$d_name,$qualification,$specialist,$exp,$profile_description,$date,$time,$res_edit_id);
				
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			} 	
		}
		function get_doctor_details($res_edit_id)
		{ 
        if($stmt = $this->con->prepare("SELECT `id`, `d_name`, `profile_photo`, `qualification`, `specialist`, `exp`, `profile_description`,`m_no`, `date`, `time` FROM `add_doctor` WHERE  `id`=?"))
		{
            $stmt->bind_param("i",$res_edit_id);
            $stmt->bind_result($res_id,$d_name,$profile_photo,$qualification,$specialist,$exp,$profile_description,$m_no,$date,$time);
				
			if($stmt->execute())
			{
				$users_data = array();
				$counter = 0;
			}
			while($stmt->fetch())
			{ 
            $users_data['id'] 					= $res_id;
			$users_data['d_name'] 				= $d_name;
			$users_data['profile_photo'] 		= $profile_photo;
			$users_data['qualification'] 		= $qualification;
			$users_data['specialist'] 			= $specialist;
			$users_data['exp'] 					= $exp;
			$users_data['profile_description'] 	= $profile_description;
			
			$users_data['m_no']					= $m_no;
			$users_data['date']					= $date;
			$users_data['time'] 				= $time;
            }
                if(!empty($users_data))
				{
                    return $users_data;
                }
                else
				{
                    return false;
                }
        }
    }
    function insert_feedback_details($u_name,$mobile,$message)
		{
			$date = date("Y-m-d");
			$time = date("H-i-s A");
			
			if($stmt_insert = $this->con->prepare("INSERT INTO `feedback_details`(`u_name`, `mobile`, `message`, `date`, `time`) VALUES (?,?,?,?,?)"))
			{
				$stmt_insert->bind_param("sssss",$u_name,$mobile,$message,$date,$time);
				
				if($stmt_insert->execute())
				{
					return true;
				}
					return false;
			} 	
		}
		function get_all_feedback_details()
		{
			if($stmt_insert = $this->con->prepare("SELECT `id`, `u_name`, `mobile`, `message`, `date`, `time` FROM `feedback_details`  "))
			{	
				$stmt_insert->bind_result($res_id,$u_name,$mobile,$message,$date,$time);
				
				if($stmt_insert->execute())
				{
					$counter	=	0;
					$details	=	array();
					while($stmt_insert->fetch())
					{
						$details[$counter][0]	=	$res_id;
						$details[$counter][1]	=	$u_name;
						$details[$counter][2]	=	$mobile;
						$details[$counter][3]	=	$message;
						$details[$counter][4]	=	$date;
						$details[$counter][5]	=	$time;
					
						$counter++;
					}
					if(!empty($details))	
					{
						return $details;
					}
					return false;
				}	
			}
		}
		function delete_feedback_details($delete_id)
		{
			if($stmt_select = $this->con->prepare("DELETE FROM `feedback_details` WHERE `id`=?"))
			{
				$stmt_select->bind_param("i",$delete_id);
			
				if($stmt_select->execute())
				{					
						return true;
				}
					return false;
			}
		}

		function get_doctor_name_from_table($doctor_name)
		{
			if($stmt_select = $this->con->prepare("SELECT `d_name` from `add_doctor` where `id` =?"))
			{
				$stmt_select->bind_param("s",$doctor_name);
			
				$stmt_select->bind_result($result_name);
			
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_name;
					}
				}
				return false;
			}
		
		}


		function get_prescription_details($res_edit_id)
		{ 
        if($stmt = $this->con->prepare("SELECT `id`, `p_name`, `mobile_no`, `address`, `issue`, `dob`, `m_name`, `m_quantity`, `pils1`, `pils2`, `pils3`, `pils`, `date`, `time` FROM `hospital_management` WHERE `id`=?"))
		{
            $stmt->bind_param("i",$res_edit_id);
            $stmt->bind_result($res_id,$p_name,$mobille_no,$address,$issue,$dob,$m_name,$m_quantity,$pils1,$pils2,$pils3,$pils_time,$date,$time);
				
			if($stmt->execute())
			{
				$users_data = array();
				$counter = 0;
			}
			while($stmt->fetch())
			{ 
						$users_data['id']			=	$res_id;
						$users_data['p_name']		=	$p_name;
						$users_data['mobile_no']	=	$mobille_no;
						$users_data['address']		=	$address;
						$users_data['issue']		=	$issue;
						$users_data['dob']			=	$dob;
						$users_data['m_name']		=	$m_name;
						$users_data['m_quantity']	=	$m_quantity;
						$users_data['pils1']		=	$pils1;
						$users_data['pils2']		=	$pils2;
						$users_data['pils3']		=	$pils3;
						$users_data['pils']			=	$pils_time;
						$users_data['date']			=	$date;
						$users_data['time']			=	$time;
            }
                if(!empty($users_data))
				{
                    return $users_data;
                }
                else
				{
                    return false;
                }
        }
    }


    function get_user_password($m_no)
        {
			if ($stmt = $this->con->prepare("SELECT `pass` from `add_doctor` where `m_no`=? "))
			{
				$stmt->bind_param("s",$m_no); 

                $stmt->bind_result($password);
				if ($stmt->execute()) 
				{
					if ($stmt->fetch()) 
					{
						return $password;
					}
					else{
						return false;
					}
				}
			}
         }


}//End of Class
?>