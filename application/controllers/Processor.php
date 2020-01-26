<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Processor extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('dbmodel');
		$this->load->library('lib');	
	}
	
	public function siteDetails($item){
		$siteDetail = $this->dbmodel->getSiteDetails();
		return $siteDetail[$item];
	}
	

	public function register(){
		header("Content-Type: application/json; charset=UTF-8");
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$pass = $this->input->post('pass');
		$cpass = $this->input->post('cpass');
		$sex = $this->input->post('sex');
		$phone = $this->input->post('phone');
		$ac_type = $this->input->post('ac_type');
		if($sex=='Male'){$avatar = 'avatarm.png';}else{$avatar = 'avatarf.png';}
		$u_id = $this->lib->nazacIdGenerator();
		$hashPot = $this->lib->passwordHash($this->lib->algorithm,$email);
		$hashPass = $this->lib->passwordHash($this->lib->algorithm,$pass);
		
		if(isset($_POST["regbox"])){	if(!empty($email)&&!empty($fname)&&!empty($lname)&&!empty($sex)&&!empty($phone)&&!empty($pass)&&!empty($cpass)&&!empty($ac_type)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				if($pass!=$pass){
					print json_encode(array("error"=>'Password does not match!'));
				}else{
					if(strlen($pass)<8 || strlen($pass)>36){
				 		print json_encode(array("error"=>'Password length must be between 8 - 36 characters!'));
			 		}else{
						
						$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_client_email' => $email));
						if($query->num_rows()>0){
							 print  json_encode(array("error"=>'Email address already exists! Try something new.'));
						}else{
								
								$data = array(
									 "id" => null,
									 "nazac_id" => trim($u_id),
									 "nazac_clients_rin" => "",
									 "nazac_clients_has_roommy" => "",
									 "nazac_clients_roommy_rin" => "",
									 "nazac_clients_regno" => "",
									 "nazac_client_department" => "",
									 "nazac_clients_fname" => ucfirst(trim(strtolower($fname))),
									 "nazac_clients_lname" => ucfirst(trim(strtolower($lname))),
									 "nazac_client_email" => trim(strtolower($email)),
									 "nazac_client_phone" => trim($phone),
									 "nazac_client_gender" => $sex,
									 "nazac_client_passport" => $avatar,
									 "nazac_client_home_address" => "",
									 "nazac_client_nationality" => "",
									 "nazac_client_state_of_origin" => "",
									 "nazac_client_lga" => "",
									 "nazac_client_password" => $hashPass,
									 "nazac_clients_hashpost" => $hashPot,
									 "nazac_client_kins_name" => "",
									 "nazac_client_kins_email" => "",
									 "nazac_client_kins_phone" => "",
									 "nazac_client_kins_address" => "",
									 "nazac_client_kins_relationship" => "",
									 "nazac_client_account_verification" => "no",
									 "nazac_client_verification_document" => "",
									 "nazac_block_client_account" => "no",
									 "nazac_block_client_account_counter" => 0,
									 "nazac_block_client_account_reason" => "",
									 "nazac_client_email_confirmation" => "no",
									 "nazac_client_forgot_password_code" => $this->lib->randGenerator(),
									 "nazac_client_role" => strtolower($ac_type),
									 "nazac_account_delete_status" => "no",
									 "nazac_account_last_update" => $this->lib->getDate(),
									 "nazac_date_account_created" => $this->lib->getDate(),
									 "nazac_client_verification_front_id" => "front.png",
									 "nazac_client_verification_back_id" => "back.png",
									 "nazac_client_verification_ac_name" => "",
									 "nazac_client_verification_ac_nom" => "",
									 "nazac_client_verification_bank_name" => "",
									 "nazac_client_admission_proof" => "admission-proof.png",
									 "nazac_client_whatsapp_number" => "",
									 "nazac_client_facebook_handel" => "",
									 "nazac_client_twitter_handel" => "",
									 "nazac_client_instagram_handel" => "",
									 "nazac_agents_description" => "",
									 "nazac_client_faculty" => "",
									 "nazac_agent_based_location" => ""
								 );
							
								 if($insert = $this->db->insert($this->lib->nazac_clients, $data)){
									
								   	$info = array("success"=>'Hi '.$fname.', your registration was successful. We have sent you a mail. Proceed to activate your account, then login to access your account. Thanks',"returndata"=>$data);
								   	print  json_encode($info);
									$this->session->set_flashdata($info);
									 //Email Processing
									$to_email = $email;
									$from_email = $this->siteDetails('email3');
								    $siteName = $this->siteDetails('site_name');
									$subject = $this->siteDetails('site_name').' Registration/Email Activation';
									$message = '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$this->siteDetails('site_name').'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3><span><img src="'.base_url().'resource/img/logo.jpg" width="80" height="80"/></span> '.$this->siteDetails('site_name').' Registration/Email Activation Center</h3><p>Hi '.$fname.'</p><p>Thank you for signing up with '.$this->siteDetails('site_name').', your registration was successful and we are glad to have you here.</p><p>Please you just have one more step to take to complete your registation. Kindly follow the link below to <a href="'.base_url().'users/user/email-activation/'.$hashPot.'/'.$hashPass.'">activate your email</a>. Thanks.</p><p><a href="'.base_url().'users/user/email-activation/'.$hashPot.'/'.$hashPass.'">Follow Link</a></p><p>Having issues? Please contact us:</p><p>Email: '.$this->siteDetails('email3').'</p></div></body></html>';
									$this->lib->sendBasicMail($to_email,$from_email,$siteName,$subject,$message);
									 
								 }else{ 
								   	print  json_encode(array("error"=>'Hi '.$fname.', your registration failed! Please try again and ensure you enter all fields correctly. Thanks'));
							   	 } 
							
						}//email_exist_validation
						
					}
				}
			}else{
				print json_encode(array("error"=>'Please use a valid email address!'));
			}
		}else{
			print json_encode(array("error"=>'Please fill all necessary fields!'));
		}
		}	
	}
	
	
	public function passport_update(){
		if(isset($_POST["crop_image"])){
			$nazac_id = $this->input->post('nazac_id');
			$data = $this->input->post('crop_image');
			$gen_Num = $this->lib->randGenerator();
			$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id'=>$nazac_id));
			$row = $query->row_array();
			$passportIn = $row['nazac_client_passport'];
			$image_array_1 = explode(";", $data);
			$image_array_2 = explode(",", $image_array_1[1]);
			$data = base64_decode($image_array_2[1]);
			$fileName = $gen_Num.uniqid().time().'.jpg';
			$imageName = './resource/upload/'.$fileName;
			if(file_put_contents($imageName, $data)){
				if($passportIn=='avatar.png' || $passportIn=='avatarm.png' || $passportIn=='avatarf.png'){}else{
					$this->lib->unlinkFile($passportIn,'./resource/upload/');
				  }
				$src = base_url().'resource/upload/'.$fileName;
				$data = array(
				  "nazac_client_passport"=> $fileName
					);
				if($this->db->update($this->lib->nazac_clients, $data, array("nazac_id"=>$nazac_id))){
					print json_encode(array('success'=>'File upload was successful!', "src"=>$src));
				  }else{print json_encode(array('error'=>'Upload faild! Try again.'));}
				
			}else{print json_encode(array('error'=>'File faild to upload. Try again'));}
			
			}else{print json_encode(array('error'=>'File faild to upload. Try again'));}
	  }
  

	
	public function verifyAccount(){
		header("Content-Type: application/json; charset=UTF-8");
		$doc_verify_type = $this->input->post('doc_verify_type');
		$acname = ucwords(strtolower(trim($this->input->post('acname'))));
		$acno = trim($this->input->post('acno'));
		$bank = ucwords(strtolower(trim($this->input->post('bank'))));
		$hashPot = $this->input->post('hashPot');
		$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_clients_hashpost'=>$hashPot));
		$row = $query->row_array();
			if(isset($_POST["verify"])){	if(!empty($doc_verify_type)&&!empty($acname)&&!empty($acno)&&!empty($bank)){				
				$data = array(
					 "nazac_client_verification_document" => $doc_verify_type,
					 "nazac_client_verification_ac_name" => $acname,
					 "nazac_client_verification_ac_nom" => $acno,
					 "nazac_client_verification_bank_name" => $bank
				 );

				 if($this->db->update($this->lib->nazac_clients, $data, array("nazac_clients_hashpost"=>$hashPot))){
					if($row['nazac_client_account_verification']=='no'){
						$info = array("success"=>'Hi, your informations has been received for verification. Thanks');
					}else{
						$info = array("success"=>'Hi, your verification details was updated successfully. Thanks');
					}
					print  json_encode($info);
					$this->session->set_flashdata($info);

				 }else{print  json_encode(array("error"=>'Hi, your attempt to submit your details for verification failed! Try again. Thanks'));} 
			}else{print json_encode(array("error"=>'Please fill all necessary fields!'));}}
	}
	
	
	public function VerifyDocUploadFront(){
		if(isset($_FILES['file']['name'])){
		 if ( 0 < $_FILES['file']['error'] ) {
				echo 'Error: This file must have been corrupted!' . $_FILES['file']['error'] ;
			}else {
			 $pic_name  = $_FILES['file']['name'];
			 $pic_tmp = $_FILES['file']['tmp_name'];
			 $pic_size = $_FILES['file']['size'];
			 $query = $this->db->get_where($this->lib->nazac_clients, array('nazac_clients_hashpost'=>$_SESSION['_nazlogger']));
			 $row = $query->row_array();
			 $passportIn = $row['nazac_client_verification_front_id'];
			if(!empty($pic_name)){
				$gen_Num = $this->lib->randGenerator();
				$extension_Name = $this->lib->extentionName($pic_name);
				$new_name = $gen_Num.uniqid().$extension_Name;
				$path = './resource/docupload/'.$new_name;
				$picvalidation = $this->lib->picVlidator($pic_name,$pic_size);
				if(empty($picvalidation)){
					if($passportIn=='front.png' || $passportIn=='back.png' || $passportIn=='admission-proof.png'){}else{
						$this->lib->unlinkFile($passportIn,'./resource/docupload/');
					}
					$upl = $this->lib->uploadImage($pic_tmp,$path);
						if(empty($upl)){
							$src = base_url().'resource/docupload/'.$new_name;
							$data = array(
							  "nazac_client_verification_front_id"=> $new_name
								);
							if($this->db->update($this->lib->nazac_clients, $data, array("nazac_clients_hashpost"=>$_SESSION['_nazlogger']))){
								print 'File upload was successful!';
							  }else{print 'Upload faild! Try again.';}
						}else{print $upl;}
					
					}else{print $picvalidation;}
				}else{print 'Please browse a file!';}
		   }
		}
	}
	
	
	public function VerifyDocUploadBack(){
		if(isset($_FILES['file2']['name'])){
		 if ( 0 < $_FILES['file2']['error'] ) {
				echo 'Error: This file must have been corrupted!' . $_FILES['file2']['error'] ;
			}else {
			 $pic_name  = $_FILES['file2']['name'];
			 $pic_tmp = $_FILES['file2']['tmp_name'];
			 $pic_size = $_FILES['file2']['size'];
			 $query = $this->db->get_where($this->lib->nazac_clients, array('nazac_clients_hashpost'=>$_SESSION['_nazlogger']));
			 $row = $query->row_array();
			 $passportIn = $row['nazac_client_verification_back_id'];
			if(!empty($pic_name)){
				$gen_Num = $this->lib->randGenerator();
				$extension_Name = $this->lib->extentionName($pic_name);
				$new_name = $gen_Num.uniqid().$extension_Name;
				$path = './resource/docupload/'.$new_name;
				$picvalidation = $this->lib->picVlidator($pic_name,$pic_size);
				if(empty($picvalidation)){
					if($passportIn=='front.png' || $passportIn=='back.png' || $passportIn=='admission-proof.png'){}else{
						$this->lib->unlinkFile($passportIn,'./resource/docupload/');
					}
					$upl = $this->lib->uploadImage($pic_tmp,$path);
						if(empty($upl)){
							$src = base_url().'resource/docupload/'.$new_name;
							$data = array(
							  "nazac_client_verification_back_id"=> $new_name
								);
							if($this->db->update($this->lib->nazac_clients, $data, array("nazac_clients_hashpost"=>$_SESSION['_nazlogger']))){
								print 'File upload was successful!';
							  }else{print 'Upload faild! Try again.';}
						}else{print $upl;}
					
					}else{print $picvalidation;}
				}else{print 'Please browse a file!';}
		   }
		}
	}
	
	public function VerifyDocUploadProve(){
		if(isset($_FILES['file3']['name'])){
		 if ( 0 < $_FILES['file3']['error'] ) {
				echo 'Error: This file must have been corrupted!' . $_FILES['file3']['error'] ;
			}else {
			 $pic_name  = $_FILES['file3']['name'];
			 $pic_tmp = $_FILES['file3']['tmp_name'];
			 $pic_size = $_FILES['file3']['size'];
			 $query = $this->db->get_where($this->lib->nazac_clients, array('nazac_clients_hashpost'=>$_SESSION['_nazlogger']));
			 $row = $query->row_array();
			 $passportIn = $row['nazac_client_admission_proof'];
			if(!empty($pic_name)){
				$gen_Num = $this->lib->randGenerator();
				$extension_Name = $this->lib->extentionName($pic_name);
				$new_name = $gen_Num.uniqid().$extension_Name;
				$path = './resource/docupload/'.$new_name;
				$picvalidation = $this->lib->picVlidator($pic_name,$pic_size);
				if(empty($picvalidation)){
					if($passportIn=='front.png' || $passportIn=='back.png' || $passportIn=='admission-proof.png'){}else{
						$this->lib->unlinkFile($passportIn,'./resource/docupload/');
					}
					$upl = $this->lib->uploadImage($pic_tmp,$path);
						if(empty($upl)){
							$src = base_url().'resource/docupload/'.$new_name;
							$data = array(
							  "nazac_client_admission_proof"=> $new_name
								);
							if($this->db->update($this->lib->nazac_clients, $data, array("nazac_clients_hashpost"=>$_SESSION['_nazlogger']))){
								print 'File upload was successful!';
							  }else{print 'Upload faild! Try again.';}
						}else{print $upl;}
					
					}else{print $picvalidation;}
				}else{print 'Please browse a file!';}
		   }
		}
	}
	
	
	public function book(){
		header("Content-Type: application/json; charset=UTF-8");
		$pid = $this->input->post('pid');
		$uid = $this->input->post('uid');
		$book = $this->input->post('book');
		//get agent incharge ID
		$propertyData = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_unique_id' => $pid));
		$row = $propertyData->row_array();
		
		//get agent incharge detail
		$agentData = $this->db->get_where($this->lib->nazac_clients, array('nazac_id' => $row['nazac_property_gent_incharge_id']));
		$agentRow = $agentData->row_array();
		
		if(isset($book)){
			if(!empty($pid)&&!empty($uid)){
				$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id' => $uid));
				if($query->num_rows()>0){
				if($this->dbmodel->getUserSingleData($uid,'nazac_client_role')=='agent'){
					print json_encode(array("error"=>'Agents are not allowed to book!'));
				}else{
					if($this->dbmodel->countAllBookedPropertyBySingleClient($uid,$pid)==3){
						print json_encode(array("error"=>'You have reached the maximum number of booking allowed for now!'));
					}else{
						
						$query = $this->db->get_where($this->lib->nazac_book_property, array('nazac_bookers_id' => $uid, 'nazac_booked_property_id' => $pid));
						if($query->num_rows()>0){	
							print json_encode(array("error"=>'!Ooops already booked!'));
						}else{
							$data = array(
								 "id" => NULL,
								 "nazac_book_id" => $this->lib->randGenerator(),
								 "nazac_booked_property_id" => $pid,
								 "nazac_bookers_id" => $uid,
								 "nazac_book_counter" => 48,
								 "nazac_date_booked" => $this->lib->getDate(),
								 "agent_incahrge_id" => $row['nazac_property_gent_incharge_id'],
								 "aprove_availability_for_payment" => "no",
								 "cancel_booking" => "no"
							 );

							if($insert = $this->db->insert($this->lib->nazac_book_property, $data)){
								print json_encode(array("success"=>'Booked for viewing!'));
								//send mail to agent incharge
								$to_email = $agentRow['nazac_client_email'];
								$from_email = $this->siteDetails('email3');
								$siteName = $this->siteDetails('site_name');
								$subject = $this->siteDetails('site_name').' Client Booking Center';
								$message = '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$this->siteDetails('site_name').'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3><span><img src="'.base_url().'resource/img/logo.jpg" width="80" height="80"/></span> '.$this->siteDetails('site_name').' Client Property Booking Center</h3><p>Hi Agent '.$agentRow['nazac_clients_fname'].'</p><p>A client just booked a property you listed for viewing, please immediate follow up is required. Thanks</p><p>Clients Contact Details:<br><strong>Name:</strong> '.$this->dbmodel->getUserSingleData($uid,'nazac_clients_fname').'<br><strong>Email:</strong> '.$this->dbmodel->getUserSingleData($uid,'nazac_client_email').'<br><strong>Phone:</strong> '.$this->dbmodel->getUserSingleData($uid,'nazac_client_phone').'</p><p>For more enquires please contact<br>Email: '.$this->siteDetails('email3').'</p></div></body></html>';

								$this->lib->sendBasicMail($to_email,$from_email,$siteName,$subject,$message);
								
							}else{
								print json_encode(array("error"=>'Booking Failed!'));
							}
							
						}
					}
				}
			}else{
				print json_encode(array("error"=>'Ensure you are logged in!'));
			}
		}else{
				print json_encode(array("error"=>'Ensure you are logged in!'));
			}
		}
	}
	
	/*This code is incharge of sending mail 3 months to the time of expiration*/
	//http://localhost/NAZAC/Processor/sendEmail3monthToExpiringRent
	public function sendEmail3monthToExpiringRent(){
		$this->dbmodel->sendEmail3monthToExpiringRent();
	}
	
	/*This code is incharge of reducing the time allocated to rented property*/
	//http://localhost/NAZAC/Processor/rentingCounterDecrementer
	public function rentingCounterDecrementer(){
		$this->dbmodel->rentingCounterDecrementer();
	}
	
	/*This code is incharge of reducing the time allocated to come a view a property*/
	//http://localhost/NAZAC/Processor/bookedCounterDecremental
	public function bookedCounterDecremental(){
		$this->dbmodel->bookingCounterDecrementer();
	}
	
	/*This code is incharge of deleting expired booking*/
	//http://localhost/NAZAC/Processor/dueBookingDeleter
	public function dueBookingDeleter(){
		$this->dbmodel->DeleteDueBooking();
	}
	
	/*Run code ones every month*/
	//http://localhost/NAZAC/Processor/monthlyClonJob
	public function monthlyClonJob(){
		$this->sendEmail3monthToExpiringRent();
		$this->rentingCounterDecrementer();
	}
	
	/*Run code ones every day*/
	//http://localhost/NAZAC/Processor/dailyClonJob
	public function dailyClonJob(){
		$this->bookedCounterDecremental();
		$this->dueBookingDeleter();
	}
	
	public function cancelBooking(){
		header("Content-Type: application/json; charset=UTF-8");
		$id = $this->input->post('id');
		$uid = $this->input->post('userid');
		$cancelBook = $this->input->post('cancelBook');
		if(isset($cancelBook)){
			$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id' => $uid));
			if($query->num_rows()>0){
				$table = $this->lib->nazac_book_property;
				if($this->db->query("DELETE FROM $table WHERE `nazac_book_id`='".$id."' ")){
					print json_encode(array("success"=>'Booking was canceled successfully!'));
				}else{
					print json_encode(array("error"=>'Booking cancellation failed!'));
				}
			}else{
				print json_encode(array("error"=>'Ensure you are logged in!'));
			}
		} 
	}
	
	public function contact(){
		header("Content-Type: application/json; charset=UTF-8");
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		$contact = $this->input->post('contact');
		if(isset($contact)){
		 if(!empty($name)&&!empty($phone)&&!empty($email)&&!empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				$to_email = $this->siteDetails('email3');;
				$from_email = $this->siteDetails('email3');
				$siteName = $this->siteDetails('site_name');
				$subject = $this->siteDetails('site_name').' Contact Us Center';
				$message = '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$this->siteDetails('site_name').'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3><span><img src="'.base_url().'resource/img/logo.jpg" width="80" height="80"/></span> '.$this->siteDetails('site_name').' Contact Us Center</h3><p>Hi Admin</p><p>'.$message.'</p><p>Clients Contact Details:<br><strong>Name:</strong> '.$name.'<br><strong>Email:</strong> '.$email.'<br><strong>Phone:</strong> '.$phone.'</p><p>For more enquires contact:<br>Email: '.$this->siteDetails('email3').'</p></div></body></html>';
				
				if($this->lib->sendBasicMail($to_email,$from_email,$siteName,$subject,$message)){
				sleep(3);
				$auto_reply_email = $email;
				$auto_reply_subject = $this->siteDetails('site_name').' Auto Reply Cente';
				$auto_reply_message = 'Hi '.$name.' Your message has been recieved, we will review it and get back to you as soon as possible. Thanks.';
				$this->lib->sendBasicMail($auto_reply_email,$from_email,$siteName,$auto_reply_subject,$auto_reply_message);
					print json_encode(array("success"=>'You message was sent successfully!'));
				}else{
					print json_encode(array("error"=>'Unexpected error occured, Try again!'));
				}
			}else{
				print json_encode(array("error"=>'Please use a valid email address!'));
			}
		 }else{
			 print json_encode(array("error"=>'Please fill all fields!'));
		 }
		}
	}
	
	public function report_vacancy(){
		header("Content-Type: application/json; charset=UTF-8");
		$propertytype = $this->input->post('propertytype');
		$location = $this->input->post('location');
		$sugloca = $this->input->post('sugloca');
		$lodgename = $this->input->post('lodgename');
		$lodgearea = $this->input->post('lodgearea');
		$roomnum = $this->input->post('roomnum');
		$descript = $this->input->post('descript');
		$userid = $this->input->post('userid');
		if(!empty($propertytype)&&!empty($lodgename)&&!empty($lodgearea)){
			if(!empty($sugloca)){$location = $sugloca;}else{$location = $location;}
			$data = array(
						 "id" => NULL,
						 "nazac_report_unique_id" => $this->lib->randGenerator(),
						 "nazac_vacancy_reporter_id" => $userid,
						 "nazac_report_property_type" => $propertytype,
						 "nazac_report_property_location" => $location,
						 "nazac_report_property_lodgename" => $lodgename,
						 "nazac_report_property_address" => $lodgearea,
						 "nazac_report_property_room_number" => $roomnum,
						 "nazac_report_property_description" => $descript,
						 "nazac_report_date" => $this->lib->getDate()
					 );

					if($insert = $this->db->insert($this->lib->nazac_property_vacancy_report, $data)){
						print json_encode(array("success"=>'Property vacancy report was successful!'));
					}else{
						print json_encode(array("error"=>'Property vacancy report failed!'));	
					}
		}else{
			print json_encode(array("error"=>'Please fill all fields!'));
		}
	}
	
	
	public function update_password(){
		$regbox_passUpdate = $this->input->post('regbox_passUpdate');
		$pass = $this->input->post('pass');
		$cpass = $this->input->post('cpass');
		$oldpass = $this->input->post('oldpass');
		$userid = $this->input->post('userid');
		if(isset($regbox_passUpdate)){
		header("Content-Type: application/json; charset=UTF-8");
		if(!empty($pass)&&!empty($cpass)&&!empty($oldpass)){
		$oldpassDB = $this->dbmodel->getUserSingleData($userid,'nazac_client_password');
		$oldpassUser = $this->lib->passwordHash($this->lib->algorithm,$oldpass);
		if($oldpassUser==$oldpassDB){
		if($pass!=$cpass){
			print  json_encode(array("error"=>'Password does not match!'));
		}else{
		 if(strlen($pass)<8 || strlen($pass)>36){
			 print  json_encode(array("error"=>'Password length must be between 8 - 36 characters!'));
		 }else{	 
	 $data = array(
		 "nazac_client_password" => $this->lib->passwordHash($this->lib->algorithm,$pass)
	 );
				if($insert = $this->db->update($this->lib->nazac_clients, $data, array("nazac_id"=>$userid))){
						   $info = array("success"=>'Password update was successful!.');
						   print  json_encode($info);
						   $this->session->set_flashdata($info);
					   }else{ 
						   print  json_encode(array("error"=>'Password update failed! Please try again and ensure you enter all fields correctly. Thanks'));
					   }
					  }//pass
					 }//pass
		}else{
			print json_encode(array("error"=>'Oops! Old Password you enter does not match what we have in our database. Try again.'));
		}
				  }else{
					  print json_encode(array("error"=>'Please fill all necessary fields!'));
				}//formvalidation
			}		
	}
	
	public function subscribe_email(){
		header("Content-Type: application/json; charset=UTF-8");
		$subscribe_email = $this->input->post('subscribe_email');
		$email = $this->input->post('email');
		if(isset($subscribe_email)){
			if(!empty($email)){
				$query = $this->db->get_where($this->lib->nazac_email_subscription, array('nazac_subscriber_email' => $email));
				if($query->num_rows()>0){
					 print  json_encode(array("error"=>'Oops!! Look like you have already subscribed!.'));
				}else{
					
					$data = array(
						"id" => NULL,
						"nazac_subscriber_email" => strtolower($email),
						"nazac_date_subscribed" => $this->lib->getDate()
					);
					
					if($insert = $this->db->insert($this->lib->nazac_email_subscription, $data)){
						   print  json_encode(array("success"=>'You have successfully subscribed!'));
					   }else{ 
						   print  json_encode(array("error"=>'Error! Email Subscription Failed! Try Again.'));
					   }
				}
			}else{
				print json_encode(array("error"=>'Please fill email fields!'));
			}
		}
	}
	
	public function property_payment(){
		header("Content-Type: application/json; charset=UTF-8");
		$continue_to_pay = $this->input->post('continue_to_pay');
		$bookingId = $this->input->post('b_hash');
		$propertyId = $this->input->post('p_hash');
		$userId = $this->input->post('u_hash');
		$pay_type = $this->input->post('pay_type');
		$paytype_hash = $this->input->post('paytype_hash');
		
			if(!empty($bookingId)&&!empty($pay_type)&&!empty($propertyId)&&!empty($userId)&&!empty($paytype_hash)){
				
				/*$queryRent = $this->db->get_where($this->lib->nazac_renting_payment, array('nazac_renters_id' => $userId, 'nazac_renting_payment_status' => 'confirmed'));*/
				
				/*if($queryRent->num_rows()>0){
					print  json_encode(array("error"=>'Oops!! Look like you have an active renting!! Note: you can only rent one property at a time.'));
				}else{*/
				
				$queryDup = $this->db->get_where($this->lib->nazac_renting_payment, array('nazac_renters_id' => $userId, 'nazac_renting_property_id' => $propertyId, "nazac_renting_booking_id" => $bookingId));
				
				if($queryDup->num_rows()>0){
					print  json_encode(array("error"=>'Oops!! Look like you have added this propety to your renting cart visit <a href="'.base_url('member/my-renting').'">My Renting </a> to complete payment.'));
				}else{
					
				$query = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_unique_id' => $propertyId, 'nazac_property_rent_status' => 'available', 'nazac_property_publish_status'=>'published', 'nazac_property_delete_status'=>'no'));
				$pro_Row = $query->row_array();
					
				if($query->num_rows()<1){
					 print  json_encode(array("error"=>'Oops!! Look like this property is no longer available for renting!!'));
				}else{
					if($paytype_hash=='new'){
						$amount = $pro_Row['nazac_property_price']+$pro_Row['nazac_property_legal_fee']+$pro_Row['nazac_property_agents_fee'];
					}else{
						$amount = $pro_Row['nazac_property_price'];
					}
					
					
					$data = array(
						"id" => NULL,
						"nazac_renting_id" => $this->lib->randGenerator(),
						"nazac_renters_id" => trim($userId),
						"nazac_agent_in_charge_id" => $pro_Row['nazac_property_gent_incharge_id'], 
						"nazac_renting_property_id" => trim($propertyId), 
						"nazac_renting_booking_id" => trim($bookingId), 
						"nazac_renting_payment_type" => trim($pay_type), 
						"nazac_renting_payment_status" => "pending", 
						"nazac_renting_duration" => $pro_Row['nazac_property_duration'],
						"nazac_renting_actual_amount_to_pay" => $amount,
						"nazac_renting_amount_paid" => 0, 
						"nazac_renting_payment_prove" => "avarta.png", 
						"nazac_renting_countdown" => $pro_Row['nazac_property_duration'],
						"nazac_renting_payment_date" => $this->lib->getDate2(), 
						"nazac_renting_date_updated" => $this->lib->getDate2(),
						"new_renewal_payment_type" => $paytype_hash,
						"expiry_date" => $this->lib->expireDate($pro_Row['nazac_property_duration']), 
						"start_date" => $this->lib->startDate()
					);
					
					if($insert = $this->db->insert($this->lib->nazac_renting_payment, $data)){
						   print  json_encode(array("success"=>'Transaction was created successfully!', "return"=>$data));
					   }else{ 
						   print  json_encode(array("error"=>'Error! Unexpected error occured!'));
					   }
				}
				}//duplicate
			/*}*/
			}else{
				print json_encode(array("error"=>'Error! Unexpected Error Occured!'));
			}
	}
	
	
	public function upload_payment_prove(){
		if(isset($_FILES['payment_teller']['name'])){
		 if ( 0 < $_FILES['payment_teller']['error'] ) {
				echo 'Error: This file must have been corrupted!' . $_FILES['payment_teller']['error'] ;
			}else {
			 $pic_name  = $_FILES['payment_teller']['name'];
			 $pic_tmp = $_FILES['payment_teller']['tmp_name'];
			 $pic_size = $_FILES['payment_teller']['size'];
			 $paymentid = $this->input->post('paymentid');
			 $query = $this->db->get_where($this->lib->nazac_renting_payment, array('nazac_renting_id'=>$paymentid));
			 $row = $query->row_array();
			 $passportIn = $row['nazac_renting_payment_prove'];
			if(!empty($pic_name)){
				$gen_Num = $this->lib->randGenerator();
				$extension_Name = $this->lib->extentionName($pic_name);
				$new_name = $gen_Num.uniqid().$extension_Name;
				$path = './resource/payment_upload/'.$new_name;
				$picvalidation = $this->lib->picVlidator2($pic_name,$pic_size);
				if(empty($picvalidation)){
					if($passportIn=='avarta.png'){}else{
						$this->lib->unlinkFile($passportIn,'./resource/payment_upload/');
					}
					$upl = $this->lib->uploadImage($pic_tmp,$path);
						if(empty($upl)){
							$src = base_url().'resource/payment_upload/'.$new_name;
							$data = array(
							  "nazac_renting_payment_prove"=> $new_name
								);
							if($this->db->update($this->lib->nazac_renting_payment, $data, array("nazac_renting_id"=>$paymentid))){
								print 'File upload was successful!';
							  }else{print 'Upload faild! Try again.';}
						}else{print $upl;}
					
					}else{print $picvalidation;}
				}else{print 'Please browse a file!';}
		   }
		}
	}
	
	
	public function cancelRenting(){
		header("Content-Type: application/json; charset=UTF-8");
		$id = $this->input->post('id');
		$uid = $this->input->post('userid');
		$cancelRenting = $this->input->post('cancelRenting');
		if(isset($cancelRenting)){
			$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id' => $uid));
			if($query->num_rows()>0){
				$table = $this->lib->nazac_renting_payment;
				if($this->db->query("DELETE FROM $table WHERE `nazac_renting_id`='".$id."' ")){
					print json_encode(array("success"=>'Renting was canceled successfully!'));
				}else{
					print json_encode(array("error"=>'Renting cancellation failed!'));
				}
			}else{
				print json_encode(array("error"=>'Error! Ensure you are logged in!'));
			}
		} 
	}
	
	
	public function client_review(){
		header("Content-Type: application/json; charset=UTF-8");
		$userid = $this->input->post('userid');
		$review = $this->input->post('review');
		if(isset($review)){
			if(!empty($review)&&!empty($userid)){
				
					$data = array(
						"id" => NULL,
						"nazac_review_id" => uniqid(),
						"nazac_reviewer_id" => $userid,
						"nazac_review_post" => $review,
						"nazac_review_rating" => 5,
						"nazac_review_date" => $this->lib->getDate2(),
						"nazac_review_aproval" => "no"
					);
					
					if($insert = $this->db->insert($this->lib->nazac_clients_review, $data)){
						   print  json_encode(array("success"=>'Your review have been received. Thanks!'));
				    }else{ 
						   print  json_encode(array("error"=>'Error! review failed! Try Again.'));
					}
				
			}else{
				print json_encode(array("error"=>'Error! Ensure you have entered a review!'));
			}
		}
	}
	
	
}?>