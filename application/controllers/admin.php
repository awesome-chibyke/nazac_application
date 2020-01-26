<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('dbmodel');
		$this->load->library('pagination');
		$this->load->library('lib');
		$this->lib->checkIfLogginAdmin();
	}
	
	public function endsession($page='logout'){
		setcookie("_nacad_id","",time()-(86400 * 360),"/");
		$this->session->unset_userdata('_nacad_id');
		$this->session->unset_userdata('_adminlogger');
		redirect(base_url('admin/dashboard/login'));
	}
	
	public function dashboard( $page = 'index'){
			$data['title'] = '';
			$data['propertyType'] = $this->dbmodel->getAllPropertyType();
			$data['category'] = $this->dbmodel->getAllPropertyCategory();
			$data['siteDetail'] = $this->dbmodel->getSiteDetails();
			$data['admin_data'] = @$this->dbmodel->getLogginAdminData(@$_SESSION['_adminlogger']);
			$data['account_type'] = $this->dbmodel->getAllAccountType();
			$data['locations'] = $this->dbmodel->getAllLocations();
			$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
			$data['departments'] = $this->dbmodel->getDepartments();
			$data['faculty'] = $this->dbmodel->getFaculty();
		
		    $this->load->helper('url');
			if(!file_exists('application/views/admin-section/'.$page.'.php')){
				$this->load->view('404',$data);
			}else{
				
				if($page=='index'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					$data['title'] = $data['siteDetail']['site_name'].' | Administrator';
					$this->lib->authLoginSTAYAdmin();
				}
				
				if($page=='login'){
					$data['site_description'] = $data['siteDetail']['nazac_site_description'];
					$data['thumbnail_path'] = base_url().'resource/img/logo.jpg';
					$data['page_url'] = base_url();
					
					//$this->lib->authLoginOUTAdmin();
					$data['title'] = $data['siteDetail']['site_name'].' | Login';
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules("email","Email","required|valid_email");
					$this->form_validation->set_rules("pass","Password","required");
					if($this->form_validation->run() == FALSE){
						
					}else{
						print $email = $this->input->post('email');
						$pass = $this->input->post('pass');
						$passh = $this->lib->passwordHash($this->lib->algorithm,$pass);
						$query = $this->db->get_where($this->lib->nazac_admin, array("nazac_admin_email"=>$email,"nazac_admin_password"=>$passh));
						$row = $query->row_array();
						if($query->num_rows()>0){
							if($row['nazac_admin_status']==1){
									
								$data = array('_nacad_id'=>$row['nazac_admin_id']);
								$this->session->set_userdata($data);
								redirect(base_url().'admin/dashboard/');
										
							}else{
								$this->session->set_flashdata("error",'Your account is locked contact super admin for solution!.');
							}
						}else{
							$this->session->set_flashdata("error","Invalid Email/Password Combination!");
						}
					}
				}

			$data['propertyType'] = $this->dbmodel->getAllPropertyType();
			$data['category'] = $this->dbmodel->getAllPropertyCategory();
			$data['siteDetail'] = $this->dbmodel->getSiteDetails();
			$data['admin_data'] = @$this->dbmodel->getLogginAdminData(@$_SESSION['_adminlogger']);
			$data['account_type'] = $this->dbmodel->getAllAccountType();
			$data['locations'] = $this->dbmodel->getAllLocations();
			$data['payment_gateways'] = $this->dbmodel->getAllPaymentMethod();
			$data['departments'] = $this->dbmodel->getDepartments();
			$data['faculty'] = $this->dbmodel->getFaculty();

			$this->load->view('admin-section/head',$data);
			$this->load->view('admin-section/navig',$data);
			if($page=='login'){}else{
				$this->load->view('admin-section/side-bar',$data);
			}
			$this->load->view('admin-section/'.$page,$data);
			$this->load->view('admin-section/footer',$data);
			$this->load->view('end');
				
				}
	}
}