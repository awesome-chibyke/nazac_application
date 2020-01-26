<?php

$query = $this->db->get_where($this->nazac_clients, array('nazac_client_email' => $_POST["email"]));
		 if($query->num_rows()>0){
			 print  json_encode(array("error"=>'Email address already exists! Try something new.'));
		  }else{

		  $query = $this->db->get_where($this->nazac_clients, array('nazac_clients_regno' => $_POST["regno"]));
		  if($query->num_rows()>0){
			 print  json_encode(array("error"=>'Student Registration Number already exists!'));
		  }else{

		  if($_POST["pass"]!=$_POST["cpass"]){
				print  json_encode(array("error"=>'Password does not match!'));
			}else{
			  
		  if(strlen($_POST["pass"])<8 || strlen($_POST["pass"])>36){
				 print  json_encode(array("error"=>'Password length must be between 8 - 36 characters!'));
			 }else{

			$avatar = 'avatar.png';
			$u_id = $this->nazacIdGenerator();				 
		 $data = array(
			 "id" => null,
			 "nazac_id" => trim($u_id),
			 "nazac_clients_rin" => '',
			 "nazac_clients_has_roommy" => '',
			 "nazac_clients_roommy_rin" => '',
			 "nazac_clients_regno" => trim(strtoupper(strtolower($_POST["regno"]))),
			 "nazac_clients_fname" => ucfirst(trim(strtolower($_POST["fname"]))),
			 "nazac_clients_lname" => ucfirst(trim(strtolower($_POST["lname"]))),
			 "nazac_client_email" => trim(strtolower($_POST["email"])),
			 "nazac_client_phone" => '',
			 "nazac_client_gender" => '',
			 "nazac_client_passport" => $avatar,
			 "nazac_client_home_address" => '',
			 "nazac_client_nationality" => '',
			 "nazac_client_state_of_origin" => '',
			 "nazac_client_lga" => '',
			 "nazac_client_password" => $this->passwordHash($this->agorithm,$_POST["pass"]),
			 "nazac_client_kins_name" => '',
			 "nazac_client_kins_email" => '',
			 "nazac_client_kins_phone" => '',
			 "nazac_client_kins_address" => '',
			 "nazac_client_kins_relationship" => '',
			 "nazac_client_account_verification" => 'no',
			 "nazac_block_client_account" => '',
			 "nazac_block_client_account_counter" => 0,
			 "nazac_block_client_account_reason" => '',
			 "nazac_client_email_confirmation" => 'no',
			 "nazac_client_forgot_password_code" => $this->randGenerator(),
			 "nazac_client_role" => 'client',
			 "nazac_account_delete_status" => 'no',
			 "nazac_account_last_update" => $this->getDate(),
			 "nazac_date_account_created" => $this->getDate()
		 );
						
		   if($insert = $this->db->insert($this->nazac_clients, $data)){
			   $info = array("success"=>'Hi '.$_POST["fname"].', your registration was successful. We have sent you a mail. Proceed to activate your account, then login to access your account. Thanks',"returndata"=>$data);
			   print  json_encode($info);
		   }else{ 
			   print  json_encode(array("error"=>'Hi '.$_POST["fname"].', your registration failed! Please try again and ensure you enter all fields correctly. Thanks'));
		   } 
				  }
				 }
				}
	           }

?>