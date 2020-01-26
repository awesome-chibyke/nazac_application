<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('dbmodel');
		$this->load->library('pagination');
		$this->load->library('lib');
		$this->lib->checkIfLoggin();
	}
	
	public function endsession($page='logout'){
		setcookie("_nazp_id","",time()-(86400 * 360),"/");
		$this->session->unset_userdata('_nazp_id');
		$this->session->unset_userdata('_nazlogger');
		redirect(base_url());
	}
	
	public function member( $page = 'dashboard'){
		    $data['title'] = '';
			$data['propertyType'] = $this->dbmodel->getAllPropertyType();
			$data['category'] = $this->dbmodel->getAllPropertyCategory();
			$data['siteDetail'] = $this->dbmodel->getSiteDetails();
			$data['user_data'] = @$this->dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);
			$data['account_type'] = $this->dbmodel->getAllAccountType();
			$data['locations'] = $this->dbmodel->getAllLocations();
			$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
			$data['departments'] = $this->dbmodel->getDepartments();
			$data['faculty'] = $this->dbmodel->getFaculty();
		
		    $this->load->helper('url');
			if(!file_exists('application/views/dashboard/'.$page.'.php')){
				$this->load->view('404',$data);
			}else{
				
				if($page=='dashboard'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Memebers Area';
					
					$data['booked_property'] = $this->dbmodel->getBookedPropertyBySingleClient($data['user_data']['nazac_id']);
					
					$data["property_data"] = $this->dbmodel->fetch_all_property_no_cat(7,1,5);
					
					$data['totla_registered_property'] = $this->dbmodel->countAllRegisterPropertyBySingleAgent($data['user_data']['nazac_id']);
					
					$data['totla_listed_property'] = $this->dbmodel->countAllPropertyListedBySingleAgent($data['user_data']['nazac_id']);
					
					$data['totla_listed_property_unpublished'] = $this->dbmodel->countAllPropertyListedBySingleAgentStatus($data['user_data']['nazac_id'],'unpublished');
					
					$data['totla_listed_property_published'] = $this->dbmodel->countAllPropertyListedBySingleAgentStatus($data['user_data']['nazac_id'],'published');
					
					$data['totla_booked_agent_property'] = $this->dbmodel->countAllBookPropertyUnderAgent($data['user_data']['nazac_id']);
					
					$data['totla_booked_user_property'] = $this->dbmodel->countAllBookPropertyUnderUser($data['user_data']['nazac_id']);
					
					$data['my_renting'] = $this->dbmodel->getCurrentRentedProperty($data['user_data']['nazac_id']);
					
					$data['property_rented'] = $this->dbmodel->getSingleRentedProperty($data['my_renting']['nazac_renting_property_id']);
					
				}
				
				if($page=='statistics'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Statistics';
					
					$data['totla_registered_property'] = $this->dbmodel->countAllRegisterPropertyBySingleAgent($data['user_data']['nazac_id']);
					
					$data['totla_listed_property'] = $this->dbmodel->countAllPropertyListedBySingleAgent($data['user_data']['nazac_id']);
					
					$data['totla_booked_agent_property'] = $this->dbmodel->countAllBookPropertyUnderAgent($data['user_data']['nazac_id']);
					
					$data['viewed_property'] = $this->dbmodel->countAgentsPropertyView($data['user_data']['nazac_id']);
				}
				
				if($page=='my-booking'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | My Booking';
					$data['booked_property'] = $this->dbmodel->getBookedPropertyBySingleClient($data['user_data']['nazac_id']);
				}
				
				if($page=='generate-receipt'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | My Receipt';
					
					$paymentId = $this->uri->segment(4);
					$data['paymentId'] = $this->uri->segment(4);
					$data['payment_info'] = $this->dbmodel->getSinglePayment($paymentId);
					
					$propertyId = $data['payment_info']['nazac_renting_property_id'];
					$data['propertyId'] = $data['payment_info']['nazac_renting_property_id'];
					$data['singleProperty'] = $this->dbmodel->getSingleProperty($propertyId);
					
					$data['pay_type'] = $data['payment_info']['nazac_renting_payment_type'];
				}
				
				if($page=='renew-payment'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Renew Payments';
					
					$propertyId = $this->uri->segment(4);
					$data['propertyId'] = $this->uri->segment(4);
					$data['singleProperty'] = $this->dbmodel->getSingleProperty($propertyId);
					
					$bookedId = $this->uri->segment(5);
					$data['bookedId'] = $this->uri->segment(5);
					$data['singleBookedProperty'] = $this->dbmodel->getSingleBookedProperty($bookedId);
				}
				
				if($page=='continue-to-payment'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Continue To Payment';
					
					$propertyId = $this->uri->segment(4);
					$data['propertyId'] = $this->uri->segment(4);
					$data['singleProperty'] = $this->dbmodel->getSingleProperty($propertyId);
					
					$bookedId = $this->uri->segment(5);
					$data['bookedId'] = $this->uri->segment(5);
					$data['singleBookedProperty'] = $this->dbmodel->getSingleBookedProperty($bookedId);
				}
				
				if($page=='payment-center'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Payment Center';
					
					$propertyId = $this->uri->segment(4);
					$data['propertyId'] = $this->uri->segment(4);
					$data['singleProperty'] = $this->dbmodel->getSingleProperty($propertyId);
					
					$bookedId = $this->uri->segment(5);
					$data['bookedId'] = $this->uri->segment(5);
					$data['singleBookedProperty'] = $this->dbmodel->getSingleBookedProperty($bookedId);
					
					$pay_type = $this->uri->segment(6);
					$data['pay_type'] = $this->uri->segment(6);
					
					$paymentId = $this->uri->segment(7);
					$data['paymentId'] = $this->uri->segment(7);
					$data['payment_info'] = $this->dbmodel->getSinglePayment($paymentId);
					
				}
				
				if($page=='my-renting'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | My Renting';
					
					$data['my_renting'] = $this->dbmodel->getCurrentRentedProperty($data['user_data']['nazac_id']);
					
					$data['property_rented'] = $this->dbmodel->getSingleRentedProperty($data['my_renting']['nazac_renting_property_id']);
					
					$data['all_rented'] = $this->dbmodel->getAllRentedPropertyBySingleClient($data['user_data']['nazac_id']);
				}
				
				if($page=='my-payments'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | My Payments';
					
					$data['all_rented'] = $this->dbmodel->getAllRentedPropertyBySingleClient($data['user_data']['nazac_id']);
				}
				
				if($page=='change-password'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | Change Password';
				}
				
				if($page=='verify-account'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['id_type'] = ($this->uri->segment(4));
					$data['title'] = $data['siteDetail']['site_name'].' | Verify Account';
				}
				
				if($page=='report-vacant-property'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['id_type'] = ($this->uri->segment(4));
					$data['title'] = $data['siteDetail']['site_name'].' | Report Vacant Property';
				}
				
				if($page=='reported-vacant-property'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['id_type'] = ($this->uri->segment(4));
					$data['title'] = $data['siteDetail']['site_name'].' | Reported Vacant Property';
					$data["report_property_data"] = $this->dbmodel->fetch_all_report_property_by_user($data['user_data']['nazac_id']);
				}
				
				
				if($page=='my-profile'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginSTAY();
					$data['title'] = $data['siteDetail']['site_name'].' | My Profile';
					$hashPot = $data['user_data']['nazac_clients_hashpost'];
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules("fname","First Name","required");
					$this->form_validation->set_rules("lname","Last Name","required");
					$this->form_validation->set_rules("sex","Gender","required");
					$this->form_validation->set_rules("phone","Phone Number","required");
					$this->form_validation->set_rules("address","Residential Address","required");
					$this->form_validation->set_rules("nationality","Nationality","required");
					$this->form_validation->set_rules("state","State Of Origin","required");
					$this->form_validation->set_rules("lg","Local Government Area","required");
					if($this->form_validation->run() == FALSE){
						
					}else{
						$fname = ucfirst(strtolower(trim($this->input->post('fname'))));
						$lname = ucfirst(strtolower(trim($this->input->post('lname'))));
						$sex = $this->input->post('sex');
						$phone = trim($this->input->post('phone'));
						$wapp = trim($this->input->post('wapp'));
						$fb = trim(strtolower($this->input->post('fb')));
						$tw = trim(strtolower($this->input->post('tw')));
						$ig = trim(strtolower($this->input->post('ig')));
						
						$address = ucwords(strtolower(trim($this->input->post('address'))));
						$nationality = ucwords(strtolower(trim($this->input->post('nationality'))));
						$state = ucwords(strtolower(trim($this->input->post('state'))));
						$lg = ucwords(strtolower(trim($this->input->post('lg'))));
						$regno = strtoupper(strtolower(trim($this->input->post('regno'))));
						$dept = ucwords(strtolower(trim($this->input->post('dept'))));
						$krelationship = $this->input->post('krelationship');
						$kname = ucwords(strtolower(trim($this->input->post('kname'))));
						$kemail = strtolower(trim($this->input->post('kemail')));
						$kphone = trim($this->input->post('kphone'));
						$kaddress = ucwords(strtolower(trim($this->input->post('kaddress'))));
						$ac_type = $this->input->post('ac_type');
						$agentdes = $this->input->post('agentdes');
						$faculty = $this->input->post('faculty');
						if($data['user_data']['nazac_client_role']=='student'){

							$data = array(
									"nazac_clients_fname" => $fname,
									"nazac_clients_lname" => $lname,
									"nazac_client_gender" => $sex,
									"nazac_client_phone" => $phone,
									"nazac_client_home_address" => $address,
									"nazac_client_nationality" => $nationality,
									"nazac_client_state_of_origin" => $state,
									"nazac_client_lga" => $lg,
									"nazac_clients_regno" => $regno,
									"nazac_client_department" => $dept,
									"nazac_account_last_update" => $this->lib->getDate(),
									"nazac_client_whatsapp_number" => $wapp,
									"nazac_client_facebook_handel" => $fb,
									"nazac_client_twitter_handel" => $tw,
									"nazac_client_instagram_handel" => $ig,
									"nazac_agents_description" => $agentdes,
									"nazac_client_faculty" => $faculty
								);
						}else{
							$data = array(
								"nazac_clients_fname" => $fname,
								"nazac_clients_lname" => $lname,
								"nazac_client_gender" => $sex,
								"nazac_client_phone" => $phone,
								"nazac_client_home_address" => $address,
								"nazac_client_nationality" => $nationality,
								"nazac_client_state_of_origin" => $state,
								"nazac_client_lga" => $lg,
								"nazac_account_last_update" => $this->lib->getDate(),
								"nazac_client_whatsapp_number" => $wapp,
								"nazac_client_facebook_handel" => $fb,
								"nazac_client_twitter_handel" => $tw,
								"nazac_client_instagram_handel" => $ig,
								"nazac_agents_description" => $agentdes
							);
						}
							if($this->db->update($this->lib->nazac_clients, $data, array("nazac_clients_hashpost"=>$hashPot))){
								$suc= 'Hi '.$fname.', Your account details was updated successfully!!';
								$this->session->set_flashdata("success",$suc);
							}else{
								$er = 'Hi '.$fname.', Your account update failed! Try again later or contact support for help';
								$this->session->set_flashdata("error",$er);
							}
					}
				}
				
				$data['propertyType'] = $this->dbmodel->getAllPropertyType();
				$data['category'] = $this->dbmodel->getAllPropertyCategory();
				$data['siteDetail'] = $this->dbmodel->getSiteDetails();
				$data['user_data'] = @$this->dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);
				$data['account_type'] = $this->dbmodel->getAllAccountType();
				$data['locations'] = $this->dbmodel->getAllLocations();
				$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
				$data['departments'] = $this->dbmodel->getDepartments();
				$data['faculty'] = $this->dbmodel->getFaculty();
				
				$this->load->view('head',$data);
				$this->load->view('navig',$data);
				$this->load->view('dashboard/'.$page,$data);
				$this->load->view('footer',$data);
				$this->load->view('scripts',$data);
				if($page=='dashboard' || $page=='my-profile'){
					$this->load->view('dashboard/cropie-passport');
				}
				$this->load->view('dashboard/jsfile',$data);
				$this->load->view('end');
			}
	}
	
	public function user( $page = 'index'){
		    $data['title'] = '';
			$data['propertyType'] = $this->dbmodel->getAllPropertyType();	
			$data['category'] = $this->dbmodel->getAllPropertyCategory();
			$data['siteDetail'] = $this->dbmodel->getSiteDetails();
			$data['user_data'] = @$this->dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);
			$data['account_type'] = $this->dbmodel->getAllAccountType();
			$data['locations'] = $this->dbmodel->getAllLocations();
			$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
			$data['departments'] = $this->dbmodel->getDepartments();
			$data['faculty'] = $this->dbmodel->getFaculty();
		
		    $this->load->helper('url');
			if(!file_exists('application/views/'.$page.'.php')){
				$this->load->view('404',$data);
			}else{
				if($page=='index'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | A Home For Your Accomodation.';
					$data['propertythreelast'] = $this->dbmodel->fetch_three_property_last();
					$data['propertythree'] = $this->dbmodel->fetch_three_property();
					$data['recentProperty'] = $this->dbmodel->fetch_recent_property();
					$data['categori'] = $this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$data['recentProperty'][0]['nazac_property_category'],'nazac_category_name');
					$data['locatio'] = $this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$data['recentProperty'][0]['nazac_property_location'],'nazac_location_name');
					$data['agentshome'] = $this->dbmodel->getVerifiedAgentsHome();
					
					$total_row = $this->dbmodel->count_all_news();
					$data['newsfeedhome'] = $this->dbmodel->fetch_all_news(3,1,$total_row);
					
					$total_count = $this->dbmodel->count_all_reviews();
					$data['client_reviews'] = $this->dbmodel->fetch_all_reviews(6,1,$total_count);
					
					$data['nazac_partners'] = $this->dbmodel->fetch_all_partners();
					
					$data['all_users'] = $this->dbmodel->count_all_user();
					
					$data['all_agents'] = $this->dbmodel->count_all_agents_home();
					
					$data['all_property'] = $this->dbmodel->count_all_Property_listed();
					
					$data['all_reviews'] = $this->dbmodel->count_all_reviews_post();
					
				}
				
				if($page=='about'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$data['agentshome'] = $this->dbmodel->getVerifiedAgentsHome();
					$data['title'] = $data['siteDetail']['site_name'].' | Learn About Us';
					
					$data['all_users'] = $this->dbmodel->count_all_user();
					
					$data['all_agents'] = $this->dbmodel->count_all_agents_home();
					
					$data['all_property'] = $this->dbmodel->count_all_Property_listed();
					
					$data['all_reviews'] = $this->dbmodel->count_all_reviews_post();
				}
				
				if($page=='contact'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$data['title'] = $data['siteDetail']['site_name'].' | Contact Us';
				}
				
				if($page=='policy'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$data['title'] = $data['siteDetail']['site_name'].' | Terms and Policy';
				}
				
				if($page=='faq'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$data['faq'] = $this->dbmodel->fetch_all_faq();
					$data['title'] = $data['siteDetail']['site_name'].' | Frequently Asked Questions';
				}
				
				if($page=='news'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | News Feed';
					$config = array(); 
					$data['title'] = 'News | '.$data['siteDetail']['site_name'];
					$config["base_url"] = base_url()."users/user/news";
					$total_row = $this->dbmodel->count_all_news();
					$data['total_row'] = $total_row;
					$config["total_rows"] = $total_row;
					$num_per_page = 15;
					$config["per_page"] = $num_per_page;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row/$config["per_page"];
					$data['num_links'] = ceil($total_row/$num_per_page);
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(4)){
						$pages = ($this->uri->segment(4));
						$data['pages'] = $pages;
					}else{
						$pages = 1;
						$data['pages'] = $pages;
					}
					$data["newsfeed"] = $this->dbmodel->fetch_all_news($config["per_page"],$pages,$total_row);

					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
				}
				
				if($page=='news-details'){
					$newsid = $this->uri->segment(4);
					$data['id'] = $newsid;
					$data["newsfeed"] = $this->dbmodel->getSingleNew($newsid);
					$data['site_description'] = $data["newsfeed"]['nazac_news_body'];
					$data['thumbnail_path'] = base_url().'resource/upload/news_images/'.$data["newsfeed"]['nazac_news_thumbnail'];
					$data['page_url'] = base_url();
					$data['title'] = $data["newsfeed"]['nazac_news_title'];
					$total_row = $this->dbmodel->count_all_news();
					$data['newsfeedhome'] = $this->dbmodel->fetch_all_news(7,1,$total_row);
				}
				
				if($page=='agents'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$config = array();
					$data['title'] = 'Agents | '.$data['siteDetail']['site_name'];
					$config["base_url"] = base_url()."users/user/agents/";
					$total_row = $this->dbmodel->count_all_agents();
					$data['total_row'] = $total_row;
					$config["total_rows"] = $total_row;
					$num_per_page = 12;
					$config["per_page"] = $num_per_page;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row/$config["per_page"];
					$data['num_links'] = ceil($total_row/$num_per_page);
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(4)){
						$pages = ($this->uri->segment(4));
						$data['pages'] = $pages;
					}else{
						$pages = 1;
						$data['pages'] = $pages;
					}
					$data["agents_data"] = $this->dbmodel->fetch_all_agents($config["per_page"],$pages,$total_row);
					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
				}
				
				if($page=='agent-details'){
					$agentId = str_replace("-","/", $this->uri->segment(4));
					$data['singleAgent'] = $this->dbmodel->getUserById($agentId);
					$data['site_description'] = $data['singleAgent']['nazac_agents_description'];
					$data['thumbnail_path'] = base_url().'resource/upload/'.$data['singleAgent']['nazac_client_passport'];
					$data['page_url'] = base_url();
					
					$data['title'] = 'Real Estate Agent: '.ucwords(strtolower($data['singleAgent']['nazac_clients_fname'].' '.$data['singleAgent']['nazac_clients_lname']));
					$data['totla_listed_property'] = $this->dbmodel->countAllPropertyListedBySingleAgent($agentId);
					
					$config = array();
					$config["base_url"] = base_url()."users/user/agent-details/".$this->uri->segment(4).'/';
					$total_row = $this->dbmodel->countAllPropertyBySingleAgent($agentId);
					$data['total_row'] = $total_row;
					$config["total_rows"] = $total_row;
					$num_per_page = 10;
					$config["per_page"] = $num_per_page;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row/$config["per_page"];
					$data['num_links'] = ceil($total_row/$num_per_page);
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(5)){
						$pages = ($this->uri->segment(5));
						$data['pages'] = $pages;
					}else{
						$pages = 1;
						$data['pages'] = $pages;
					}
					$data['cat_set'] = $this->uri->segment(4);
					$data["property_data"] = $this->dbmodel->fetchAllPropertyBySingleAgent($config["per_page"],$pages,$agentId,$total_row);

					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
					
				}
				
				if($page=='property-listing'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$config = array();
					$cat = str_replace("-"," ",$this->uri->segment(4));
					$catP = $this->uri->segment(4);
					if($catP==''){
						$catP='All';
						$cat = 'All';
					}
					$data['cat'] = $cat; 
					$data['title'] = 'Property Listing '.ucwords($catP).' | '.$data['siteDetail']['site_name'];
					$config["base_url"] = base_url()."users/user/property-listing/".$catP;
					$total_row = $this->dbmodel->count_all_property($cat);
					$data['total_row'] = $total_row;
					$config["total_rows"] = $total_row;
					$num_per_page = 10;
					$config["per_page"] = $num_per_page;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row/$config["per_page"];
					$data['num_links'] = ceil($total_row/$num_per_page);
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(5)){
						$pages = ($this->uri->segment(5));
						$data['pages'] = $pages;
					}else{
						$pages = 1;
						$data['pages'] = $pages;
					}
					$data['cat_set'] = $cat;
					$data["property_data"] = $this->dbmodel->fetch_all_property($config["per_page"],$pages,$cat,$total_row);

					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
				}
				
				if($page=='property-listing-search'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$config = array();
					$cat = $this->uri->segment(4);
					$catP = $this->uri->segment(4);
					$data['cat'] = $cat; 
					$data['title'] = ucwords(str_replace("-"," ",$catP));
					$config["base_url"] = base_url()."users/user/property-listing-search/".$catP;
					$total_row = $this->dbmodel->count_search_for_property($cat);
					$data['total_row'] = $total_row;
					$config["total_rows"] = $total_row;
					$num_per_page = 10;
					$config["per_page"] = $num_per_page;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row/$config["per_page"];
					$data['num_links'] = ceil($total_row/$num_per_page);
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(5)){
						$pages = ($this->uri->segment(5));
						$data['pages'] = $pages;
					}else{
						$pages = 1;
						$data['pages'] = $pages;
					}
					$data['cat_set'] = $cat;
					$data["property_data"] = $this->dbmodel->search_for_property($config["per_page"],$pages,$cat,$total_row);

					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
				}
				
				if($page=='property-details'){
					$pId = $this->uri->segment(4);
					$data['singleProperty'] = $this->dbmodel->getSingleProperty($pId);
					$data['site_description'] = $data['singleProperty']['nazac_property_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$cat = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_category,'nazac_category_id',$data['singleProperty']['nazac_property_category'],'nazac_category_name')));
					
					$loca = ucwords(strtolower($this->dbmodel->returnSingleData($this->lib->nazac_property_locations,'nazac_location_id',$data['singleProperty']['nazac_property_location'],'nazac_location_name')));
					
					$data['title'] = ucwords(strtolower($data['singleProperty']['nazac_property_title'].' '.$cat.' at '.$data['singleProperty']['nazac_property_street_address'].' '.$loca.', '.$data['singleProperty']['nazac_property_local_gov_area'].', '.$data['singleProperty']['nazac_property_state'].', '.$data['singleProperty']['nazac_property_country']));
					
					$data['reg_property_data'] = $this->dbmodel->getSingleRegisteredProperty($data['singleProperty']['nazaac_main_property_id']);
					
					$total_row = $this->dbmodel->count_all_property($cat);
					
					$data["property_data"] = $this->dbmodel->fetch_all_property(4,1,$cat,$total_row);
					
					if(!isset($_SESSION['cart'])){$_SESSION['cart'] = array();}
					if(!in_array($this->uri->segment(4), $_SESSION['cart'])){
						array_push($_SESSION['cart'], $this->uri->segment(4));
						$this->dbmodel->updateViewedProperty($this->uri->segment(4));
					}
				}
				
				if($page=='login'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$this->lib->authLoginOUT();
					$data['title'] = $data['siteDetail']['site_name'].' | Login';
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules("email","Email","required|valid_email");
					$this->form_validation->set_rules("pass","Password","required");
					if($this->form_validation->run() == FALSE){
						
					}else{
						$email = $this->input->post('email');
						$pass = $this->input->post('pass');
						$rem = $this->input->post('rem');
						$passh = $this->lib->passwordHash($this->lib->algorithm,$pass);
						$query = $this->db->get_where($this->lib->nazac_clients, array("nazac_client_email"=>$email,"nazac_client_password"=>$passh));
						$row = $query->row_array();
						if($query->num_rows()>0){
							if($row['nazac_client_email_confirmation']=="yes"){
				  				if($row['nazac_block_client_account']=="yes"){
									$this->session->set_flashdata("error",'Your account is currently blocked please contact support for more details: '.$data['siteDetail']['email3']);
								}else{
										
									if($row['nazac_block_client_account_counter']==3){
										$this->session->set_flashdata("error",'Sorry this account has been ban!');
									}else{
										if($rem==1){
											setcookie("_nazp_id",$row['nazac_clients_hashpost'],time()+(86400 * 360),"/");
											if($row['nazac_client_role'] === 'agent'){
												redirect(base_url('member/dashboard/'));
												return;
											}
											redirect(base_url().'member/dashboard/');
										}else{
											$data = array('_nazp_id'=>$row['nazac_clients_hashpost']);
											$this->session->set_userdata($data);
											if($row['nazac_client_role'] === 'agent'){
												if($row['nazac_client_account_verification']=='no'){
													$this->session->set_flashdata("error",'Your account need verification! Please contact admin.');
												}else{
													redirect(base_url('member/dashboard/'));
													return;
												}
											}
											redirect(base_url().'member/dashboard/');
										}
									}
								}
							}else{
								$this->session->set_flashdata("error",'Sorry you can`t access your account because your email has not been activated. <a href="'.base_url().'users/user/resend-email-activation-link/'.$row['nazac_clients_hashpost'].'"  style="color:#06C; font-size:16px;">I have not received any email <u>Resend Activation Link?</u></a><br />');
							}
						}else{
							$this->session->set_flashdata("error","Invalid Email/Password Combination!");
						}
					}
				}
				
				if($page=='register'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | Register';
				}
				
				if($page=='email-activation'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | Email Activation Center';
					$hashPot = ($this->uri->segment(4));
					$hashPass = ($this->uri->segment(5));
					$query = $this->db->get_where($this->lib->nazac_clients, array(" 	nazac_clients_hashpost"=>$hashPot,"nazac_client_password"=>$hashPass));
					$row = $query->row_array();
					if($query->num_rows()>0){
						if($row['nazac_client_email_confirmation']=='yes'){
							$data['activation_error'] = 'This Email Activation Link does not exist or has expired!';
						}else{
							$data = array(
								"nazac_client_email_confirmation" => "yes"
							);
							if($this->db->update($this->lib->nazac_clients, $data, array("nazac_client_password"=>$hashPass, "nazac_clients_hashpost"=>$hashPot))){
								$data['activation_error'] = 'Hi '.$row['nazac_clients_fname'].', Your Email Activation was successful!! You now have access to your account with us. Thanks';
								$data['siteDetail'] = $this->dbmodel->getSiteDetails();
							}else{
								$data['activation_error'] = 'Hi '.$row['nazac_clients_fname'].', Email Activation failed. Try again later or contact support! Thanks';
							}
						}
					}else{
						$data['activation_error'] = 'This Email Activation Link does not exist or has expired! Thanks';
					}
					
				}
				
				if($page=='forgot-password'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | Forgot Password';
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules("email","Email","required|valid_email");
					if($this->form_validation->run() == FALSE){
						
					}else{
						$email = $this->input->post('email');
						if(!empty($email)){
							$query = $this->db->get_where($this->lib->nazac_clients, array("nazac_client_email"=>$email));
							$row = $query->row_array();
							if($query->num_rows()>0){
							$forget_password_code = $row['nazac_client_forgot_password_code'];
							$hashPot = $row['nazac_clients_hashpost'];
								
							$to_email = $email;
							$from_email = $data['siteDetail']['email3'];
							$siteName = $data['siteDetail']['site_name'];
							$subject = $siteName.' Password Reset Request';
								
							$message = '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$siteName.' Password Reset Request Center</h3><p>Hi '.$row['nazac_clients_fname'].'</p><p>Your request to reset your password in your '.$siteName.', account was successful.</p><p>Please you just have one more step to take to complete this process. Kindly follow the link below to <a href="'.base_url().'users/user/reset-password/'.$hashPot.'/'.$forget_password_code.'"> reset your password</a>. Thanks.</p><p><a  href="'.base_url().'users/user/reset-password/'.$hashPot.'/'.$forget_password_code.'">Follow Link</a></p><p>Having issues? Please contact us:</p><p>Email: '.$data['siteDetail']['email3'].'</p></div></body></html>';	
								
							$send = @$this->lib->sendBasicMail($to_email,$from_email,$siteName,$subject,$message);
								
							if($send==1){
								$this->session->set_flashdata("success",'Password reset link was sent to your email '.$email.' successfully! Thanks ');
							}else{
								$this->session->set_flashdata("error","Process failed! Check your network connection. ");
							}
								
							}else{
							 	$this->session->set_flashdata("error","Email does not exist in records!");
							}
						}else{
							$this->session->set_flashdata("error",'Please fill all necessary fields!');
						}
					}
				}
				
				
				if($page=='reset-password'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					$data['title'] = $data['siteDetail']['site_name'].' | Reset Password';
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules("pass","Password","trim|required|min_length[8]|max_length[8]");
					$this->form_validation->set_rules("cpass","Confirm Password","trim|required|matches[pass]|min_length[8]|max_length[8]");
					$hashPot = ($this->uri->segment(4));
					$forgPassCode = ($this->uri->segment(5));
					$query = $this->db->get_where($this->lib->nazac_clients, array("nazac_clients_hashpost"=>$hashPot, "nazac_client_forgot_password_code"=>$forgPassCode));
					$row = $query->row_array();
					if($query->num_rows()>0){
						if($this->form_validation->run() == FALSE){

						}else{
							$pass = $this->input->post('pass');
							$cpass = $this->input->post('cpass');
							$data = array(
								 "nazac_client_password" => $this->lib->passwordHash($this->lib->algorithm,$pass)
							 );
							if($update = $this->db->update($this->lib->nazac_clients, $data, array("nazac_client_forgot_password_code"=>$forgPassCode, "nazac_clients_hashpost"=>$hashPot))){
								$this->session->set_flashdata("success",'Hi '.$row['nazac_clients_fname'].', your passwors was successfully reset!! Proceed to <a href="'.base_url().'login">login</a>');
								$dataIn = array(
								 "nazac_client_forgot_password_code" => $this->lib->randGenerator()
								);
								$this->db->update($this->lib->nazac_clients, $dataIn, array("nazac_client_forgot_password_code"=>$forgPassCode, "nazac_clients_hashpost"=>$hashPot));
								sleep(5);
								redirect(base_url().'login');
							}else{
								$this->session->set_flashdata("error","!Oops an error occured while trying to reset your password. Try again!!");
							}
						}
					}else{
						$data['diepage'] = 'Hi '.$row['nazac_clients_fname'].', it look like the link you are trying to access does not exist or has expired. Please try repeating the process again. Thanks ';
					}
				}
				
				$data['propertyType'] = $this->dbmodel->getAllPropertyType();
				$data['category'] = $this->dbmodel->getAllPropertyCategory();
				$data['siteDetail'] = $this->dbmodel->getSiteDetails();
				$data['user_data'] = @$this->dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);
				$data['account_type'] = $this->dbmodel->getAllAccountType();
				$data['locations'] = $this->dbmodel->getAllLocations();
				$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
				$data['departments'] = $this->dbmodel->getDepartments();
				$data['faculty'] = $this->dbmodel->getFaculty();
				
				$this->load->view('head',$data);
				$this->load->view('navig',$data);
				$this->load->view($page,$data);
				$this->load->view('footer',$data);
				$this->load->view('scripts',$data);
				$this->load->view('dashboard/jsfile',$data);
				$this->load->view('end');
			}
	}
	
	
	
}