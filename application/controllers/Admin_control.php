<?php

    class Admin_control extends CI_Controller{

        //declare the properties for the class
        var $error_code = 0;
        var $error_statement = '';
        var $success_message = '';
        var $logged_user_unique_key = '';
        var $return_data = array();
        var $page_title = '';
        var $admin_details = array();
        var $user_table_columns, $nazaac_property_registration_columns, $property_listing_table_column, $siteDetails, $property_category_table_column, $property_location_table_column, $app_name, $logo_name, $login_validator_table_column, $logged_user_unique_id, $page_name, $column_names, $column_values, $payment_mood_columns, $property_addition_error_form, $property_addition_form_field_names, $property_addition_form_name_attr, $user_data;

        function __construct()
        {
            //load the parent constructor
            parent::__construct();

            //load the libraries
            $this->load->library('paginator');
            $this->load->library('thedateguy');
            $this->load->library('processes');
            $this->load->library('Email_handler');
            $this->load->helper('cookie');
            $this->load->model('Dbmodel');
            $this->load->model('Admin');
            $this->load->library('Extras');
            $this->load->library('lib');

            //check for login
            $this->checkLogin();

            //get the site settings details
            $this->siteDetails = $this->Dbmodel->getSiteDetails();

            //call the db for the site details
            $this->column_names = array('siteDetail');
            $this->column_values = array($this->siteDetails);

            //checks for user that is not loged in
            $login_condition = $this->checkLogin();
            if($login_condition == true){

                //get the user details
                //select the necessary values to be sent to the view
                $admin_id = $this->logged_user_unique_id;
                $this->user_data = $this->Admin->returnAdminDetails($admin_id);

                //add the user details to the view
                $this->column_names[] = 'admin_details';
                $this->column_values[] = $this->user_data;

            }

        }

        /*main codes that will power the system*/

        //check for the existence of a login session]
        private function checkLogin(){

            $un_retricted_pages_check_login = array('login','logout', 'register', 'login_proccess','registeration_process');
            if(!in_array($this->uri->segment(3), $un_retricted_pages_check_login)){

                //get the unique key for each login
                $key = $this->uri->segment(4);

                //check if the key is logged in the database login validator table
                $this->db->where('unique_id', $key);
                $this->db->where('switch', 'on');
                $result = $this->db->get(extras::LOGIN_VALIDATOR_TABLE);

                if($result->num_rows() == 0){

                    $this->error_code = 1;
                    $this->session->set_flashdata('login_error', 'Please login to continue');
                    redirect(base_url('admin_control/mains/login'), 'refresh');
                    return false;
                }

                if($result->num_rows() == 1){

                    //loop through the result and get the users unique id
                    foreach($result->result_array() as $k => $value){

                        $this->logged_user_unique_id = $value['user_unique_id'];
                        $this->logged_user_unique_key = $value['unique_id'];

                    }
                    //return $this->logged_user_unique_id;
                    return true;

                }

            }


        }

        private function registration_area(){

            $this->page_name = 'admin-section/register';
            $this->send_to_view();

        }

        //admin_submit_registration password password admin_full_name admin_email
        private function registration_processor(){

            $this->form_validation->set_rules('admin_full_name', 'First Name', 'required');
            $this->form_validation->set_rules('admin_email', 'Email Address', 'required|valid_email|is_unique[yeah_yeah.email]');
            $this->form_validation->set_rules('admin_password', 'Password', 'required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('confirm_admin_password', 'Confirm Password', 'required|matches[admin_password]');

            if ($this->form_validation->run() === FALSE)
            {

                $this->error_code = 1;
                $this->page_name = 'admin-section/register';
                $this->send_to_view();
                return;
            }

            //unique_id,email,full_name,pass,status,admin_type,date,secret_code,check_on
            //get the varilbles holding the the different values
            $unique_id = $this->createUniqueId(extras::ADMIN_TABLE, 'unique_id');
            $admin_email = $this->input->post("admin_email");
            $password = $this->processes->hasHer($this->input->post("admin_password"), extras::SALT);
            $admin_full_name = $this->input->post("admin_full_name");
            $date =  $this->thedateguy->getDatetimeNow("UTC");
            $hashed_pot = $this->createUniqueId(extras::ADMIN_TABLE, 'secret_code');

            $user_props_array = array(

                'unique_id'=>$unique_id,
                'email'=>$admin_email,
                'full_name'=>$admin_full_name,
                'pass'=>$password,
                'status'=>0,
                'admin_type'=>'main',
                'date'=>$date,
                'secret_code'=>$hashed_pot,
                'check_on'=>0

            );

            if($this->db->insert(extras::ADMIN_TABLE, $user_props_array)){

                //call the view
                $this->error_code = 0;
                $this->session->set_flashdata('login_success', 'Your account was succssfully created!!!');
                redirect(base_url('admin_control/mains/login'), 'refresh');

            }else{

                $this->error_code = 0;
                $this->session->set_flashdata('login_success', 'Your account was succssfully created!!!');
                redirect(base_url('admin_control/mains/register'), 'refresh');

            }


        }

        private function login_area(){

            $this->page_name = 'admin-section/login_area';
            $this->send_to_view();

        }

        function login_processor(){

            $this->form_validation->set_rules('admin_login_password', 'Password', 'required');
            $this->form_validation->set_rules('admin_login_email', 'Email Address', 'required|valid_email');

            if ($this->form_validation->run() === FALSE)
            {

                $this->error_code = 1;
                $this->page_name = 'admin-section/login_area';
                $this->send_to_view();
                return;
            }

            //pull the usernames and password
            $email = $this->input->post('admin_login_email');
            $password = $this->processes->hasHer($this->input->post('admin_login_password'), extras::SALT);
            $remember_me = $this->input->post('remember_me');

            //check for the existence of the email in the database
            $query = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::ADMIN_TABLE,
                array(
                    'pass'=>$password,
                    'email'=>$email
                )
            );

            $rowcount = $query['row_count'];

            if($rowcount === 0){

                $this->error_code = 1;
                $this->session->set_flashdata('login_error', 'Invalid Username/Password');
                redirect(base_url('admin_control/mains/login/'), 'refresh');
                return;

            }


            if($rowcount === 1){

                //select the user details
                $result = $query['result'][0];
                    //$this->db->get_where(extras::ADMIN_TABLE, array('pass'=>$password, 'email'=>$email))->row();

                //do some validationS
                $block_account_column = 'status';

                if($result['status'] == 1){

                    $this->error_code = 1;
                    $this->page_name = 'admin-section/login_area';
                    $this->session->set_flashdata('login_error', 'Account is under suspension, please contact Super Admin for clarifications');
                    redirect(base_url('admin_control/mains/login/'), 'refresh');
                    return;
                }

                $unique_id_col = 'unique_id';

                //update the logged users details in the login validator table to off
                $this->db->where('unique_id',$result['unique_id']);
                $this->db->update(
                    extras::LOGIN_VALIDATOR_TABLE,
                    array('switch'=>'off')
                );

                $logged_in_unque_key = $this->createUniqueId(
                    extras::LOGIN_VALIDATOR_TABLE,
                    'unique_id'
                );

                //log user to the login validator database
                $data_to_insert_to_login_validator = array(
                    'unique_id'=>$logged_in_unque_key,
                    'user_unique_id'=>$result['unique_id'],
                    'switch'=>'on',
                    'date'=>$this->thedateguy->getDateNow("UTC"),
                    'time'=>$this->thedateguy->getTimeNow("UTC"),
                );
                $this->db->insert(extras::LOGIN_VALIDATOR_TABLE, $data_to_insert_to_login_validator);

                //send the user to admin dashboard
                $this->error_code = 0;
                $this->page_title = 'Admin - Home';
                $this->return_data = $result;
                redirect(base_url('admin_control/mains/index/'.$logged_in_unque_key), 'refresh');
                return;

            }

        }

        private function index(){

            $this->page_name = 'admin-section/index';
            $this->page_title = extras::SITE_NAME.' -Admin Area';

            //$this->createArrayOfDataToBeReturnedToView(array());

            $this->send_to_view();

        }

        private function get_user(){

            //check if the select request is for all users
            if($this->uri->segment(5) == 'all'){

                //get all the users
                $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB
                );
                $user_details = $user_details['result'];
                $user_record_type = 'All Users';

                //assign a page name
                $this->page_name = 'admin-section/all_user';

            }

            //check if the select request is for selected users
            if($this->uri->segment(5) != 'all'){

                //get for the selected users
                $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB,
                    array('nazac_id'=>$this->Admin->explodeImplodeValue($this->uri->segment(5), '_', '/', 'explode_first'))
                );

                $user_details = $user_details['result'][0];
                $user_record_type = $user_details['nazac_clients_lname'].' '.$user_details['nazac_clients_fname'].'`s Details';
                //assign a page name
                $this->page_name = 'admin-section/profile';

            }

            //return to the view
            $this->page_title = extras::SITE_NAME.' -Admin Area';
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'page_title'=>extras::SITE_NAME.' Admin Area',
                    'user_record_type'=>$user_record_type,
                    'user_details'=>$user_details,
                    'user_table_columns'=>$this->user_table_columns
                )
            );
            $this->send_to_view();

        }

        //do logout
        private function logout_section(){

            //get the logged user id and then run an update on the user swicth column
            $this->db->where('unique_id', $this->uri->segment(4));

            if($this->db->update(extras::LOGIN_VALIDATOR_TABLE, array('switch'=>'off'))){

                $this->session->set_flashdata('login_success', 'You have been successfully logged out');
                $this->error_code = 0;
                redirect(base_url('admin_control/mains/login'), 'refresh');
                return;

            }

        }

        /*main codes that will power the system*/

        //create array of data to be sent to the view
        function createArrayOfDataToBeReturnedToView($data_array){

            if(count($data_array) > 0){

                foreach($data_array as $key => $value){
                    $this->column_names[] = $key;
                    $this->column_values[] = $value;
                }

            }

        }

        //show the 404 page
        private function show404ErrorPage(){

            $data['title'] = '';
            $this->page_name = '404';
            $this->column_names[] = 'title';
            $this->column_values[] = extras::SITE_NAME.' - Error Page';
            $this->send_to_view();

        }

        //create a unique id
        protected function createUniqueId($table_name, $column){

            $unique_id = $this->processes->picker();

            //check for the database count from the database"unique_id"
            $query = $this->db->get_where($table_name, array($column=>$unique_id));
            $rowcount = $query->num_rows();
            if($rowcount == 0){
                return $unique_id;
            }else{
                $this->createUniqueId($table_name, $column);
            }

        }

        //main method
        function mains()//
        {

            switch ($this->uri->segment(3)) {

                case 'dashboard';
                    $this->loadDashBoard();
                    break;
                case 'registeration_process';
                    $this->registration_processor();
                    break;
                case 'register';
                    $this->registration_area();
                    break;
                case 'login';
                    $this->login_area();
                    break;
                case 'login_proccess';
                    $this->login_processor();
                    break;
                case 'index';
                    $this->index();
                    break;
                case 'users';
                    $this->get_user();
                    break;
                case 'logout';
                    $this->logout_section();
                    break;
                default:
                    $this->show404ErrorPage();

            }//

        }

        //create a method that outputs this value to user side
        public function send_to_view(){

            //create an array to house the values that will be returned to the front end
            $data = array();
            $data['logo_name'] = $this->logo_name;
            $data['company_address'] = extras::ADDRESS;
            $data['company_email'] = extras::SUPPORT_EMAIL;
            $data['phone_number'] = extras::PHONE_NUMBER;
            $data['date_now'] = $this->thedateguy->getDateNowNaija();
            $data['app_name'] = $this->app_name;
            $data['page_title'] = $this->page_title;
            $data['admin_details'] = $this->admin_details;
            $data['error_code'] = $this->error_code;
            $data['error_statement'] = $this->error_statement;
            $data['success_message'] = $this->success_message;
            $data['logged_user_unique_key'] = $this->logged_user_unique_key;

            //add more data values on the fly
            if(count($this->column_names) > 0 && count($this->column_values) > 0){

                for($i = 0; $i < count($this->column_names); $i++){
                    $data[$this->column_names[$i]] = $this->column_values[$i];
                }

            }

            $data['category'] = $this->Dbmodel->getAllPropertyCategory();
            $this->load->view($this->page_name,$data);
            $this->load->view('admin-section/jslib',$data);

        }

    }

?>