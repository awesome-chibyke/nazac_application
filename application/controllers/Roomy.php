<?php

class Roomy extends CI_Controller{

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
        $this->load->library('Extras');//
        $this->load->library('lib');
        $this->load->library('pagination_html');

        //check for link from email
        $this->checkForLinksFromEmail();

        //check for login
        $this->lib->checkIfLoggin();

        //get the site settings details
        $this->siteDetails = $this->Dbmodel->getSiteDetails();

        //call the db show
        $this->column_names = array('siteDetail');
        $this->column_values = array($this->siteDetails);

        if($this->uri->segment(5) !== 'guest'){
            //checks for user that is not loged in
            if($this->lib->authLoginSTAY() == true){

                //get the user details
                $this->user_data = @$this->Dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);

                //add the user details to the view
                $this->column_names[] = 'user_data';
                $this->column_values[] = $this->user_data;

            }
        }


        $this->neccessaryDatasForView();
    }

    //check for uri coming from email
    private function checkForLinksFromEmail(){

        $url_length = $this->uri->total_segments();
        if(strpos($this->uri->segment($url_length), 'checker') !== false){

            $exploded_section = explode('-', trim($this->uri->segment($url_length)));

            $authenticate_details = $this->Admin->dbSelectWithOrWithoutParameter(
                'authenticate_incoming',
                array(
                    'unique_id'=>$exploded_section[1]
                )
            );

            if($authenticate_details['row_count'] == 1){

                //delete the user from this table
                $this->db->where('unique_id', $exploded_section[1]);
                $this->db->delete('authenticate_incoming');

                //create a login session
                $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB,
                    array(
                        'nazac_id'=>$authenticate_details['result'][0]['user_id']
                    )
                );

                $data = array('_nazp_id'=>$user_details['result'][0]['nazac_clients_hashpost']);
                $this->session->set_userdata($data);

            }else{
                redirect(base_url('login'));
                die();
            }

        }

    }

    //pagination controller
    public function setPagination($current_page, $numrows, $rowsperpage = 20){

        //do the pagination calculations

        $range = 4;
        $this->load->library('pagination');
        $this->paginator->totalPages($numrows, $rowsperpage);
        $this->paginator->currentPage($current_page);
        $mainCurrentPage = $this->paginator->currentPageCheck($this->paginator->currentpage, $this->paginator->totalpages);

        if($mainCurrentPage === 'no new page'){
            return 'No Data was returned';
        }

        $this->paginator->offsetIt($mainCurrentPage, $rowsperpage);

        return $this->paginator->offset;

    }
    //list_of_registered_properties
    public function setPaginationHtml($current_page, $numrows, $rowsperpage = 20, $page_name = ''){

        //do the pagination calculations
        $range = 4;
        $this->load->library('pagination_html');
        $this->pagination_html->totalPages($numrows, $rowsperpage);
        $this->pagination_html->currentPage($current_page);
        $mainCurrentPage = $this->pagination_html->currentPageCheck($this->pagination_html->currentpage, $this->pagination_html->totalpages);

        $this->pagination_html->offsetIt($mainCurrentPage, $rowsperpage);

        $previous_link = $this->pagination_html->prevLinks($page_name, $mainCurrentPage);
//
        $looped_links = $this->pagination_html->loopLinks($mainCurrentPage, $range, $this->pagination_html->totalpages, $page_name);

        $next_links = $this->pagination_html->nextLinks($mainCurrentPage, $this->pagination_html->totalpages, $page_name);

        return array(
            'offset'=>$this->pagination_html->offset,
            'previous_link'=>$previous_link,
            'looped_links'=>$looped_links,
            'next_links'=>$next_links
        );

    }

    private function neccessaryDatasForView(){

        $this->createArrayOfDataToBeReturnedToView(
            array(
                    'propertyType'=>$this->Dbmodel->getAllPropertyType(),
                    'siteDetail'=> $this->Dbmodel->getSiteDetails(),
                    'user_data'=> @$this->Dbmodel->getLogginUserData(@$_SESSION['_nazlogger']),
                    'account_type'=> $this->Dbmodel->getAllAccountType(),
                    'locations'=> $this->Dbmodel->getAllLocations(),
                    'category'=> $this->Dbmodel->getAllPropertyCategory(),
            )
        );

    }

    ////process form for find a roomy
    private function processFindRoomyForm(){

        /*$this->form_validation->set_rules("apartment_rent_question","Platform where Apartment was rented","trim|required");
        if(!empty($_POST['apartment_rent_question']) && trim($_POST['apartment_rent_question']) != 'no'){

        }*/
        if($this->uri->segment(4) === 'existing_apartment') {
            $this->form_validation->set_rules("rin_number", "Rin Number", "trim|required");

            //$this->form_validation->set_rules("apartment_images", "Images", "trim|required");
            $this->form_validation->set_rules("price_of_rent", "Rent", "trim|required");
            $this->form_validation->set_rules("nazac_property_storey_type", "Building Storey Type", "trim|required");
            $this->form_validation->set_rules("nazac_property_location", "Location of Apartment", "trim|required");
            $this->form_validation->set_rules("name_of_lodge", "Name of Lodge", "trim|required");

        }
        $this->form_validation->set_rules("description_of_self","Description of Self","trim|required");
        $this->form_validation->set_rules("pair_option","Possible Pair Option","trim|required");
        $this->form_validation->set_rules("prefered_gender","Preferred Gender","trim|required");
        $this->form_validation->set_rules("prefered_level","Preferred Level","trim|required");
        if($this->uri->segment(4) === 'no_apartment') {
            $this->form_validation->set_rules("prefered_property_type", "Prefered Property/Apartment Type", "trim|required");
            $this->form_validation->set_rules("prefered_location", "Apartment/Property's Location", "trim|required");
            $this->form_validation->set_rules("amount_budgeted", "Budget", "trim|required|numeric");
        }
        // rin_number description_of_self pair_option faculty_name department_name  prefered_level
        if(!empty($_POST['pair_option']) && trim($_POST['pair_option']) == 'faculty'){
            $this->form_validation->set_rules("faculty_name","Name of Faculty","trim|required");
        }

        if(!empty($_POST['pair_option']) && trim($_POST['pair_option']) == 'department'){
            $this->form_validation->set_rules("department_name","Name of Department","trim|required");
        }

        //if validation fails
        if ($this->form_validation->run() === FALSE)
        {
            $this->getRoomateRequestFormDetails();
            $this->page_name = 'dashboard/find_roomy';
            $this->send_to_view();
            return;
        }

        //process the values and send to the database
        //$apartment_rent_question = $this->input->post("apartment_rent_question");
        $rin_number = ""; $apartment_images = ""; $price_of_rent = ""; $nazac_property_storey_type = ""; $nazac_property_location = ""; $name_of_lodge = "";
        if($this->uri->segment(4) === 'existing_apartment') {

            $rin_number = $this->input->post("rin_number");
            $image_upload_details = $this->uploadImagesForFindRoomy();

            if($image_upload_details['error_code'] == 1){
                $this->getRoomateRequestFormDetails();
                $this->session->set_flashdata('form_error', $image_upload_details['error']);
                $this->page_name = 'dashboard/find_roomy';
                $this->send_to_view();
                return;
            }

            $apartment_images = $image_upload_details['success']['data']['new_name'];
            $price_of_rent = $this->input->post("price_of_rent");
            $nazac_property_storey_type = $this->input->post("nazac_property_storey_type");
            $nazac_property_location = $this->input->post("nazac_property_location");
            $name_of_lodge = $this->input->post("name_of_lodge");

        }
        $description_of_self = $this->input->post("description_of_self");
        $pair_option = $this->input->post("pair_option");
        if($pair_option === 'faculty'){
            $faculty_department_name = $this->input->post("faculty_name");
        }else if($pair_option === 'department'){
            $faculty_department_name = $this->input->post("department_name");
        }else{
            $faculty_department_name = '';
        }
        $prefered_gender = $this->input->post("prefered_gender");
        $prefered_level = $this->input->post("prefered_level");
        $roomy_finder_option = trim($this->uri->segment(4));

        $prefered_property_type = ""; $prefered_location = ""; $amount_budgeted = "";
        if($this->uri->segment(4) === 'no_apartment') {
            $prefered_property_type = $this->input->post("prefered_property_type");
            $prefered_location = $this->input->post("prefered_location");
            $amount_budgeted = $this->input->post('amount_budgeted');
        }

        //check if the a pending request is present for this request about to enter
        $roomy_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::FIND_ROOMY_TABLE,
            array(
                'roomate_seeker_id'=>$this->user_data['nazac_id'],
                'listed_property_id'=>$rin_number,
                'roomate_find_status'=>'pending',
                'delete_status'=>'no'
            )
        );

        //check if the order is pending
        if($roomy_details['row_count'] == 1){
            $this->getRoomateRequestFormDetails();
            $this->session->set_flashdata('form_error', 'There is a pending room mate request from you for this particular apartment');
            $this->page_name = 'dashboard/find_roomy';
            $this->send_to_view();
            return;
        }

        //build an array for to beinserted to the db
        $unique_id = $this->Admin->createUniqueId(extras::FIND_ROOMY_TABLE, 'unique_id');
        $data_to_be_inserted = array(
            'unique_id'=>$unique_id,
            'roomate_seeker_id'=>$this->user_data['nazac_id'],
            'was_rented_on_nazaac'=>'',
            'listed_property_id'=>$rin_number,
            'description_of_personality'=>$description_of_self,
            'room_mate_pair'=>$pair_option,
            'faculty_department_name'=>$faculty_department_name,
            'gender'=>$prefered_gender,
            'prefered_level'=>$prefered_level,
            'purpose'=>$roomy_finder_option,
            'roomate_find_status'=>'pending',
            'date_created'=>$this->thedateguy->getDatetimeNow("Africa/Lagos"),
            'last_update'=>$this->thedateguy->getDatetimeNow("Africa/Lagos"),
            'prefered_property_type'=>$prefered_property_type,
            'prefered_location'=>$prefered_location,
            'delete_status'=>'no',
            'nazac_apartment_images'=>$apartment_images,
            'nazac_price_of_rent'=>$price_of_rent,
            'nazac_property_storey_type'=>$nazac_property_storey_type,
            'nazac_property_location'=>$nazac_property_location,
            'name_of_lodge'=>$name_of_lodge,
            'amount_budgeted'=>$amount_budgeted
        );

        if($this->db->insert(extras::FIND_ROOMY_TABLE, $data_to_be_inserted)){

            $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
            //send an $checkeremail to the room mate seeker
            $this->mailSender($this->user_data['nazac_client_email'], 'Successful Creation of Rommy Request', Email_handler::messageForCreationOfRoomyRequest($this->siteDetails['site_name'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $unique_id, $this->siteDetails['email3'], 'Successful Creation of Rommy Request on '.$this->siteDetails['site_name'], $checker));

            redirect('roomy/mains/display_roommate_details/'.$roomy_finder_option);

        }else{
            $this->getRoomateRequestFormDetails();
            $this->session->set_flashdata('form_error', 'An error occurred, please try again');
            $this->page_name = 'dashboard/find_roomy';
            $this->send_to_view();
            return;
        }


    }

    private function uploadImagesForFindRoomy($update = false){

        $name = $_FILES['apartment_images']['name'];
        $file_size = $_FILES['apartment_images']['size'];
        $file_type = $_FILES['apartment_images']['type'];
        $file_tmp_name = $_FILES['apartment_images']['tmp_name'];

        if($update == true){
            if(count($name) == 0){
                return array('error_code' => 0, 'error' => 'Please upload atleast three images of your apartment');
            }
        }

        if($update === false){

            if(count($name) < 3){
                return array('error_code' => 1, 'error' => 'Please upload atleast three images of your apartment', 'success'=>array('data'=>array('new_name'=>'')));
            }

            if(count($name) > 8){
                return array('error_code' => 1, 'error' => 'You are not allowed to upload more than 8 images');
            }

            for($i = 0; $i < count($name); $i++) {

                //image format array
                $image_format_array = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');

                //check for the image size
                if ($file_size[$i] > '3000000') {
                    /*echo json_encode(array('error_code'=>1, 'error'=>'Image must not exceed 3MB'));*/
                    return array('error_code' => 1, 'error' => 'Please upload an image');
                }

                //check for the image size
                if (!in_array($file_type[$i], $image_format_array)) {
                    /*echo json_encode(array('error_code'=>1, 'error'=>'Please upload an image'));*/
                    return array('error_code' => 1, 'error' => 'Image must not exceed 3MB');
                }

            }
        }



        $new_name_array = array();
        for($i = 0; $i < count($name); $i++){

            $file_details = $this->Admin->createFileName('./resource/upload/registered_property/');
            $new_name = $file_details['new_name'];
            $file_path = './resource/upload/registered_property/' . $new_name;

            //move the file to the folder for it
            if(move_uploaded_file($file_tmp_name[$i], $file_path)){

                $new_name_array[] = $new_name;

            }

        }

        return array('error_code'=>0, 'error'=>'', 'success'=>array('data'=>array('new_name'=>implode(',', $new_name_array))));


    }

    //process the update of the find roomy form
    private function processFindRoomyDetailsUpdate(){

        $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::FIND_ROOMY_TABLE,
            array(
                'unique_id'=>trim($this->uri->segment(5))
            )
        );

        if($roomy_request_details['result'][0]['purpose'] === 'existing_apartment') {
            $this->form_validation->set_rules("rin_number", "Rin Number", "trim|required");

            $this->form_validation->set_rules("price_of_rent", "Rent", "trim|required");
            $this->form_validation->set_rules("nazac_property_storey_type", "Building Storey Type", "trim|required");
            $this->form_validation->set_rules("nazac_property_location", "Location of Apartment", "trim|required");
            $this->form_validation->set_rules("name_of_lodge", "Name of Lodge", "trim|required");
        }
        $this->form_validation->set_rules("description_of_self","Description of Self","trim|required");
        $this->form_validation->set_rules("pair_option","Possible Pair Option","trim|required");
        $this->form_validation->set_rules("prefered_gender","Preferred Gender","trim|required");
        $this->form_validation->set_rules("prefered_level","Preferred Level","trim|required");
        if($roomy_request_details['result'][0]['purpose'] === 'no_apartment') {
            $this->form_validation->set_rules("prefered_property_type", "Prefered Property/Apartment Type", "trim|required");
            $this->form_validation->set_rules("prefered_location", "Apartment/Property's Location", "trim|required");
            $this->form_validation->set_rules("amount_budgeted", "Budget", "trim|required|numeric");
        }
        // rin_number description_of_self pair_option faculty_name department_name  prefered_level
        if(!empty($_POST['pair_option']) && trim($_POST['pair_option']) == 'faculty'){
            $this->form_validation->set_rules("faculty_name","Name of Faculty","trim|required");
        }

        if(!empty($_POST['pair_option']) && trim($_POST['pair_option']) == 'department'){
            $this->form_validation->set_rules("department_name","Name of Department","trim|required");
        }

        //if validation fails
        if ($this->form_validation->run() === FALSE)
        {
            $this->getRoomateRequestFormDetails();
            $this->page_name = 'dashboard/find_roomy';
            $this->send_to_view();
            return;
        }

        //process the values and send to the database

        $description_of_self = $this->input->post("description_of_self");
        $pair_option = $this->input->post("pair_option");
        if($pair_option === 'faculty'){
            $faculty_department_name = $this->input->post("faculty_name");
        }else if($pair_option === 'department'){
            $faculty_department_name = $this->input->post("department_name");
        }else{
            $faculty_department_name = '';
        }
        $prefered_gender = $this->input->post("prefered_gender");
        $prefered_level = $this->input->post("prefered_level");

        $apartment_images = ""; $price_of_rent = ""; $nazac_property_storey_type = ""; $nazac_property_location = ""; $name_of_lodge = "";
        if($roomy_request_details['result'][0]['purpose'] === 'existing_apartment') {

            $image_upload_details = $this->uploadImagesForFindRoomy(true);

            $apartment_images = array_merge(explode(',', $roomy_request_details['result'][0]['nazac_apartment_images']), explode(',', $image_upload_details['success']['data']['new_name']));

            $apartment_images = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($apartment_images));

            $price_of_rent = $this->input->post("price_of_rent");
            $nazac_property_storey_type = $this->input->post("nazac_property_storey_type");
            $nazac_property_location = $this->input->post("nazac_property_location");
            $name_of_lodge = $this->input->post("name_of_lodge");
        }


        $prefered_property_type = ""; $prefered_location = ""; $amount_budgeted = "";
        if($roomy_request_details['result'][0]['purpose'] === 'no_apartment') {
            $prefered_property_type = $this->input->post("prefered_property_type");
            $prefered_location = $this->input->post("prefered_location");
            $amount_budgeted = $this->input->post('amount_budgeted');
        }

        //build an array for to beinserted to the db
        $unique_id = $this->Admin->createUniqueId(extras::FIND_ROOMY_TABLE, 'unique_id');
        $data_to_be_updated = array(
            'description_of_personality'=>$description_of_self,
            'room_mate_pair'=>$pair_option,
            'faculty_department_name'=>$faculty_department_name,
            'gender'=>$prefered_gender,
            'prefered_level'=>$prefered_level,
            'last_update'=>$this->thedateguy->getDatetimeNow("Africa/Lagos"),
            'prefered_property_type'=>$prefered_property_type,
            'prefered_location'=>$prefered_location,
            'nazac_apartment_images'=>$apartment_images,
            'nazac_price_of_rent'=>$price_of_rent,
            'nazac_property_storey_type'=>$nazac_property_storey_type,
            'nazac_property_location'=>$nazac_property_location,
            'name_of_lodge'=>$name_of_lodge,
            'amount_budgeted'=>$amount_budgeted
        );

        $this->db->where(array('unique_id'=>trim($this->uri->segment(5))));
        if($this->db->update(extras::FIND_ROOMY_TABLE, $data_to_be_updated)){
            $this->session->set_flashdata('form_success', 'Update was successful');
            redirect('roomy/mains/single_roomy_request/'.trim($this->uri->segment(5)));
        }else{
            $this->getRoomateRequestFormDetails();
            $this->session->set_flashdata('form_error', 'An error occurred, please try again');
            $this->page_name = 'dashboard/find_roomy';
            $this->send_to_view();
            return;
        }


    }

    private function processRoomyInterest(){

        //get the id of the request
        $room_mate_request_id = $this->input->post('room_mate_request_id');
        $description_of_self = $this->input->post('description_of_self');

        if(empty($description_of_self)){
            echo json_encode(array(
                'error_code'=>1,
                'error'=>'Description of Personality is required!'
            ));
            return;
        }

        //get the details of the response roomy request placed by this individual before
        $response_to_roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
            array(
                'id_of_the_user_that_indicated_interest'=>trim($this->user_data['nazac_id']),
                'roomy_request_id'=>$room_mate_request_id
            )
        );

        //check if there a returned value
        if($response_to_roomy_request_details['row_count'] > 0){

            if($response_to_roomy_request_details['result'][0]['interest_status'] === 'pending'){
                echo json_encode(array(
                    'error_code'=>1,
                    'error'=>'You have already made a request for this property before'
                ));
                return;
            }

            if($response_to_roomy_request_details['result'][0]['interest_status'] === 'completed'){
                //run a request and get to check if the this guy has a roomy
                $current_rent_status = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB,
                    array(
                        'nazac_id'=>trim($this->user_data['nazac_id'])
                    )
                );
                if(!empty($current_rent_status['result'][0]['nazac_clients_rin']) || !empty($current_rent_status['result'][0]['nazac_clients_roommy_rin'])){
                    echo json_encode(array(
                        'error_code'=>1,
                        'error'=>'You already have an existing apartment and can`t initiate such request at this time'
                    ));
                    return;
                }
            }

        }

        //create the unque id for the request
        $unique_id = $this->Admin->createUniqueId(
            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
            'unique_id'
        );

        $values_to_be_inserted = array(
            'unique_id'=>$unique_id,
            'roomy_request_id'=>$room_mate_request_id,
            'id_of_the_user_that_indicated_interest'=>$this->user_data['nazac_id'],
            'interest_status'=>'pending',
            'view_status'=>'not-viewed',
            'description_of_self'=>$description_of_self,
            'date_created'=>$this->thedateguy->getDateNow("Africa/Lagos"),
            'delete_status'=>'no'
        );

        if($this->db->insert(extras::RESPONSE_FOR_ROOMY_REQUEST_TB, $values_to_be_inserted)){

            //get the details of the room mate request
            $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::FIND_ROOMY_TABLE,
                array(
                    'unique_id'=>$room_mate_request_id
                )
            );
            $roomate_seeker_id = $roomy_request_details['result'][0]['roomate_seeker_id'];

            //get the email of the room mate seeker
            $details_of_room_mate_seeker = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::USER_TB,
                array(
                    'nazac_id'=>$roomate_seeker_id
                )
            );

            $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
            //send an email to the interest initiator
            $this->mailSender($this->user_data['nazac_client_email'], 'Successful Indication of Interest to a Room mate Request', Email_handler::messageForInitiationOfInterestOnARoomyRequestForTheInitiator($this->siteDetails['site_name'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $details_of_room_mate_seeker['result'][0]['nazac_clients_lname'].' '.$details_of_room_mate_seeker['result'][0]['nazac_clients_fname'], $room_mate_request_id, $this->siteDetails['email3'], 'Successful Indication of Interest to a Room mate Request on '.$this->siteDetails['site_name'], $checker));


            $checker = $this->Admin->addValueToBeAuthenticated($details_of_room_mate_seeker['result'][0]['nazac_id']);

            //send a mail to the room mate seeker
            $this->mailSender($details_of_room_mate_seeker['result'][0]['nazac_client_email'], 'Successful Indication of Interest to a Room mate Request', Email_handler::messageForInitiationOfInterestOnARoomyRequestForTheRoomySeeker($this->siteDetails['site_name'], $details_of_room_mate_seeker['result'][0]['nazac_clients_lname'].' '.$details_of_room_mate_seeker['result'][0]['nazac_clients_fname'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $room_mate_request_id, $this->siteDetails['email3'], 'Successful Indication of Interest to a Room mate Request on '.$this->siteDetails['site_name'], $checker));

            $this->session->set_flashdata('form_success', 'Your request has been submitted');

            echo json_encode(array(
                'error_code'=>0,
                'error'=>'',
                'success'=>array(
                    'message'=>'Your request has been submitted',
                    'data'=>$room_mate_request_id
                )
            ));
        }else{
            echo json_encode(array(
                'error_code'=>1,
                'error'=>'An error occurred, please try again'
            ));
        }

    }

    //decline the request
    private function finaliseDeclineRoomMate(){

        $particular_interest_indication_id = $this->input->post('particular_interest_indication_id');

        //run a select and get the current interest details
        $details_of_indicated_interest = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
            array(
                'unique_id'=>$particular_interest_indication_id
            )
        );
        //get the details of teh user that initiated teh interest
        $details_of_user_that_initiated_interest = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::USER_TB,
            array(
                'nazac_id'=>$details_of_indicated_interest['result'][0]['id_of_the_user_that_indicated_interest']
            )
        );
        $details_of_user_that_initiated_interest =  $details_of_user_that_initiated_interest['result'][0];

        $values_to_updated = array(
            'interest_status'=>'declined'
        );

        $this->db->where(array('unique_id'=>$particular_interest_indication_id));
        if($this->db->update(extras::RESPONSE_FOR_ROOMY_REQUEST_TB, $values_to_updated)){

            $this->sendMailsForDecline($details_of_user_that_initiated_interest, $details_of_indicated_interest);

            echo json_encode(array('error_code'=>0, 'success'=>array('message'=>'you have successfully declined the request')));
        }else{
            echo json_encode(array('error_code'=>0, 'error'=>'An error occurred, please try again'));
        }

    }

    private function sendMailsForDecline($details_of_user_that_initiated_interest, $details_of_indicated_interest){

        //send a mail to the interest initiator
        $checker = $this->Admin->addValueToBeAuthenticated($details_of_user_that_initiated_interest['nazac_id']);
        $this->mailSender($details_of_user_that_initiated_interest['nazac_client_email'], 'Decline of Request Room Mate', Email_handler::declineOfRoomMateRequestForInerestInitiator($this->siteDetails['site_name'], $details_of_user_that_initiated_interest['nazac_clients_lname'].' '.$details_of_user_that_initiated_interest['nazac_clients_fname'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $details_of_indicated_interest['result'][0]['roomy_request_id'], $this->siteDetails['email3'], 'Decline of Request Room Mate', $checker));

        //send mail to the roomate seeker
        $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
        $this->mailSender($this->user_data['nazac_client_email'], 'Decline of Request Room Mate', Email_handler::declineOfRoomMateRequestForRoomMateSeeker($this->siteDetails['site_name'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $details_of_user_that_initiated_interest['nazac_clients_lname'].' '.$details_of_user_that_initiated_interest['nazac_clients_fname'], $details_of_indicated_interest['result'][0]['roomy_request_id'], $this->siteDetails['email3'], 'Decline of Request Room Mate', $checker));

    }

    //accept a particular roomate
    private function finaliseAcceptRoomMate(){

        $roomy_request_id = trim($this->input->post('roomy_request_id'));
        $particular_interest_indication_id = trim($this->input->post('particular_interest_indication_id'));

        $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::FIND_ROOMY_TABLE,
            array(
                'unique_id'=>$roomy_request_id
            )
        );

        //details of the request made for room mate
        $roomy_request_details_array = $roomy_request_details['result'][0];

        $particular_interest_indication_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
            array(
                'unique_id'=>$particular_interest_indication_id
            )
        );

        $particular_interest_indication_details_array = $particular_interest_indication_details['result'][0];

        if($roomy_request_details_array['purpose'] === 'existing_apartment'){

            $rin_a = $roomy_request_details_array['listed_property_id'].'/01';
            $rin_b = $roomy_request_details_array['listed_property_id'].'/02';

            //create values for first roomy profile update
            $value_for_first_roomy = array(
                'nazac_clients_rin'=>$rin_a,
                'nazac_clients_has_roommy'=>'yes',
                'nazac_clients_roommy_rin'=>$rin_b,
            );

            //create value for second roomy update
            $value_for_second_roomy = array(
                'nazac_clients_rin'=>$rin_b,
                'nazac_clients_has_roommy'=>'yes',
                'nazac_clients_roommy_rin'=>$rin_a,
            );

        }

        $second_user_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::USER_TB,
            array(
                'nazac_id'=>$particular_interest_indication_details_array['id_of_the_user_that_indicated_interest']
            )
        );

        if($roomy_request_details_array['purpose'] === 'no_apartment'){

            $rin_a = $second_user_details['result'][0]['nazac_clients_rin'].'/01';
            $rin_b = $second_user_details['result'][0]['nazac_clients_rin'].'/02';

            //create values for first roomy profile update
            $value_for_first_roomy = array(
                'nazac_clients_rin'=>$rin_b,
                'nazac_clients_has_roommy'=>'yes',
                'nazac_clients_roommy_rin'=>$rin_a,
            );

            //create value for second roomy update
            $value_for_second_roomy = array(
                'nazac_clients_rin'=>$rin_a,
                'nazac_clients_has_roommy'=>'yes',
                'nazac_clients_roommy_rin'=>$rin_b,
            );

        }

        //update the guy that created the post first
        $this->db->where(array('nazac_id'=>$roomy_request_details_array['roomate_seeker_id']));
        $this->db->update(
            extras::USER_TB,
            $value_for_first_roomy
        );

        //update the second profike with the rin
        $this->db->where(array('nazac_id'=>$particular_interest_indication_details_array['id_of_the_user_that_indicated_interest']));
        $this->db->update(
            extras::USER_TB,
            $value_for_second_roomy
        );

        $values_to_updated = array(
            'roomate_find_status'=>'done'
        );

        //update all the response to the request to done
        $this->db->where(array('roomy_request_id'=>$roomy_request_id));
        $this->db->update(extras::RESPONSE_FOR_ROOMY_REQUEST_TB, array('interest_status'=>'declined'));

        //update all the response to the request to done
        $this->db->where(array('unique_id'=>$particular_interest_indication_id));
        $this->db->update(extras::RESPONSE_FOR_ROOMY_REQUEST_TB, array('interest_status'=>'done'));

        //update the roomy request to done
        $this->db->where(array('unique_id'=>$roomy_request_id));
        if($this->db->update(extras::FIND_ROOMY_TABLE, $values_to_updated)){

            $this->sendMailsForAcceptanceOfRoomyInterest($second_user_details);

            echo json_encode(array('error_code'=>0, 'success'=>array('message'=>'You successfully  Accepted the request of '.$second_user_details['result'][0]['nazac_clients_lname'].' '.$second_user_details['result'][0]['nazac_clients_fname'].' to be your room mate')));
        }else{
            echo json_encode(array('error_code'=>0, 'error'=>'An error occurred, please try again'));
        }

    }

    private function sendMailsForAcceptanceOfRoomyInterest($second_user_details){

        //send a mail to the interest initiator
        $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
        $this->mailSender($this->user_data['nazac_client_email'], 'Acceptance of Room Mate Request', Email_handler::messageForAcceptanceOfRoomyRequestForSeeker($this->siteDetails['site_name'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], $second_user_details['result'][0]['nazac_clients_lname'].' '.$second_user_details['result'][0]['nazac_clients_fname'], '', $this->siteDetails['email3'], 'Acceptance of Room Mate Request', $checker));

        //send mail interest indicator
        $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
        $this->mailSender($this->user_data['nazac_client_email'], 'Acceptance of Room Mate Request', Email_handler::messageForAcceptanceOfRoomyRequestForInterestInitiator($this->siteDetails['site_name'], $second_user_details['result'][0]['nazac_clients_lname'].' '.$second_user_details['result'][0]['nazac_clients_fname'], $this->user_data['nazac_clients_lname'].' '.$this->user_data['nazac_clients_fname'], '', $this->siteDetails['email3'], 'Acceptance of Room Mate Request', $checker));

    }

    ///get area
    //get property for find roomate
    private function getPropertyForFindRoom(){

        //explode the incoming value
        $exploded_rin = explode('-', $this->uri->segment(4));
        if(count($exploded_rin) != 2){
            echo json_encode(array('error_code'=>1, 'error'=>'Invalid Rin Number Format, Please Supply valid Rin Number'));
            return;
        }

        //select the registered properties using the property number
        $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
            array('nazac_property_number'=>$exploded_rin[0])
        );

        if($registered_property_details['row_count'] == 0){
            echo json_encode(array('error_code'=>1, 'error'=>'We could not find a property with the supplied Rin Number, Please cross check Rin Number'));
            return;
        }

        $main_property_id = $registered_property_details['result'][0]['nazac_property_id'];

        $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::PROPERTY_LISTING_TABLE,
            array(
                'nazaac_main_property_id'=>$main_property_id,
                'nazac_property_room_number'=>$exploded_rin[1]
            )
        );

        //SET THE DATA to be sent to view
        $data = array(
            'listed_property_details_count'=>$listed_property_details['row_count'],
            'registered_property_details_count'=>$registered_property_details['row_count']
        );

        echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'','data'=>$data)));

    }

    //display roomate requests
    private function displayRoomate(){

        $options = array('existing_apartment', 'no_apartment');

        if(in_array(trim($this->uri->segment(4)), $options)){

            //check the total number of rows in the db
            $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::FIND_ROOMY_TABLE,
                array(
                    'roomate_find_status'=>'pending',
                    'purpose'=>trim($this->uri->segment(4))
                )
            );

            $numrows = $roomy_request_details['row_count'];

            $rowsperpage = 20;
            $current_page = $this->uri->segment(5);
            $pagination_details = $this->setPaginationHtml($current_page, $numrows, $rowsperpage, 'roomy/mains/display_roommate_details/'.trim($this->uri->segment(4)));

            $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::FIND_ROOMY_TABLE,
                array(
                    'roomate_find_status'=>'pending',
                    'purpose'=>trim($this->uri->segment(4)),
                    'delete_status'=>'no'
                ),
                'id',
                'DESC'
            );

            $roomy_request_details_array = $roomy_request_details['result'];

            $registered_property_details_array = array();
            $listed_property_details_array = array();
            $details_of_user_that_made_request_array = array();
            $reply_to_roomy_request_row_count_array = array();
            $interest_for_roomy_request_array = array();
            $particular_row_count_of_a_request_array = array();
            /*$existing_apartment_count = 0;*/

            //get the count for the existing property
            $existing_apartment_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::USER_TB,
                array(
                    'nazac_id'=>$this->user_data['nazac_id'],
                    'nazac_clients_rin!='=>'',
                    'nazac_clients_roommy_rin'=>''
                )
            );
            $existing_apartment_count = $existing_apartment_details['row_count'];

            if ($roomy_request_details['row_count'] > 0) {

                    foreach ($roomy_request_details_array as $k => $value) {

                        if($this->uri->segment(4)==='existing_apartment') {

                            $exploded_property_id = explode('/', $value['listed_property_id']);

                            $registered_property_number = $exploded_property_id[0];
                            $room_number = $exploded_property_id[1];

                            //run a select and get the property that contains the booked aprtment
                            $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                                array(
                                    'nazac_property_number' => $registered_property_number
                                )
                            );

                            $registered_property_details_array[] = $registered_property_details['result'][0];

                            $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                                extras::PROPERTY_LISTING_TABLE,
                                array(
                                    'nazac_property_room_number' => $room_number,
                                    'nazaac_main_property_id' => $registered_property_details['result'][0]['nazac_property_id']
                                )
                            );

                            $listed_property_details_array[] = $listed_property_details['result'][0];

                        }

                        $details_of_user_that_made_request = $this->Admin->dbSelectWithOrWithoutParameter(
                            extras::USER_TB,
                            array(
                                'nazac_id' => $value['roomate_seeker_id']
                            )
                        );

                        $details_of_user_that_made_request_array[] = $details_of_user_that_made_request['result'][0];

                        //get the row count of the reply to request
                        $reply_to_roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
                            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
                            array(
                                'roomy_request_id' => $roomy_request_details['result'][0]['unique_id'],
                                'interest_status'=>'pending',
                                'delete_status'=>'no'
                            )
                        );

                        //get the count of the selected notification replies
                        $reply_to_roomy_request_row_count_array[] = $reply_to_roomy_request_details['row_count'];

                        //get the count of a reply associated withe current user
                        $particular_row_count_of_a_request = 0;
                        if($reply_to_roomy_request_details['row_count'] > 0){


                            foreach($reply_to_roomy_request_details['result'] as $value){
                                if($this->session->userdata('$data')){
                                    if($value['id_of_the_user_that_indicated_interest'] === $this->user_data['nazac_id']){

                                        $particular_row_count_of_a_request = 1;

                                    }
                                }
                            }

                        }
                        $particular_row_count_of_a_request_array[] = $particular_row_count_of_a_request;

                        $reply_to_roomy_request = array();
                        if($reply_to_roomy_request_details['row_count'] == 1){
                            $reply_to_roomy_request = $reply_to_roomy_request_details['result'][0];
                        }
                        $interest_for_roomy_request_array[] = $reply_to_roomy_request;

                    }


                }


            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'roomy_request_details_array'=>$roomy_request_details_array,
                    'registered_property_details_array'=>$registered_property_details_array,
                    'listed_property_details_array'=>$listed_property_details_array,
                    'title'=>'List of Pending Request Made for Roomate',
                    'details_of_user_that_made_request_array'=>$details_of_user_that_made_request_array,
                    'offset'=>$pagination_details['offset'],
                    'previous_link'=>$pagination_details['previous_link'],
                    'looped_links'=>$pagination_details['looped_links'],
                    'next_links'=>$pagination_details['next_links'],
                    'reply_to_roomy_request_row_count_array'=>$reply_to_roomy_request_row_count_array,
                    'interest_for_roomy_request_array'=>$interest_for_roomy_request_array,
                    'particular_row_count_of_a_request_array'=>$particular_row_count_of_a_request_array,
                    'existing_apartment_count'=>$existing_apartment_count
                )
                //'$existing_apartment_count'=>$existing_apartment_count
            );

            $this->page_name = 'dashboard/roomy_request_details';
            $this->send_to_view();
            return;
        }

        $this->show404ErrorPage();

    }

    private function getRoomateRequestFormDetails(){

        $roomy_request_details_array = array();
        if($this->uri->segment(4) === 'edit'){
            $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::FIND_ROOMY_TABLE,
                array(
                    'unique_id'=>trim($this->uri->segment(5))
                )
            );
            $roomy_request_details_array = $roomy_request_details['result'];
        }

        //select user rin number
        $nazac_clients_rin = $this->user_data['nazac_clients_rin'];

        $registered_property_details_array = $this->getPropertyDetailsForRoomateRequest($nazac_clients_rin);

        $listed_property_details_array = $this->getListedPropertyDetailsForRoomateRequest($registered_property_details_array, $nazac_clients_rin);

        $this->createArrayOfDataToBeReturnedToView(
            array(
                'nazac_clients_rin'=>$nazac_clients_rin,
                'roomy_request_details_array'=>$roomy_request_details_array,
                'registered_property_details_array'=>$registered_property_details_array,
                'listed_property_details_array'=>$listed_property_details_array
            )
        );//

    }

    private function getPropertyDetailsForRoomateRequest($nazac_clients_rin){

        $registered_property_details_array = array();
        //select the property details
        if(!empty($nazac_clients_rin)){

            $exploded_rin = explode('/', $nazac_clients_rin);
            $property_number = $exploded_rin[0];

            $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array(
                    'nazac_property_number'=>$property_number
                )
            );
            $registered_property_details_array = $registered_property_details['result'];
        }

        return $registered_property_details_array;

    }

    private function getListedPropertyDetailsForRoomateRequest($registered_property_details_array, $nazac_clients_rin){

        $listed_property_details_array = array();
        //select the property details
        if(count($registered_property_details_array) > 0){

            $exploded_rin = explode('/', $nazac_clients_rin);
            $room_number = $exploded_rin[1];

            $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array(
                    'nazaac_main_property_id'=>$registered_property_details_array[0]['nazac_property_id'],
                    'nazac_property_room_number'=>$room_number
                )
            );
            $listed_property_details_array = $listed_property_details['result'];
        }

        return $listed_property_details_array;

    }

    //view single roomy request
    private function singleRoomyRequest(){

        $roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::FIND_ROOMY_TABLE,
            array(
                'unique_id'=>trim($this->uri->segment(4)),
                'delete_status'=>'no'
            )
        );

        $roomy_request_details_array = $roomy_request_details['result'];

        $registered_property_details_array = array();
        $listed_property_details_array = array();
        $details_of_user_that_made_request_array = array();
        $interest_for_roomy_row_count = 0;
        $interest_for_roomy_request_array = array();

        if ($roomy_request_details['row_count'] > 0) {

            foreach ($roomy_request_details_array as $k => $value) {

                if($value['purpose']==='existing_apartment') {

                    $exploded_property_id = explode('/', $value['listed_property_id']);

                    $registered_property_number = $exploded_property_id[0];
                    $room_number = $exploded_property_id[1];

                    //run a select and get the property that contains the booked aprtment
                    $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                        extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                        array(
                            'nazac_property_number' => $registered_property_number
                        )
                    );

                    $registered_property_details_array = $registered_property_details['result'][0];

                    $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                        extras::PROPERTY_LISTING_TABLE,
                        array(
                            'nazac_property_room_number' => $room_number,
                            'nazaac_main_property_id' => $registered_property_details['result'][0]['nazac_property_id']
                        )
                    );

                    $listed_property_details_array = $listed_property_details['result'][0];

                }

                $details_of_user_that_made_request = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB,
                    array(
                        'nazac_id' => $value['roomate_seeker_id']
                    )
                );

                $details_of_user_that_made_request_array = $details_of_user_that_made_request['result'][0];

                $interest_for_roomy_request = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
                    array(
                        'roomy_request_id' => $value['unique_id'],
                        'id_of_the_user_that_indicated_interest'=>$this->user_data['nazac_id'],
                        'interest_status'=>'pending',
                        'delete_status'=>'no'
                    )
                );
                if($interest_for_roomy_request['row_count'] == 1){
                    $interest_for_roomy_row_count = $interest_for_roomy_request['row_count'];
                    $interest_for_roomy_request_array = $interest_for_roomy_request['result'][0];
                }

                $all_interest_for_roomy_request = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
                    array(
                        'roomy_request_id' => $value['unique_id']
                    )
                );

                $all_interest_for_roomy_request_count = $all_interest_for_roomy_request['row_count'];

            }


        }

        //SET THE DATA to be sent to view
        $this->createArrayOfDataToBeReturnedToView(
            array(
                'singleAgent'=>$details_of_user_that_made_request_array,
                'roomy_request_details_array'=>$roomy_request_details_array,
                'reg_property_data'=>$registered_property_details_array,
                'singleProperty'=>$listed_property_details_array,
                'title'=>'List of Pending Request Made for Roomate',
                'interest_for_roomy_row_count'=>$interest_for_roomy_row_count,
                'interest_for_roomy_request_array'=>$interest_for_roomy_request_array,
                'all_interest_for_roomy_request_count'=>$all_interest_for_roomy_request_count
            )
        );
        $this->page_name = 'dashboard/single_roomy_request';
        $this->send_to_view();

    }

    //get request for opening pages
    private function findRoomate(){
        $this->getRoomateRequestFormDetails();
        $this->page_name = 'dashboard/find_roomy';
        $this->send_to_view();
    }

    //select the notifications for the interest generated for a particular roomy request
    private function viewInterest(){

        $interest_to_roomy_request_details_array = array();
        $interest_to_roomy_request_details = $this->Admin->dbSelectWithOrWithoutParameter(
            extras::RESPONSE_FOR_ROOMY_REQUEST_TB,
            array(
                'roomy_request_id'=>trim($this->uri->segment(4))
            )//'interest_status'=>'pending'
        );

        $user_details_array = array();
        if($interest_to_roomy_request_details['row_count'] > 0){

            $interest_to_roomy_request_details_array = $interest_to_roomy_request_details['result'];

            foreach($interest_to_roomy_request_details_array as $k => $value){

                $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::USER_TB,
                    array(
                        'nazac_id'=>$value['id_of_the_user_that_indicated_interest']
                    )
                );

            }

            $user_details_array[] = $user_details['result'][0];

        }

        $this->createArrayOfDataToBeReturnedToView(
            array(
                'user_details_array'=>$user_details_array,
                'interest_to_roomy_request_details'=>$interest_to_roomy_request_details_array,
                'title'=>'Interests indicated for Room mate request'
            )
        );

        $this->page_name = 'dashboard/responses_to_roomy_request';
        $this->send_to_view();
        return;

    }

    //for delete of roomy request
    private function deleteRoomateRequest(){

        $this->db->where(array('unique_id'=>$this->input->post('roomy_request_id')));
        $this->db->update(extras::FIND_ROOMY_TABLE, array('delete_status'=>'yes'));

        $this->db->where(array('roomy_request_id'=>$this->input->post('roomy_request_id')));
        $this->db->update(extras::RESPONSE_FOR_ROOMY_REQUEST_TB, array('delete_status'=>'yes'));

        echo json_encode(array('error_code'=>0, 'success'=>array('message'=>'You have successfully deleted this room mate request')));

    }

    //create array of data to be sent to the view
    function createArrayOfDataToBeReturnedToView($data_array){

        if(count($data_array) > 0){

            foreach($data_array as $key => $value){
                $this->column_names[] = $key;
                $this->column_values[] = $value;
            }

        }

    }

    //mail sending function
    function mailSender($receiver_email, $subject, $message){

        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: '.$this->siteDetails['site_name'].' <'.$this->siteDetails['email1'].'>' . "\r\n";

        //send an email to user
        if(mail($receiver_email,$subject,$message,$header)){
            return true;
        }else{
            return false;
        }

    }

    //main method
    function mains()//
    {

        switch ($this->uri->segment(3)) {

            case 'find_roomate':
                $this->findRoomate();
                break;
            case 'get_property_for_find_room':
                $this->getPropertyForFindRoom();
                break;
            case 'process_find_roomy_form':
                $this->processFindRoomyForm();
                break;
            case 'display_roommate_details':
                $this->displayRoomate();
                break;
            case 'display_all_roommate_request':
                $this->displayAllRoomateRequest();
                break;
            case 'single_roomy_request':
                $this->singleRoomyRequest();
                break;
            case 'process_find_roomy_details_update':
                $this->processFindRoomyDetailsUpdate();
                break;
            case 'process_roomy_interest':
                $this->processRoomyInterest();
                break;
            case 'view_interest':
                $this->viewInterest();
                break;
            case 'finalise_decline_room_mate':
                $this->finaliseDeclineRoomMate();
                break;
            case 'finalise_accept_room_mate':
                $this->finaliseAcceptRoomMate();
                break;
            case 'delete_roomate_request':
                $this->deleteRoomateRequest();
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
        if($this->page_name == 'dashboard/find_roomy'){
            $data['property_type_for_find_a_roomy'] = array('One Room','One room Selfcon', 'Two Bedroom Flat', 'Three Bedroom Flat', 'Four Bedroom Flat');
        }

        //add more data values on the fly
        if(count($this->column_names) > 0 && count($this->column_values) > 0){

            for($i = 0; $i < count($this->column_names); $i++){
                $data[$this->column_names[$i]] = $this->column_values[$i];
            }

        }

        $data['propertyType'] = $this->Dbmodel->getAllPropertyType();
        $data['siteDetail'] = $this->Dbmodel->getSiteDetails();
        $data['user_data'] = @$this->Dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);
        $data['account_type'] = $this->Dbmodel->getAllAccountType();
        $data['locations'] = $this->Dbmodel->getAllLocations();
        $data['category'] = $this->Dbmodel->getAllPropertyCategory();
        $this->load->view('head',$data);
        $this->load->view('navig',$data);
        $this->load->view($this->page_name,$data);
        $this->load->view('footer',$data);
        $this->load->view('scripts',$data);
        $this->load->view('dashboard/jsfile',$data);
        if($this->page_name == 'dashboard/listed_property_media' || $this->page_name == 'dashboard/property_media'){
            $this->load->view('dashboard/property_media_script_link');
        }

        $this->load->view('end');

    }

}

?>