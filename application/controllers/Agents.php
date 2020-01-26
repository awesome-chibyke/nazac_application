<?php

    class Agents extends CI_Controller {

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
            //check for login
            $this->lib->checkIfLoggin();

            //for db columns
            $this->DbColumns();
            $this->errorFieldsForDiffForms();

            //get the site settings details
            $this->siteDetails = $this->Dbmodel->getSiteDetails();

            //call the db show
            $this->column_names = array('siteDetail');
            $this->column_values = array($this->siteDetails);

            //checks for user that is not loged in
            if($this->lib->authLoginSTAY() == true){

                //get the user details
                $this->user_data = @$this->Dbmodel->getLogginUserData(@$_SESSION['_nazlogger']);

                //add the user details to the view
                $this->column_names[] = 'user_data';
                $this->column_values[] = $this->user_data;

            }
            $faculty_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::FACULTY_TABLE
            );

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'faculty_details'=>$faculty_details['result']
                )
            );
        }

        //function that makes the columns db avalable for use
        private function DbColumns(){

            $this->user_table_columns = explode(',', extras::USER_TB);
            $this->nazaac_property_registration_columns = explode(',', extras::NAZAC_PROPERTY_REGISTRATION_COLUMN);
            $this->property_type_table_columns = explode(',', extras::PROPERTY_TYPE_TABLE_COLUMNS);
             $this->property_listing_table_column = explode(',',extras::PROPERTY_LISTING_TABLE_COLUMN);
            $this->setup_table_column = explode(',',extras::SETUP_TABLE_COLUMN);
            $this->property_location_table_column = explode(',',extras::LOCATION_TABLE_COLUMN);
            $this->property_category_table_column = explode(',',extras::PROPERTY_CATEGORY_TABLE_COLUMN);
            $this->payment_mood_columns = explode(',',extras::PAYMENT_MOOD_TABLE_COLUMN);
            $this->booked_property_columns = explode(',',extras::BOOKED_PROPERTY_TABLE_COLUMNS);

        }//

        private function errorFieldsForDiffForms(){

            $this->property_addition_error_form = array("title_of_lodge"=>'', "nazac_property_category"=>'',"nazac_property_type"=>'',"nazac_property_purpose"=>'',"currency"=>'', "price_attached"=>'',"payment_mood"=>'', "property_status"=>'', "country_located"=>'', "state_located"=>'', "lga_located"=>'', "town_located"=>'', "street_with_no"=>'', "description"=>'', 'main_notification'=>'', 'room_no'=>'', 'nazac_property_agents_fee'=>'', 'nazac_property_legal_fee'=>'');

            $this->property_addition_form_field_names = array('Title', 'Property Category', 'Type of Property', 'Property Purpose', 'Currency', 'Price', 'Payment Mood', 'Property Status', 'Country',  'State', 'Local Government Area', 'Town/Area', 'Street Address', 'Description', 'Legal Fee', 'Agents Fee', 'Room Number');

            $this->property_addition_form_name_attr = array("title_of_lodge", "nazac_property_category","nazac_property_type","nazac_property_purpose","currency", "price_attached","payment_mood", "property_status", "country_located", "state_located", "lga_located", "town_located", "street_with_no", "description", "nazac_property_legal_fee", "nazac_property_agents_fee", "room_no");

        }

        //process the nazac registration form
        private function processPropertyRegistrationForm(){

            $this->form_validation->set_rules("no_of_apartment","Number of Apartment","trim|required|numeric");
            $this->form_validation->set_rules("name_of_lodge","Lodge Name","trim|required");
            $this->form_validation->set_rules("address_of_property","Address of Property","trim|required");
            $this->form_validation->set_rules("nazac_property_location","Location of Property","trim|required");
            $this->form_validation->set_rules("property_type","Type of Property","trim|required");
            $this->form_validation->set_rules("nazac_property_storey_type","Storey Type","trim|required");
            $this->form_validation->set_rules("nazac_property_closest_landmark","Closest Landmark","trim|required");
            $this->form_validation->set_rules("nazac_property_purpose","Property Purpose","trim|required");
            $this->form_validation->set_rules("nazac_property_agents_fee","Agents Fee","trim|required");
            $this->form_validation->set_rules("nazac_property_legal_fee","Legal Fee","trim|required");
            $this->form_validation->set_rules("description","Description of Property","trim|required");
            $this->form_validation->set_rules("currency","Currency","trim|required");
            $this->form_validation->set_rules("price_attached","Price Attached to Property","trim|required|numeric");

            $this->form_validation->set_rules("nazac_property_country","Country","trim|required");
            $this->form_validation->set_rules("nazac_property_state","State","trim|required");
            $this->form_validation->set_rules("nazac_property_local_gov_area","Local Government","trim|required");
            $this->form_validation->set_rules("nazac_property_town","Town/City","trim|required");
            $this->form_validation->set_rules("nazac_property_street_address","Address","trim|required");
            $this->form_validation->set_rules("older_price","Older Price","trim|numeric");
            $this->form_validation->set_rules("no_of_apartment","Number of Apartment","trim|numeric");
            $this->form_validation->set_rules("no_of_parking_space","Number of Parking Space","trim|numeric");

            $this->form_validation->set_rules("longitude","Longitude","trim|required|numeric");
            $this->form_validation->set_rules("latitude","Latitude","trim|required|numeric");

            //if validation fails
            if ($this->form_validation->run() === FALSE)
            {
                //print_r(validation_errors()); die();
                $this->getDetailsForPropetyRegistrationForm();
                $this->page_name = 'dashboard/register_property';
                $this->send_to_view();
                return;
            }

            $name_of_lodge = $this->input->post('name_of_lodge');
            $address_of_property = $this->input->post('address_of_property');
            $nazac_property_location = $this->input->post('nazac_property_location');
            $property_type = $this->input->post('property_type');
            $nazac_property_storey_type = $this->input->post('nazac_property_storey_type');
            $nazac_property_amenities = $this->input->post('nazac_property_amenities');
            $bad_defects = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('bad_defects')));
            $nazac_property_closest_landmark = $this->input->post('nazac_property_closest_landmark');

            $no_of_apartment = $this->input->post('no_of_apartment');
            $rating_of_property = $this->input->post('rating_of_property');

            $nazac_property_distance_from_landmark = $this->input->post('nazac_property_distance_from_landmark');
            $nazac_property_caretaker_name = $this->input->post('nazac_property_caretaker_name');
            $nazac_property_caretaker_email = "";//$this->input->post('nazac_property_caretaker_email');
            $nazac_property_caretaker_phone = $this->input->post('nazac_property_caretaker_phone');
            $nazac_property_caretaker_phone_2 = $this->input->post('nazac_property_caretaker_phone_2');
            $nazac_property_caretaker_ac_nom = $this->input->post('nazac_property_caretaker_ac_nom');
            $nazac_property_caretaker_ac_name = $this->input->post('nazac_property_caretaker_ac_name');
            $nazac_property_caretaker_address = "";//$this->input->post('nazac_property_caretaker_address');
            $nazac_property_caretaker_bank_name = $this->input->post('nazac_property_caretaker_bank_name');
            $nazac_property_youtube_link = $this->input->post('nazac_property_youtube_link');
            $nazac_property_purpose = $this->input->post('nazac_property_purpose');

            $nazac_property_legal_fee = $this->input->post('nazac_property_legal_fee');
            $nazac_property_agents_fee = $this->input->post('nazac_property_agents_fee');
            $longitude = $this->input->post('longitude');
            $latitude = $this->input->post('latitude');
            $description = $this->input->post('description');
            $currency = $this->input->post('currency');
            $price_attached = $this->input->post('price_attached');
            $older_price = $this->input->post('older_price');

            $nazac_property_country = $this->input->post('nazac_property_country');
            $nazac_property_state = $this->input->post('nazac_property_state');
            $nazac_property_local_gov_area = $this->input->post('nazac_property_local_gov_area');
            $nazac_property_town = $this->input->post('nazac_property_town');
            $street_with_no = $this->input->post('nazac_property_street_address');
            $no_of_parking_space = $this->input->post('no_of_parking_space');
            $apartment_standard = $this->input->post('apartment_standard');

            //get the location details
            $location_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::LOCATION_TABLE,
                array($this->property_location_table_column[0]=>$nazac_property_location)
            );

            //get the other values needed for the addition to the table
            $unique_id = $this->createUniqueId(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, 'nazac_property_id');

            //create the property number $result_array
            $property_number = $location_details['result'][0][$this->property_location_table_column[3]].'0001';
            if($this->createPropertyNumber() !== ""){

                $property_number = $this->createPropertyNumber() + 1;

            }

            //declare an empty amenities and property amenity array
            $implodeed_amenities = ''; $nazac_property_amenities_array = array();
            //work on the amenities field values
            for($i = 0; $i < count($nazac_property_amenities); $i++){

                if(!empty($nazac_property_amenities[$i])){
                    $nazac_property_amenities_array[] = $nazac_property_amenities[$i];
                }

            }

            //if the count of the array is greater than 0
            if(count($nazac_property_amenities_array) > 0){
                //implode the array that was just created
                $implodeed_amenities = implode(',', $nazac_property_amenities_array);
            }

            //insert the daetails into the db
            //log user to the login validator database
            $data_for_property_registration = array(
                $this->nazaac_property_registration_columns[0]=>$unique_id,
                $this->nazaac_property_registration_columns[1]=>$property_number,
                $this->nazaac_property_registration_columns[2]=>$name_of_lodge,
                $this->nazaac_property_registration_columns[3]=>$address_of_property,
                $this->nazaac_property_registration_columns[6]=>$nazac_property_youtube_link,
                $this->nazaac_property_registration_columns[7]=>$nazac_property_location,
                $this->nazaac_property_registration_columns[8]=>$property_type,
                $this->nazaac_property_registration_columns[9]=>$nazac_property_storey_type,
                $this->nazaac_property_registration_columns[10]=>$implodeed_amenities,
                $this->nazaac_property_registration_columns[11]=>$nazac_property_closest_landmark,
                $this->nazaac_property_registration_columns[12]=>$nazac_property_distance_from_landmark,
                $this->nazaac_property_registration_columns[13]=>$nazac_property_caretaker_name,
                $this->nazaac_property_registration_columns[14]=>$nazac_property_caretaker_email,
                $this->nazaac_property_registration_columns[15]=>$nazac_property_caretaker_phone,
                $this->nazaac_property_registration_columns[16]=>$nazac_property_caretaker_address,
                $this->nazaac_property_registration_columns[17]=>$nazac_property_caretaker_ac_name,
                $this->nazaac_property_registration_columns[18]=>$nazac_property_caretaker_ac_nom,
                $this->nazaac_property_registration_columns[19]=>$nazac_property_caretaker_bank_name,
                $this->nazaac_property_registration_columns[20]=>$this->lib->getDate(),
				"nazac_property_last_update"=>$this->lib->getDate(),
				"nazac_property_thumbnail"=>"1.png",
                'agent_incahrge_id'=>$this->user_data['nazac_id'],
                'no_of_apartment'=>$no_of_apartment,
                'rating_of_property'=>$rating_of_property,
                'nazac_property_caretaker_phone_2'=>$nazac_property_caretaker_phone_2,
                'nazac_property_state'=>$nazac_property_state,
                'nazac_property_local_gov_area'=>$nazac_property_local_gov_area,
                'nazac_property_town'=>$nazac_property_town,
                'nazac_property_street_address'=>$street_with_no,
                'nazac_property_street_location'=>"",
                'nazac_property_country'=>$nazac_property_country,
                'nazac_property_bad_defects'=>$bad_defects,
                'nazac_property_purpose'=>$nazac_property_purpose,
                'nazac_property_agents_fee'=>$nazac_property_agents_fee,
                'nazac_property_legal_fee'=>$nazac_property_legal_fee,
                'nazac_property_map_cordinates'=>$longitude.','.$latitude,
                'nazac_property_description'=>$description,
                'nazac_property_currency'=>$currency,
                'nazac_property_price'=>$price_attached,
                'nazac_property_older_price'=>$older_price,
                'no_of_parking_space'=>$no_of_parking_space,
                'nazac_apartment_standard'=>$apartment_standard
            );

            if($this->db->insert(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, $data_for_property_registration)){

                redirect(base_url('agents/mains/upload_property_media/'.$unique_id), 'refresh');

            }else{
                redirect(base_url('agents/mains/register_property/'), 'refresh');
            }

        }

        private function updatePropertyRegistration(){

            $this->form_validation->set_rules("no_of_apartment","Number of Apartment","trim|required|numeric");
            $this->form_validation->set_rules("name_of_lodge","Lodge Name","trim|required");
            $this->form_validation->set_rules("address_of_property","Address of Property","trim|required");
            $this->form_validation->set_rules("nazac_property_location","Location of Property","trim|required");
            $this->form_validation->set_rules("property_type","Type of Property","trim|required");
            $this->form_validation->set_rules("nazac_property_storey_type","Storey Type","trim|required");
            $this->form_validation->set_rules("nazac_property_closest_landmark","Closest Landmark","trim|required");
            $this->form_validation->set_rules("nazac_property_purpose","Property Purpose","trim|required");
            $this->form_validation->set_rules("nazac_property_agents_fee","Agents Fee","trim|required");
            $this->form_validation->set_rules("nazac_property_legal_fee","Legal Fee","trim|required");
            $this->form_validation->set_rules("description","Description of Property","trim|required");
            $this->form_validation->set_rules("currency","Currency","trim|required");
            $this->form_validation->set_rules("price_attached","Price Attached to Property","trim|required|numeric");

            $this->form_validation->set_rules("nazac_property_country","Country","trim|required");
            $this->form_validation->set_rules("nazac_property_state","State","trim|required");
            $this->form_validation->set_rules("nazac_property_local_gov_area","Local Government","trim|required");
            $this->form_validation->set_rules("nazac_property_town","Town/City","trim|required");
            $this->form_validation->set_rules("nazac_property_street_address","Address","trim|required");

            $this->form_validation->set_rules("older_price","Older Price","trim|numeric");
            $this->form_validation->set_rules("no_of_apartment","Number of Apartment","trim|numeric");
            $this->form_validation->set_rules("no_of_parking_space","Number of Parking Space","trim|numeric");

            $this->form_validation->set_rules("longitude","Longitude","trim|required|numeric");
            $this->form_validation->set_rules("latitude","Latitude","trim|required|numeric");

            //if validation fails
            if ($this->form_validation->run() === FALSE)
            {

                $this->getDetailsForPropetyRegistrationForm();
                $this->page_name = 'dashboard/register_property';
                $this->send_to_view();
                return;
            }//

            $nazac_property_caretaker_phone_2 = $this->input->post('nazac_property_caretaker_phone_2');
            $no_of_apartment = $this->input->post('no_of_apartment');
            $rating_of_property = $this->input->post('rating_of_property');

            $name_of_lodge = $this->input->post('name_of_lodge');
            $address_of_property = $this->input->post('address_of_property');
            $nazac_property_location = $this->input->post('nazac_property_location');
            $property_type = $this->input->post('property_type');

            $nazac_property_purpose = $this->input->post('nazac_property_purpose');
            $currency = $this->input->post('currency');
            $older_price = $this->input->post('older_price');
            $price_attached = $this->input->post('price_attached');
            $no_of_parking_space = $this->input->post('no_of_parking_space');
            $bad_defects = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('bad_defects')));
            $nazac_property_amenities = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('nazac_property_amenities')));
            $longitude = $this->input->post('longitude');
            $latitude = $this->input->post('latitude');
            $nazac_property_legal_fee = $this->input->post('nazac_property_legal_fee');
            $nazac_property_agents_fee = $this->input->post('nazac_property_agents_fee');
            $description = $this->input->post('description');

            $nazac_property_storey_type = $this->input->post('nazac_property_storey_type');
            $nazac_property_closest_landmark = $this->input->post('nazac_property_closest_landmark');
            $nazac_property_distance_from_landmark = $this->input->post('nazac_property_distance_from_landmark');
            $nazac_property_caretaker_name = $this->input->post('nazac_property_caretaker_name');
            $nazac_property_caretaker_email = $this->input->post('nazac_property_caretaker_email');
            $nazac_property_caretaker_phone = $this->input->post('nazac_property_caretaker_phone');
            $nazac_property_caretaker_ac_nom = $this->input->post('nazac_property_caretaker_ac_nom');
            $nazac_property_caretaker_ac_name = $this->input->post('nazac_property_caretaker_ac_name');
            $nazac_property_caretaker_address = $this->input->post('nazac_property_caretaker_address');
            $nazac_property_caretaker_bank_name = $this->input->post('nazac_property_caretaker_bank_name');
            $nazac_property_youtube_link = $this->input->post('nazac_property_youtube_link');
            $nazac_property_country = $this->input->post('nazac_property_country');
            $nazac_property_state = $this->input->post('nazac_property_state');
            $nazac_property_local_gov_area = $this->input->post('nazac_property_local_gov_area');
            $nazac_property_town = $this->input->post('nazac_property_town');
            $street_with_no = $this->input->post('nazac_property_street_address');
            $apartment_standard = $this->input->post('apartment_standard');

            //nazac_property_country nazac_property_state nazac_property_local_gov_area nazac_property_town street_with_no

            //insert the daetails into the db
            //log user to the login validator database
            $data_for_property_registration = array(
                $this->nazaac_property_registration_columns[2]=>$name_of_lodge,
                $this->nazaac_property_registration_columns[3]=>$address_of_property,
                $this->nazaac_property_registration_columns[6]=>$nazac_property_youtube_link,
                $this->nazaac_property_registration_columns[7]=>$nazac_property_location,
                $this->nazaac_property_registration_columns[8]=>$property_type,
                $this->nazaac_property_registration_columns[9]=>$nazac_property_storey_type,
                $this->nazaac_property_registration_columns[10]=>$nazac_property_amenities,
                $this->nazaac_property_registration_columns[11]=>$nazac_property_closest_landmark,
                $this->nazaac_property_registration_columns[12]=>$nazac_property_distance_from_landmark,
                $this->nazaac_property_registration_columns[13]=>$nazac_property_caretaker_name,
                $this->nazaac_property_registration_columns[14]=>$nazac_property_caretaker_email,
                $this->nazaac_property_registration_columns[15]=>$nazac_property_caretaker_phone,
                $this->nazaac_property_registration_columns[16]=>$nazac_property_caretaker_address,
                $this->nazaac_property_registration_columns[17]=>$nazac_property_caretaker_ac_name,
                $this->nazaac_property_registration_columns[18]=>$nazac_property_caretaker_ac_nom,
                $this->nazaac_property_registration_columns[19]=>$nazac_property_caretaker_bank_name,
                "nazac_property_last_update"=>$this->lib->getDate(),
                'no_of_apartment'=>$no_of_apartment,
                'rating_of_property'=>$rating_of_property,
                'nazac_property_caretaker_phone_2'=>$nazac_property_caretaker_phone_2,
                'nazac_property_state'=>$nazac_property_state,
                'nazac_property_local_gov_area'=>$nazac_property_local_gov_area,
                'nazac_property_town'=>$nazac_property_town,
                'nazac_property_street_address'=>$street_with_no,
                'nazac_property_country'=>$nazac_property_country,
                'nazac_property_bad_defects'=>$bad_defects,
                'nazac_property_purpose'=>$nazac_property_purpose,
                'nazac_property_legal_fee'=>$nazac_property_legal_fee,
                'nazac_property_agents_fee'=>$nazac_property_agents_fee,
                'nazac_property_map_cordinates'=>$longitude.','.$latitude,
                'nazac_property_description'=>$description,
                'nazac_property_currency'=>$currency,
                'nazac_property_price'=>$price_attached,
                'nazac_property_older_price'=>$older_price,
                'no_of_parking_space'=>$no_of_parking_space,
                'nazac_apartment_standard'=>$apartment_standard
            );

            $this->db->where('nazac_property_id', $this->uri->segment(4));
            if($this->db->update(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, $data_for_property_registration)){

                redirect(base_url('agents/mains/upload_property_media/'.$this->uri->segment(4)), 'refresh');

            }else{
                redirect(base_url('agents/mains/register_property/'.$this->uri->segment(4)), 'refresh');
            }

        }

        private function uploadMainPropertyMedia(){

            $name = $_FILES['thumbnail']['name'];
            $file_size = $_FILES['thumbnail']['size'];
            $file_type = $_FILES['thumbnail']['type'];
            $file_tmp_name = $_FILES['thumbnail']['tmp_name'];
            $property_unique_id = $this->input->post('property_unique_id');

            //select the name of the existing image
            $this->db->select($this->nazaac_property_registration_columns[22]);
            $this->db->from(extras::NAZAC_PROPERTY_REGISTRATION_TABLE);
            $this->db->where($this->nazaac_property_registration_columns[0], $property_unique_id);
            $data = $this->db->get()->result_array();

            //image format array
            $image_format_array = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');

            //check for the image size
            if($file_size > '3000000'){
                echo json_encode(array('error_code'=>1, 'error'=>'Image must not exceed 3MB'));
                return;
            }

            //check for the image size
            if(!in_array($file_type, $image_format_array)){
                echo json_encode(array('error_code'=>1, 'error'=>'Please upload an image'));
                return;
            }

            if($data[0][$this->nazaac_property_registration_columns[22]] !== "1.png"){
                @unlink('./resource/upload/registered_property/'.$data[0][$this->nazaac_property_registration_columns[22]]);
            }

            //rename image
            $file_details = $this->Admin->createFileName('./resource/upload/registered_property/');
            $new_name = $file_details['new_name'];
            $file_path = './resource/upload/registered_property/' . $new_name;

            /*$new_name = md5(microtime().uniqid()) . '.jpg';
            $file_path = './resource/upload/registered_property/' . $new_name;*/

            //move the file to the folder for it
            move_uploaded_file($file_tmp_name, $file_path);

            //$this->makeThumbnails('./resource/upload/registered_property/', $new_name, '');

            $this->db->where($this->nazaac_property_registration_columns[0], $property_unique_id);
            $this->db->update(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, array($this->nazaac_property_registration_columns[22]=>$new_name));

            echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'Upload of Thumbnail was successful', 'image_name'=>"/resource/upload/registered_property/".$new_name)));


        }

        private function uploadListedPropertyMainPropertyMedia(){

            $name = $_FILES['thumbnail']['name'];
            $file_size = $_FILES['thumbnail']['size'];
            $file_type = $_FILES['thumbnail']['type'];
            $file_tmp_name = $_FILES['thumbnail']['tmp_name'];
            $property_unique_id = $this->input->post('property_unique_id');

            //select the name of the existing image
            $this->db->select($this->property_listing_table_column[21]);
            $this->db->from(extras::PROPERTY_LISTING_TABLE);
            $this->db->where($this->property_listing_table_column[0], $property_unique_id);
            $data = $this->db->get()->result_array();

            //image format array
            $image_format_array = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');

            //check for the image size
            if($file_size > '3000000'){
                echo json_encode(array('error_code'=>1, 'error'=>'Image must not exceed 3MB'));
                return;
            }

            //check for the image size
            if(!in_array($file_type, $image_format_array)){
                echo json_encode(array('error_code'=>1, 'error'=>'Please upload an image'));
                return;
            }

            if($data[0][$this->property_listing_table_column[21]] !== "1.png"){
                @unlink('./resource/upload/registered_property/'.$data[0][$this->property_listing_table_column[21]]);
            }

            //rename image
            $file_details = $this->Admin->createFileName('./resource/upload/registered_property/');
            $new_name = $file_details['new_name'];
            $file_path = './resource/upload/registered_property/' . $new_name;

            /*$new_name = md5(microtime().uniqid()) . '.jpg';
            $file_path = './resource/upload/registered_property/' . $new_name;*/

            //move the file to the folder for it
            move_uploaded_file($file_tmp_name, $file_path);

            //$this->makeThumbnails('./resource/upload/registered_property/', $new_name, '');

            $this->db->where($this->property_listing_table_column[0], $property_unique_id);
            $this->db->update(extras::PROPERTY_LISTING_TABLE, array($this->property_listing_table_column[21]=>$new_name));

            echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'Upload of Thumbnail was successful', 'image_name'=>"/resource/upload/registered_property/".$new_name)));

        }

        function makeThumbnails($updir, $img, $id)
        {
            $thumbnail_width = 400;
            $thumbnail_height = 405;
            $thumb_beforeword = "thumb";
            $arr_image_details = getimagesize("$updir"."$img"); // pass id to thumb name
            $original_width = $arr_image_details[0];
            $original_height = $arr_image_details[1];
            if ($original_width > $original_height) {
                $new_width = $thumbnail_width;
                $new_height = intval($original_height * $new_width / $original_width);
            } else {
                $new_height = $thumbnail_height;
                $new_width = intval($original_width * $new_height / $original_height);
            }
            $dest_x = intval(($thumbnail_width - $new_width) / 2);
            $dest_y = intval(($thumbnail_height - $new_height) / 2);
            if ($arr_image_details[2] == IMAGETYPE_GIF) {
                $imgt = "ImageGIF";
                $imgcreatefrom = "ImageCreateFromGIF";
            }
            if ($arr_image_details[2] == IMAGETYPE_JPEG) {
                $imgt = "ImageJPEG";
                $imgcreatefrom = "ImageCreateFromJPEG";
            }
            if ($arr_image_details[2] == IMAGETYPE_PNG) {
                $imgt = "ImagePNG";
                $imgcreatefrom = "ImageCreateFromPNG";
            }

            if ($imgt) {
                $old_image = $imgcreatefrom("$updir"."$img");
                $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);

                // get the color white
                $color = imagecolorallocate($new_image, 255, 255, 255);

                // fill entire image
                imagefill($new_image, 0, 0, $color);

                imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
                $imgt($new_image, "$updir"."$img");
            }
        }

        private function multipleImageUpload(){

            if(isset($_FILES['multFile']['name'])){

                if(count($_FILES['multFile']['name'])==0){
                    echo json_encode(array('error_code'=>1,'error'=>'Please upload a valid image file!', 'success'=>array()));
                    return;
                }

                sleep(3);
                $img_extn = array();
                $to_insert = '';
                $lop = '';
                $error = '';
                $post_data = $this->Dbmodel->countMultiImages($this->input->post("postid"));
                $uploaded = explode(",", $post_data['nazac_property_exterior']);
                $num_uploaded = count($uploaded)-1;


                if($num_uploaded >= 12){
                    echo json_encode(array('error_code'=>1, 'error'=>array('error'=>'A maximum of 12 images allowed!'), 'success'=>array()));
                    return;
                }

                if(count($_FILES['multFile']['name'])+$num_uploaded > 12){
                    echo json_encode(array('error_code'=>1, 'error'=>'Oops you have upload '.$num_uploaded.' images before remaining '.(12-$num_uploaded).'! Please select only '.(12-$num_uploaded).' images. Thanks', 'success'=>array()));
                    return;
                }

                $image_lenght = count($_FILES['multFile']['name']);

                for($count=0; $count<count($_FILES['multFile']['name']); $count++){

                    $file_name = $_FILES['multFile']['name'][$count];
                    $tmp_name = $_FILES['multFile']['tmp_name'][$count];
                    $file_array = explode(".", $file_name);
                    $file_extension = strtolower(end($file_array));
                    $img_extn = array('jpg','png','jpeg','gif');
                    if(in_array($file_extension, $img_extn)){

                    }else{
                        $error = 'Invalid file type '.$file_name.' use eg: png, jpg, jpeg, gif';
                    }
                    $new_name = $this->processes->randGenerator().rand().uniqid() . '.' . $file_extension;
                    $location = './resource/upload/registered_property/'.$new_name;
                    if(move_uploaded_file($tmp_name, $location)){
                        $to_insert .= $new_name.',';
                    }else{
                        $error = 'Image upload failed! Try again.';
                    }

                }


                if(!empty($error)){
                    echo json_encode(array('error_code'=>1,'error'=>$error, 'success'=>array()));
                    return;
                }

                if(empty($error)){
                    $data = array(
                        "nazac_property_exterior"=> $post_data['nazac_property_exterior'].$to_insert
                    );
                    if($this->db->update(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, $data, array($this->nazaac_property_registration_columns[0]=>$this->input->post("postid")))){

                        echo json_encode(array('error_code'=>0,'error'=>'', 'success'=>array('message'=>'Image upload was successful!', 'data'=>rtrim($post_data['nazac_property_exterior'].$to_insert,','))));

                    }else{

                        echo json_encode(array('error_code'=>1,'error'=>'Upload failed! Try again.', 'success'=>array()));

                    }

                }


            }else{
                echo json_encode(array('error_code'=>1,'error'=>'Please Select a file', 'success'=>array()));
            }
        }

        private function multipleImageUploadForListedProperty(){

            if(isset($_FILES['multFile']['name'])){

                if(count($_FILES['multFile']['name'])==0){
                    echo json_encode(array('error_code'=>1,'error'=>'Please upload a valid image file!', 'success'=>array()));
                    return;
                }

                sleep(3);
                $img_extn = array();
                $to_insert = '';
                $lop = '';
                $error = '';


                $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::PROPERTY_LISTING_TABLE,
                    array($this->property_listing_table_column[0]=>$this->input->post("postid"))
                );
                $post_data = $listed_property_details['result'][0];

                $uploaded = explode(",", $post_data[$this->property_listing_table_column[22]]);
                $num_uploaded = count($uploaded)-1;


                if($num_uploaded >= 12){
                    echo json_encode(array('error_code'=>1, 'error'=>array('error'=>'A maximum of 12 images allowed!'), 'success'=>array()));
                    return;
                }

                if(count($_FILES['multFile']['name'])+$num_uploaded > 12){
                    echo json_encode(array('error_code'=>1, 'error'=>'Oops you have upload '.$num_uploaded.' images before remaining '.(12-$num_uploaded).'! Please select only '.(12-$num_uploaded).' images. Thanks', 'success'=>array()));
                    return;
                }

                $image_lenght = count($_FILES['multFile']['name']);

                for($count=0; $count<count($_FILES['multFile']['name']); $count++){

                    $file_name = $_FILES['multFile']['name'][$count];
                    $tmp_name = $_FILES['multFile']['tmp_name'][$count];
                    $file_array = explode(".", $file_name);
                    $file_extension = strtolower(end($file_array));
                    $img_extn = array('jpg','png','jpeg','gif');
                    if(in_array($file_extension, $img_extn)){

                    }else{
                        $error = 'Invalid file type '.$file_name.' use eg: png, jpg, jpeg, gif';
                    }
                    $new_name = $this->processes->randGenerator().rand().uniqid() . '.' . $file_extension;
                    $location = './resource/upload/registered_property/'.$new_name;
                    if(move_uploaded_file($tmp_name, $location)){
                        $to_insert .= $new_name.',';
                    }else{
                        $error = 'Image upload failed! Try again.';
                    }

                }

                if(!empty($error)){
                    echo json_encode(array('error_code'=>1,'error'=>$error, 'success'=>array()));
                    return;
                }

                if(empty($error)){
                    $data = array(
                        $this->property_listing_table_column[22]=> $post_data[$this->property_listing_table_column[22]].$to_insert
                    );
                    if($this->db->update(extras::PROPERTY_LISTING_TABLE, $data, array($this->property_listing_table_column[0]=>$this->input->post("postid")))){

                        echo json_encode(array('error_code'=>0,'error'=>'', 'success'=>array('message'=>'Image upload was successful!', 'data'=>rtrim($post_data[$this->property_listing_table_column[22]].$to_insert,','))));

                    }else{

                        echo json_encode(array('error_code'=>1,'error'=>'Upload failed! Try again.', 'success'=>array()));

                    }

                }


            }else{
                echo json_encode(array('error_code'=>1,'error'=>'Please Select a file', 'success'=>array()));
            }

        }

        private function deleteSelectedPropertyImage(){

            $selected_table_name = $this->input->post('table_name');

            if($selected_table_name === 'nazac_register_property'){
                $table_name = extras::NAZAC_PROPERTY_REGISTRATION_TABLE;
                $unique_column = $this->nazaac_property_registration_columns[0];
                $image_column = $this->nazaac_property_registration_columns[5];
            }else if($selected_table_name === 'find_a_roomy'){
                $table_name = 'find_a_roomy';
                $unique_column = 'unique_id';
                $image_column = 'nazac_apartment_images';
            }else{
                $table_name = extras::PROPERTY_LISTING_TABLE;
                $unique_column = $this->property_listing_table_column[0];
                $image_column = $this->property_listing_table_column[22];
            }

            sleep(3);
            //catch the values from js
            $post_id = $this->input->post('post_id');

            $theSeletedImage = $this->input->post('theSeletedImage');

            //check if the returned array is empty
            if(count($theSeletedImage) == 0){
                echo json_encode(array('error_code'=>1, 'error'=>'No image was selected, Click on the image the image you to delete to select it!', 'success'=>array()));
                return;
            }

            //set the delete watcher variable
            $delete_checker = 0;

            //run a select on the db and get the image names in this particular row
            $this->db->where($unique_column, $post_id);
            $query = $this->db->get($table_name);

            //check for num rows
            if($query->num_rows() == 0){
                echo json_encode(array('error_code'=>1, 'error'=>'Post does not exist, please re-login and try again!', 'success'=>array()));
                return;
            }


            if($query->num_rows() == 1){

                //get the result  query that was run
                $result = $query->result_array();

                //pick the column that holds the image names
                $image_names = $result[0][$image_column];

                //explode the image names using , as a delimiter
                $exploded_image_name = explode(',', rtrim($image_names,','));

                //loop through the returned result
                for($i = 0; $i < count($theSeletedImage); $i++){

                    //check if the selected images from the user exists in the newly create array of image names
                    if(in_array($theSeletedImage[$i], $exploded_image_name)){

                        //serch through the array and return the key for the value to be deleted
                        $key = array_search($theSeletedImage[$i], $exploded_image_name);

                        //remove the image name from the array gotten from the selected result
                        array_splice($exploded_image_name, $key, 1);

                        @unlink('./resource/upload/registered_property/'.$theSeletedImage[$i]);

                    }

                }

                //get the array and implode to a string
                $new_array = implode(',', $exploded_image_name);
                $new_array = $new_array.',';
                if(count($exploded_image_name) == 0){
                    $new_array = '';
                }

                //create an array of the values to be updated
                $data = array(

                    $image_column=>$new_array

                );

                //run an update on the row for this particular column
                $this->db->where($unique_column, $post_id);
                if($this->db->update($table_name, $data)){

                    echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'Selected Image(s) as been deleted successfully!', 'data'=>rtrim($new_array, ','))));

                }else {

                    echo json_encode(array('error_code'=>1, 'error'=>'Selected image(s) could not be deleted, please try again!', 'success'=>array()));

                }

            }

        }

        private  function createPropertyNumber(){

            $this->db->order_by('id', 'ASC');
            $this->db->limit(1, 0);
            $result = $this->db->get(extras::NAZAC_PROPERTY_REGISTRATION_TABLE);

            $result_array = '';
            if($result->num_rows() > 0){
                $result_array = $result->result_array();
                $result_array = $result_array[0]['nazac_property_number'];
            }

            return $result_array;

        }

        //check for existence of the thumbnail image
        private function checkImageAvalaibility(){

            $siteDetails = $this->siteDetails;

            $siteName = $siteDetails[$this->setup_table_column[6]];

            $selected_table_name = $this->input->post('table_name');

            if($selected_table_name === 'nazac_register_property'){
                $table_name = extras::NAZAC_PROPERTY_REGISTRATION_TABLE;
                $unique_column = $this->nazaac_property_registration_columns[0];
                $image_column = $this->nazaac_property_registration_columns[22];
                $message = 'You have successfully registered this property to '.$siteName;
            }else{
                $table_name = extras::PROPERTY_LISTING_TABLE;
                $unique_column = $this->property_listing_table_column[0];
                $image_column = $this->property_listing_table_column[21];
                $message = 'You have successfully added this Apartment/Property to '.$siteName;
            }

            //table_name
            $image_thumbnail_name = $this->input->post('main_image');
            $property_unique_id = $this->input->post('property_unique_id');

            if(empty($image_thumbnail_name)){
                echo json_encode(array('error_code'=>1, 'error'=>'Please Upload a thumbnail Image'));
                return;
            }

            //run a select on the db and get the value of the thumb nail name there
            $this->db->where(array($unique_column=>$property_unique_id));
            $property_details = $this->db->get($table_name);

            //initialize the image name to empty
            $image_name = '';

            if($property_details->num_rows() > 0){
                $image_name = $property_details->result_array();
                $image_name = $image_name[0][$image_column];
            }

            if($image_name === '1.png'){
                echo json_encode(array('error_code'=>1, 'error'=>'Please Upload at least a thumbnail Image'));
                return;
            }

            //check if the image name from db is same as the image name from the user end
            if($image_name === $image_thumbnail_name){
                echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'You have successfully registered this property to '.$siteName)));
                return;
            }else{
                echo json_encode(array('error_code'=>1, 'error'=>'Please Upload at least a thumbnail Image'));
            }

        }

        //publish property
        private function publishProperty(){

            $property_uniue_id = $this->input->post('property_uniue_id');

            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array($this->property_listing_table_column[0]=>$property_uniue_id)
            );

            if($property_details['row_count'] == 1){

                $data_to_update = array($this->property_listing_table_column[34]=>'published');
                $this->db->where(array($this->property_listing_table_column[0]=>$property_uniue_id));
                if($this->db->update(extras::PROPERTY_LISTING_TABLE, $data_to_update)){
                    echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'Property have been successfully published and will be available for View by prospective Clients on the Property List section')));
                    return;
                }
                echo json_encode(array('error_code'=>1, 'error'=>'An error occurred, please try again'));

            }

        }

        private function validatePropertyListingForm(){

            $this->form_validation->set_rules("title_of_lodge","Title","trim|required");
            //$this->form_validation->set_rules("nazac_property_category","Property Category","trim|required");
            //$this->form_validation->set_rules("nazac_property_type","Type of Property","trim|required");
            //$this->form_validation->set_rules("nazac_property_purpose","Property Purpose","trim|required");
            $this->form_validation->set_rules("currency","Currency","trim|required");
            $this->form_validation->set_rules("price_attached","Price","trim|required");
            $this->form_validation->set_rules("payment_mood","Payment Mood","trim|required");
            $this->form_validation->set_rules("property_status","Property Status","trim|required");
/*echo $_POST['nazac_property_street_address']; die();*/
            $this->form_validation->set_rules("nazac_property_country","Country","trim|required");
            $this->form_validation->set_rules("nazac_property_state","State","trim|required");
            $this->form_validation->set_rules("nazac_property_local_gov_area","Local Government Area","trim|required");
            $this->form_validation->set_rules("nazac_property_town","Town/Area","trim|required");
            $this->form_validation->set_rules("nazac_property_street_address","Street Address","trim|required");
            $this->form_validation->set_rules("description","Description","trim|required");
			$this->form_validation->set_rules("duration","Duration","required");

            $this->form_validation->set_rules("nazac_property_legal_fee","Legal Fee","trim|required|numeric");
            $this->form_validation->set_rules("nazac_property_agents_fee","Agents Fee","trim|required|numeric");
            $this->form_validation->set_rules("room_no","Room Number","trim|required");

            $this->form_validation->set_rules("bedroom_no","Number of Bed Room(s)","trim|numeric");
            $this->form_validation->set_rules("no_of_toilets","Number of Toilets","trim|numeric");
            $this->form_validation->set_rules("no_of_bathrooms","Number of Bath Rooms","trim|numeric");
            $this->form_validation->set_rules("no_of_parking_space","Number of Parking Space","trim|numeric");

        }

        //method that handles property addition processing
        private function processPropertyAddition(){

            $this->validatePropertyListingForm();

            if ($this->form_validation->run() === FALSE)
            {

                $this->session->set_flashdata('property_addition_error', 'Validation error occured, please provide neccessary and accurate information in the affected fields and continue');
                $this->selectDetailsForPropertyAdditionPage();
                $this->page_name = 'dashboard/property_form';
                $this->send_to_view();
                return;
            }

            $bedroom_no = $this->input->post('bedroom_no');;
            $title_of_lodge = ucwords(strtoupper(strtolower($this->input->post('title_of_lodge'))));
            $new_room_number = $this->input->post('room_no');
            $nazac_property_category = $this->input->post('nazac_property_category');
            $nazac_property_type = $this->input->post('nazac_property_type');
            $nazac_property_purpose = $this->input->post('nazac_property_purpose');
            $currency = $this->input->post('currency');
            $price_attached = $this->input->post('price_attached');
            $older_price = $this->input->post('older_price');
            $property_status = $this->input->post('property_status');
            $property_size = $this->input->post('property_size');
            $apartment_standard = $this->input->post('apartment_standard');
            $payment_mood = $this->input->post('payment_mood');
            $floor_type = $this->input->post('floor_type');
            $no_of_toilets = $this->input->post('no_of_toilets');
            $no_of_bathrooms = $this->input->post('no_of_bathrooms');
            $no_of_parking_space = $this->input->post('no_of_parking_space');
            $nazac_property_youtube_link = $this->input->post('nazac_property_youtube_link');
            $nazac_property_features = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('nazac_property_features')));
            $bad_defects = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('bad_defects')));

            $country_located = $this->input->post('nazac_property_country');
            $state_located = $this->input->post('nazac_property_state');
            $lga_located = $this->input->post('nazac_property_local_gov_area');
            $town_located = $this->input->post('nazac_property_town');
            $street_with_no = $this->input->post('nazac_property_street_address');
            $longitude = $this->input->post('longitude');
            $latitude = $this->input->post('latitude');
            $description = $this->input->post('description');
            $nazac_property_agents_fee = $this->input->post('nazac_property_agents_fee');
            $nazac_property_legal_fee = $this->input->post('nazac_property_legal_fee');
            $rentduration = $this->input->post('duration');

            if(strlen($new_room_number) != 3){
                $this->session->set_flashdata('property_addition_error', 'Please Supply the right format for room number (Format: 001)');
                $this->selectDetailsForPropertyAdditionPage();
                $this->page_name = 'dashboard/property_form';
                $this->send_to_view();
                return;
            }

            //check if the room number already exists for this particular property
            $room_number_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array(
                    $this->property_listing_table_column[14]=>$new_room_number,
                    "nazaac_main_property_id"=>$this->uri->segment(4)
                )
            );

            if($room_number_details['row_count'] > 0){

                $this->property_addition_error_form['room_no'] = 'Provided Number already exists';
                $this->session->set_flashdata('property_addition_error', $this->property_addition_form);
                redirect(base_url('agents/mains/load_property_addition/'.$this->uri->segment(4).'/'.$this->uri->segment(5)), 'refresh');
                return;

            }

            //get other additional values needed to inserted into the db $new_room_number

            //create unique id
            $unique_id = $this->createUniqueId(extras::PROPERTY_LISTING_TABLE, $this->property_listing_table_column[0]);

            //get the details of this particular building which has been registered
            $details_of_building_that_this_belongs_to = $this->Admin->dbSelectWithOrWithoutParameter(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, array($this->nazaac_property_registration_columns[0]=>$this->uri->segment(4)));

            $building_details = $details_of_building_that_this_belongs_to['result'][0];

            $value_to_insert = array(
                /*$building_details[$this->nazaac_property_registration_columns[13]]*/
                "nazac_property_unique_id"=>$unique_id,
                "nazac_property_gent_incharge_id"=>$this->user_data['nazac_id'],
                "nazac_property_location"=>$building_details[$this->nazaac_property_registration_columns[7]],
                "nazac_property_type"=>$nazac_property_type,
                "nazac_property_title"=>$title_of_lodge,
                "nazac_property_lodge_name"=>$building_details[$this->nazaac_property_registration_columns[4]],
                "nazac_property_country"=>$country_located,
                "nazac_property_state"=>$state_located,
                "nazac_property_local_gov_area"=>$lga_located,
                "nazac_property_town"=>$town_located,
                "nazac_property_street_address"=>$street_with_no,
                "nazac_property_street_location"=>"",
                "nazac_property_closest_landmark"=>$building_details[$this->nazaac_property_registration_columns[11]],
                "nazac_property_distance_from_landmark"=>$building_details[$this->nazaac_property_registration_columns[12]],
                "nazac_property_room_number"=>$new_room_number,
                "nazac_property_price"=>$price_attached,
                "nazac_property_older_price"=>$older_price,
                "nazac_property_currency"=>$currency,
                "nazac_property_approximate_size"=>$property_size,
                "nazac_property_floor_type"=>$floor_type,
                "nazac_property_description"=>$description,
                "nazac_property_thumbnail"=>"1.png",
                "nazac_property_images"=>"",
                "nazac_property_features"=>$nazac_property_features,
                "nazac_property_defect_features"=>$bad_defects,
                "nazac_property_rating"=>0,
                "nazac_property_category"=>$nazac_property_category,
                "nazac_property_purpose"=>$nazac_property_purpose,
                "nazac_payment_type"=>$payment_mood,
                "nazac_property_no_of_rooms"=>$bedroom_no,
                "nazac_property_no_of_bathrooms"=>$no_of_bathrooms,
                "nazac_property_no_of_toilets"=>$no_of_toilets,
                "nazac_property_no_of_parking_space"=>$no_of_parking_space,
                "nazac_property_youtube_link"=>$nazac_property_youtube_link,
                "nazac_property_publish_status"=>"unpublished",
                "nazac_property_map_cordinates"=>$longitude.','.$latitude,
                "nazac_property_booked_status"=>"no",
                "nazac_property_booker_id"=>"",
                "nazac_property_book_count_down"=>0,
                "nazac_property_rent_status"=>$property_status,
                "nazac_property_renters_id"=>"",
                "nazac_property_rent_count_down"=>0,
                "nazac_property_status"=>"active",
                "nazac_property_delete_status"=>"no",
                "nazac_property_views"=>0,
                "nazac_property_last_update"=>$this->lib->getDate(),
                "nazac_property_post_date"=>$this->lib->getDate(),
                "nazac_property_legal_fee"=>$nazac_property_legal_fee,
                "nazac_property_agents_fee"=>$nazac_property_agents_fee,
                "nazaac_main_property_id"=>$this->uri->segment(4),
                "nazac_property_vacancy_reporter_id" =>"",
                "nazac_property_duration" => $rentduration
            );

            if($this->db->insert(extras::PROPERTY_LISTING_TABLE, $value_to_insert)){

                redirect(base_url('agents/mains/upload_listed_property_media/'.$unique_id), 'refresh');

            }else{

                $this->property_addition_error_form['main_notification'] = 'An error occurred, please try again';
                $this->session->set_flashdata('property_addition_error', $this->property_addition_form);

                redirect(base_url('agents/mains/load_property_addition/'.$this->uri->segment(4).'/'.$this->uri->segment(5)), 'refresh');

            }

        }

        //method that will update the property details
        private function processPropertyFormUpdate(){

            $this->validatePropertyListingForm();

            if ($this->form_validation->run() === FALSE)
            {

                $this->session->set_flashdata('property_addition_error', 'Validation error occured, please provide neccessary and accurate information in the affected fields and continue');
                $this->selectDetailsForPropertyAdditionPage();
                $this->page_name = 'dashboard/property_form';
                $this->send_to_view();
                return;
            }

            $bedroom_no = $this->input->post('bedroom_no');;
            $title_of_lodge = ucwords(strtoupper(strtolower($this->input->post('title_of_lodge'))));
            $new_room_number = $this->input->post('room_no');
            $nazac_property_category = $this->input->post('nazac_property_category');
            $nazac_property_type = "";//$this->input->post('nazac_property_type');
            $nazac_property_purpose = "";//$this->input->post('nazac_property_purpose');
            $currency = $this->input->post('currency');
            $price_attached = $this->input->post('price_attached');
            $older_price = $this->input->post('older_price');
            $property_status = $this->input->post('property_status');
            $property_size = $this->input->post('property_size');
            $apartment_standard = $this->input->post('apartment_standard');
            $payment_mood = $this->input->post('payment_mood');
            $floor_type = $this->input->post('floor_type');
            $no_of_toilets = $this->input->post('no_of_toilets');
            $no_of_bathrooms = $this->input->post('no_of_bathrooms');
            $no_of_parking_space = $this->input->post('no_of_parking_space');
            $nazac_property_youtube_link = $this->input->post('nazac_property_youtube_link');
            $nazac_property_features = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('nazac_property_features')));
            $bad_defects = implode(',', $this->extras->createArrayFromAnotherArrayWhileOmittingEmptyValues($this->input->post('bad_defects')));
            $country_located = $this->input->post('country_located');
            $state_located = $this->input->post('state_located');
            $lga_located = $this->input->post('lga_located');
            $town_located = $this->input->post('town_located');
            $street_with_no = $this->input->post('street_with_no');
            $longitude = $this->input->post('longitude');
            $latitude = $this->input->post('latitude');
            $description = $this->input->post('description');
            $nazac_property_agents_fee = $this->input->post('nazac_property_agents_fee');
            $nazac_property_legal_fee = $this->input->post('nazac_property_legal_fee');
			$rentduration = $this->input->post('duration');

            //get other additional values needed to inserted into the db $new_room_number

            //get the details of this particular building which has been registered
            $details_of_building_that_this_belongs_to = $this->Admin->dbSelectWithOrWithoutParameter(extras::NAZAC_PROPERTY_REGISTRATION_TABLE, array($this->nazaac_property_registration_columns[0]=>$this->uri->segment(4)));

            $building_details = $details_of_building_that_this_belongs_to['result'][0];

            $value_to_update = array(
                "nazac_property_location"=>$building_details[$this->nazaac_property_registration_columns[7]],
                "nazac_property_type"=>$nazac_property_type,
                "nazac_property_title"=>$title_of_lodge,
                "nazac_property_lodge_name"=>$building_details[$this->nazaac_property_registration_columns[4]],
                "nazac_property_country"=>$country_located,
                "nazac_property_state"=>$state_located,
                "nazac_property_local_gov_area"=>$lga_located,
                "nazac_property_town"=>$town_located,
                "nazac_property_street_address"=>$street_with_no,
                "nazac_property_street_location"=>"",
                "nazac_property_closest_landmark"=>$building_details[$this->nazaac_property_registration_columns[11]],
                "nazac_property_distance_from_landmark"=>$building_details[$this->nazaac_property_registration_columns[12]],
                "nazac_property_price"=>$price_attached,
                "nazac_property_older_price"=>$older_price,
                "nazac_property_currency"=>$currency,
                "nazac_property_approximate_size"=>$property_size,
                "nazac_property_floor_type"=>$floor_type,
                "nazac_property_description"=>$description,
                "nazac_property_features"=>$nazac_property_features,
                "nazac_property_defect_features"=>$bad_defects,
                "nazac_property_category"=>$nazac_property_category,
                "nazac_property_purpose"=>$nazac_property_purpose,
                "nazac_payment_type"=>$payment_mood,
                "nazac_property_no_of_rooms"=>$bedroom_no,
                "nazac_property_no_of_bathrooms"=>$no_of_bathrooms,
                "nazac_property_no_of_toilets"=>$no_of_toilets,
                "nazac_property_no_of_parking_space"=>$no_of_parking_space,
                "nazac_property_youtube_link"=>$nazac_property_youtube_link,
                "nazac_property_map_cordinates"=>$longitude.','.$latitude,
                "nazac_property_rent_status"=>$property_status,
                "nazac_property_last_update"=>$this->lib->getDate(),
                "nazac_property_legal_fee"=>$nazac_property_legal_fee,
                "nazac_property_agents_fee"=>$nazac_property_agents_fee,
				"nazac_property_duration" => $rentduration
                /*,
                "nazaac_main_property_id"=>$this->uri->segment(4)*/
            );

            $this->db->where(array('nazac_property_unique_id'=>$this->uri->segment(6)));
            if($this->db->update(extras::PROPERTY_LISTING_TABLE, $value_to_update)){

                redirect(base_url('agents/mains/upload_listed_property_media/'.$this->uri->segment(6).'/update_property_images'), 'refresh');

            }else{

                $this->property_addition_error_form['main_notification'] = 'An error occurred, please try again';
                $this->session->set_flashdata('property_addition_error', $this->property_addition_form);

                redirect(base_url('agents/mains/load_property_addition/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7)), 'refresh');

            }

        }

        //make property available for payment
        private function makeAvailableUnavailableForPayment(){

            //select the properties in question
            $booked_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::BOOKED_PROPERTY_TABLE,
                array('nazac_book_id'=>$this->uri->segment(4))
            );

            //initialize update condition to 0
            $update_condition = 0;

            //if the selected row equal 1
            if($booked_property_details['row_count'] == 1){

                //get the array returned for teh booked property
                $booked_property_details_array = $booked_property_details['result'][0];

                if($this->uri->segment(5) === 'yes'){
                    $cancel_booking_option = 'no';
                }else{
                    $cancel_booking_option = 'yes';
                }

                //update booked property row
                $this->db->where(array('nazac_book_id'=>$this->uri->segment(4)));
                $update_condition = $this->db->update(
                    extras::BOOKED_PROPERTY_TABLE,
                    array(
                        'aprove_availability_for_payment'=>$this->uri->segment(5),
                        'cancel_booking'=>$cancel_booking_option
                    )
                );

                if($update_condition == 1){

                    //run a select on the client table to get the email of the booker
                    $booker_details = $this->Admin->dbSelectWithOrWithoutParameter(
                        extras::USER_TB,
                        array('nazac_id'=>$booked_property_details_array['nazac_bookers_id'])
                    );

                    $booker_details_array = $booker_details['result'][0];
                    $receiver_email = $booker_details_array['nazac_client_email'];
                    $full_name = $booker_details_array['nazac_clients_lname'].' '.$booker_details_array['nazac_clients_fname'];
                    $room_number = $booked_property_details_array['nazac_property_room_number'];

                    if($this->uri->segment(5) === 'no'){

                        $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
                        $message = Email_handler::messageForPaymentDeactivation($this->siteDetails['site_name'], $full_name, $room_number, $this->siteDetails['email3'], $checker);

                        //send the mail to the user email
                        $this->mailSender($receiver_email, 'Notification on Property Availabilty Rent',$message);

                    }else if($this->uri->segment(5) === 'yes'){

                        $checker = $this->Admin->addValueToBeAuthenticated($this->user_data['nazac_id']);
                        $message = Email_handler::messageForPaymentActivation($this->siteDetails['site_name'], $full_name, $room_number, $this->siteDetails['email3'], $checker);

                        //send the mail to the user email
                        $this->mailSender($receiver_email, 'Notification for Un-Availabilty of Property for Rent',$message);
                    }

                    redirect('agents/mains/view_booked_properties');
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

        //load pages area

        //add property
        private function loadAddProperty(){

            //load the property locations
            $property_location_details = $this->db->get(extras::LOCATION_TABLE);
            $property_location_details_array = array();
            if($property_location_details->num_rows() > 0){
                $property_location_details_array = $property_location_details->result_array();
            }

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'property_location_details_array'=>$property_location_details_array,
                    'title'=>$this->column_values[0]['site_name'].' | Add Properties'
                )
            );

            $this->page_name = 'dashboard/add_property';
            $this->send_to_view();

        }

        //load image upload page
        private function uploadPropertyMedia(){

            //select the property details
            $this->db->where(array($this->nazaac_property_registration_columns[0]=>$this->uri->segment(4)));
            $property_details = $this->db->get(extras::NAZAC_PROPERTY_REGISTRATION_TABLE);

            $property_details_array = array();
            if($property_details->num_rows() > 0){
                $property_details_array = $property_details->result_array();
            }

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'property_details'=>$property_details_array,
                    'title'=>$this->siteDetails['site_name'].' - Upload Images for Newly Registered Property'
                )
            );

            $this->page_name = 'dashboard/property_media';
            $this->send_to_view();

        }

        //loading the agents dashboard
        private function loadDashBoard(){

            $siteDetail = $this->Dbmodel->getSiteDetails();

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'title'=>$this->column_values[0]['site_name'].' | Members Area'
                )
            );

            $this->page_name = 'dashboard/dashboard';
            $this->send_to_view();

        }

        private function loadPropetyRegistrationForm(){

            $this->getDetailsForPropetyRegistrationForm();
            $this->page_name = 'dashboard/register_property';
            $this->send_to_view();

        }

        private function getDetailsForPropetyRegistrationForm(){

            $registered_property_details_array = array();
            if($this->uri->segment(4)){
                $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                    array('nazac_property_id'=>$this->uri->segment(4))
                );
                $registered_property_details_array = $registered_property_details['result'];
            }

            //add the property type details
            $property_type_details = $this->db->get(extras::PROPERTY_TYPE_TABLE);
            $property_type_details_array = array();
            if($property_type_details->num_rows() > 0){
                $property_type_details_array = $property_type_details->result_array();
            }

            //load the property locations
            $property_location_details = $this->db->get(extras::LOCATION_TABLE);
            $property_location_details_array = array();
            if($property_location_details->num_rows() > 0){
                $property_location_details_array = $property_location_details->result_array();
            }

            $property_purpose_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_PURPOSE_TABLE
            );

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'title'=>$this->siteDetails['site_name'].' - Register A New Property',
                    'property_location_details_array'=>$property_location_details_array,
                    'property_type_details_array'=>$property_type_details_array,
                    'registered_property_details_array'=>$registered_property_details_array,
                    'property_purpose_details_array'=>$property_purpose_details['result']
                )
            );

        }

        //load pages area
        private function getPropertyDetailsForLocation(){

            $selected_location = $this->input->post('selected_location');
            $page_no = $this->input->post('page_no');

            //check the total number of rows in the db
            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array($this->nazaac_property_registration_columns[7]=>$selected_location),
                'id',
                'DESC'
            );
            $numrows = $property_details['row_count'];
            $rowsperpage = 20;

            //add the property type details
            $offset = $this->setPagination($page_no, $numrows, $rowsperpage);

            if($offset === 'No Data was returned'){
                echo json_encode(array('error_code'=>1, 'error'=>'No Data was returned'));
                return;
            }

            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array($this->nazaac_property_registration_columns[7]=>$selected_location),
                'id',
                'DESC',
                $rowsperpage,
                $offset
            );

            //select the location details
            $location_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::LOCATION_TABLE,
                array($this->property_location_table_column[0]=>$selected_location)
            );

            //get the location name
            $location_name = $location_details['result'][0][$this->property_location_table_column[1]];

            if($property_details['row_count'] > 0){
                echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'', 'data'=>$property_details['result'], 'location_name'=>$location_name)));
            }else{
                echo json_encode(array('error_code'=>1, 'error'=>'There is no property registered in the selected location!!!'));
            }


        }

        //search for property details
        private function searchForPropertyDetailsUsingUserProvidedInputs(){

            //get the search term entered by the user
            $search_keyword = $this->input->post('search_keyword');
            $property_location = $this->input->post('property_location');

            //if validation fails
            if (empty($search_keyword))
            {
                echo json_encode(array('error_code'=>1, 'error'=>'Please enter a search value'));
                return;
            }

            if (empty($property_location))
            {
                echo json_encode(array('error_code'=>1, 'error'=>'Please refresh page and try again'));
                return;
            }

            //select the location details
            $location_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::LOCATION_TABLE,
                array($this->property_location_table_column[0]=>$property_location)
            );

            //get the location name
            $location_name = $location_details['result'][0][$this->property_location_table_column[1]];

            $this->db->where($this->nazaac_property_registration_columns[7], $property_location);
            $this->db->like($this->nazaac_property_registration_columns[1], $search_keyword);
            $this->db->or_like($this->nazaac_property_registration_columns[2], $search_keyword);
            $this->db->or_like($this->nazaac_property_registration_columns[3], $search_keyword);
            $this->db->or_like($this->nazaac_property_registration_columns[11], $search_keyword);
            $this->db->or_like($this->nazaac_property_registration_columns[13], $search_keyword);
            //$this->db->or_like($this->nazaac_property_registration_columns[15], $search_keyword);
            $property_details = $this->db->get(extras::NAZAC_PROPERTY_REGISTRATION_TABLE);

            $property_details_array = array();
            if($property_details->num_rows() > 0){

                $property_details_array = $property_details->result_array();

            }

            //send to the front end
            if(count($property_details_array) > 0){
                echo json_encode(array('error_code'=>0, 'error'=>'', 'success'=>array('message'=>'', 'data'=>$property_details_array, 'location_name'=>$location_name)));
                return;
            }

            //send an error message to the view
            echo json_encode(array('error_code'=>1, 'error'=>'No Data was returned'));



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

        //load main page for property addition
        private function loadPageForPropertyAddition(){

            $this->selectDetailsForPropertyAdditionPage();

            $this->page_name = 'dashboard/property_form';
            $this->send_to_view();

        }

        private function selectDetailsForPropertyAdditionPage(){

            $listed_property_details_array = array();
            if($this->uri->segment(6) && $this->uri->segment(7) == 'edit_property'){

                //listed property details
                $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::PROPERTY_LISTING_TABLE,
                    array('nazac_property_unique_id'=>$this->uri->segment(6))
                );
                $listed_property_details_array = $listed_property_details['result'];
            }

            //select the property choosen by the user
            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array($this->nazaac_property_registration_columns[0]=>$this->uri->segment(4))
            );

            //add the selected property to details that will be sent to the view
            $property_location_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::LOCATION_TABLE,
                array($this->property_location_table_column[0]=>$this->uri->segment(5))
            );//property_type

            //get the property category details
            $property_category_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_CATEGORY_TABLE
            );

            //get the property type details
            $property_type_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_TYPE_TABLE
            );

            //get the property purpose details
            $property_purpose_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_PURPOSE_TABLE
            );

            //get the payment mood details
            $payment_mood_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PAYMENT_MOOD_TABLE
            );

            $last_apartment_added_for_this_property = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array($this->property_listing_table_column[49]=>$this->uri->segment(4)),
                'id',
                'DESC',
                1,
                0
            );

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'property_location_details_array'=>$property_location_details['result'],
                    'property_details_array'=>$property_details['result'],
                    'listed_property_details_array'=>$listed_property_details_array,
                    'title'=>$this->siteDetails['site_name'].' Add Property For Rent',
                    'property_category_details'=>$property_category_details['result'],
                    'property_type_details'=>$property_type_details['result'],
                    'property_purpose_details'=>$property_purpose_details['result'],
                    'payment_mood_details'=>$payment_mood_details['result'],
                    'last_apartment_added_for_this_property'=>$last_apartment_added_for_this_property['result']
                )
            );

        }

        private function uploadListedPropertyMedia(){

            //select the property details
            $details_of_last_property_listed = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array($this->property_listing_table_column[0]=>$this->uri->segment(4))
            );

            $details_of_last_property_listed_array = $details_of_last_property_listed['result'];

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'details_of_last_property_listed_array'=>$details_of_last_property_listed_array,
                    'title'=>$this->siteDetails['site_name'].' - Upload Images for Newly Listed Property'
                )
            );

            $this->page_name = 'dashboard/listed_property_media';
            $this->send_to_view();

        }

        private function viewMyListedProperty(){

            $page_no = $this->uri->segment(4);

            $user_details = $this->Admin->getUSerDetails($_SESSION['_nazlogger']);
            $user_details_array = $user_details['result'];

            //check the total number of rows in the db
            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array(
                    'nazac_property_gent_incharge_id'=>$user_details_array[0]['nazac_id']
                )
            );

            $numrows = $property_details['row_count'];
            $rowsperpage = 10;

            //add the property type details
            $pagination_details = $this->setPaginationHtml($page_no, $numrows, $rowsperpage, base_url('agents/mains/my_listed_property'));

            //select the location details
            $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                array(
                    'nazac_property_gent_incharge_id'=>$user_details_array[0]['nazac_id']
                ),
                'id',
                'DESC',
                $rowsperpage,
                $pagination_details['offset']
            );

            $property_details_array = $property_details['result'];

            //declare an empty array for
            $registered_property_details_array = array();

            //select the details of the registered property for listed property
            if($property_details['row_count'] > 0){

                foreach($property_details_array as $k => $value){

                    $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                        extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                        array(
                            'nazac_property_id'=>$value['nazaac_main_property_id']
                        )
                    );

                    $registered_property_details_array[] = $registered_property_details['result'];

                }

            }

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'registered_property_details_array'=>$registered_property_details_array,
                    'property_data'=>$property_details_array,
                    'offset'=>$pagination_details['offset'],
                    'previous_link'=>$pagination_details['previous_link'],
                    'looped_links'=>$pagination_details['looped_links'],
                    'next_links'=>$pagination_details['next_links'],
                    'title'=>$this->siteDetails['site_name'].' - My Listed Properties',
                    'site_description'=>$this->siteDetails['nazac_site_description'],
                    'thumbnail_path'=>base_url().'resource/img/logo.jpg',
                    'page_url'=>base_url(),
                    'cat'=>'All',
                    'total_row'=>$numrows,
                    'num_links'=>ceil($numrows/$rowsperpage),
                    'next_link'=>'Next',
                    'prev_link'=>'Previous',
                    'pages'=>$page_no,
                    'cat_set'=>'All'
                )
            );

            $this->page_name = 'dashboard/my_listed_property';
            $this->send_to_view();

        }

        private function viewRegisteredProperties(){

            $page_no = $this->uri->segment(4);

            $user_details = $this->Admin->getUSerDetails($_SESSION['_nazlogger']);
            $user_details_array = $user_details['result'];

            //check the total number of rows in the db
            $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array(
                    'agent_incahrge_id'=>$user_details_array[0]['nazac_id']
                )
            );

            $numrows = $registered_property_details['row_count'];
            $rowsperpage = 20;

            //add the property type details
            $pagination_details = $this->setPaginationHtml($page_no, $numrows, $rowsperpage, base_url('agents/mains/registered_properties'));

            //select the location details
            $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array('agent_incahrge_id'=>$user_details_array[0]['nazac_id']),
                'id',
                'DESC',
                $rowsperpage,
                $pagination_details['offset']
            );

            $registered_property_details_array = $registered_property_details['result'];

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'registered_property_details_array'=>$registered_property_details_array,
                    'offset'=>$pagination_details['offset'],
                    'previous_link'=>$pagination_details['previous_link'],
                    'looped_links'=>$pagination_details['looped_links'],
                    'next_links'=>$pagination_details['next_links'],
                    'title'=>$this->siteDetails['site_name'].' - My Listed Properties',
                    'site_description'=>$this->siteDetails['nazac_site_description'],
                    'thumbnail_path'=>base_url().'resource/img/logo.jpg',
                    'page_url'=>base_url(),
                    'cat'=>'All',
                    'total_row'=>$numrows,
                    'num_links'=>ceil($numrows/$rowsperpage),
                    'next_link'=>'Next',
                    'prev_link'=>'Previous',
                    'pages'=>$page_no,
                    'cat_set'=>'All'
                )
            );

            $this->page_name = 'dashboard/list_of_registered_properties';
            $this->send_to_view();

        }

        private function viewSinglePropertyDetail(){

            //select the needed values tp build up the page
            $single_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                array(
                    'nazac_property_id'=>$this->uri->segment(4)
                )
            );

            $single_registered_property_details_array = $single_property_details['result'];

            $listed_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::PROPERTY_LISTING_TABLE,
                FALSE,
                'id',
                'DESC',
                5,
                0
            );

            $property_data = $listed_property_details['result'];

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'single_registered_property_details_array'=>$single_registered_property_details_array,
                    'property_data'=>$property_data
                )
            );

            $this->page_name = 'dashboard/registered_property_details';
            $this->send_to_view();

        }

        //for booked properties listing
        private function viewBookedProperties(){

            $page_no = $this->uri->segment(4);

            $user_details = $this->Admin->getUSerDetails($_SESSION['_nazlogger']);
            $user_details_array = $user_details['result'];

            //select the booked properties
            $booked_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::BOOKED_PROPERTY_TABLE,
                array('agent_incahrge_id'=>$user_details_array[0]['nazac_id'])
            );

            $numrows = $booked_property_details['row_count'];
            $rowsperpage = 20;

            //add the property type details
            $pagination_details = $this->setPaginationHtml($page_no, $numrows, $rowsperpage, base_url('agents/mains/view_booked_properties'));

            //select the booked properties
            $booked_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::BOOKED_PROPERTY_TABLE,
                FALSE,
                'id',
                'DESC',
                $rowsperpage,
                $pagination_details['offset']
            );

            //get the array of properties
            $booked_property_details_array = $booked_property_details['result'];

            //declare an empty array that will carry the values for property details
            $property_details_array = array();
            if($booked_property_details['row_count'] > 0){
                //get the property details array
                $property_details_array = $this->selectPropertyDetails($booked_property_details_array);
            }

            //declare an empty array
            $user_details_array = array();
            if(count($booked_property_details_array) > 0){
                $user_details_array = $this->selectUserDetails($booked_property_details_array);
            }

            //declare an empty array
            $registered_property_details_array = array();
            if(count($property_details_array) > 0){
                $registered_property_details_array = $this->selectRegisteredPropertyDetails($property_details_array);
            }

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'booked_property_details_array'=>$booked_property_details_array,
                    'property_details_array'=>$property_details_array,
                    'user_details_array'=>$user_details_array,
                    'registered_property_details_array'=>$registered_property_details_array,
                    'offset'=>$pagination_details['offset'],
                    'previous_link'=>$pagination_details['previous_link'],
                    'looped_links'=>$pagination_details['looped_links'],
                    'next_links'=>$pagination_details['next_links'],
                    'title'=>$this->siteDetails['site_name'].' - Booked Properties'
                )
            );
            $this->page_name = 'dashboard/booked_properties';
            $this->send_to_view();

        }

        private function selectUserDetails($booked_property_details_array){

        //declare an empty array
        $user_details_array = array();

        //get the details of the properties
        foreach($booked_property_details_array as $k => $value){

            $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::USER_TB,
                array(
                    'nazac_id'=>$value['nazac_bookers_id']
                )
            );

            $user_details_array[] = $user_details['result'][0];

        }

        return $user_details_array;

    }

        private function selectRegisteredPropertyDetails($property_details_array){

            //declare an empty array
            $registered_property_details_array = array();

            //get the details of the properties
            foreach($property_details_array as $k => $value){

                $registered_property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::NAZAC_PROPERTY_REGISTRATION_TABLE,
                    array(
                        'nazac_property_id'=>$value['nazaac_main_property_id']
                    )
                );

                $registered_property_details_array[] = $registered_property_details['result'][0];

            }

            return $registered_property_details_array;

        }

        private function selectPropertyDetails($booked_property_details_array){

            //declare an empty array
            $property_details_array = array();

            //get the details of the properties
            foreach($booked_property_details_array as $k => $value){

                $property_details = $this->Admin->dbSelectWithOrWithoutParameter(
                    extras::PROPERTY_LISTING_TABLE,
                    array(
                        'nazac_property_unique_id'=>$value['nazac_booked_property_id']
                    )
                );

                $property_details_array[] = $property_details['result'][0];

            }

            return $property_details_array;

        }

        private function viewClientsDetails(){

            //select the booked properties
            $user_details = $this->Admin->dbSelectWithOrWithoutParameter(
                extras::USER_TB,
                array('nazac_id'=>str_replace('-','/', $this->uri->segment(4)))
            );

            $user_details_array = $user_details['result'][0];

            //SET THE DATA to be sent to view
            $this->createArrayOfDataToBeReturnedToView(
                array(
                    'singleAgent'=>$user_details_array
                )
            );
            $this->page_name = 'dashboard/clients-details';
            $this->send_to_view();

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
        private function mailSender($receiver_email, $subject, $message){

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

        //show the 404 page
        private function show404ErrorPage(){

            $data['title'] = '';
            $this->page_name = '404';
            $this->column_names[] = 'title';
            $this->column_values[] = extras::SITE_NAME.' - Error Page';
            $this->send_to_view();

        }

        //main method
        function mains()//
        {

            switch ($this->uri->segment(3)) {

                case 'dashboard';
                    $this->loadDashBoard();//
                    break;
                case 'register_property';
                    $this->loadPropetyRegistrationForm();
                    break;
                case 'update_property_registration';
                    $this->updatePropertyRegistration();
                    break;
                case 'process_registration';
                    $this->processPropertyRegistrationForm();
                    break;
                case 'upload_property_media';
                    $this->uploadPropertyMedia();
                    break;
                case 'multiple_image_upload';
                    $this->multipleImageUpload();
                    break;
                case 'multiple_image_upload_for_listed_property';
                    $this->multipleImageUploadForListedProperty();
                    break;
                case 'upload_main_image';
                    $this->uploadMainPropertyMedia();
                    break;
                case 'upload_listed_property_main_image';
                    $this->uploadListedPropertyMainPropertyMedia();
                    break;
                case 'delete_selected_property_image';
                    $this->deleteSelectedPropertyImage();
                    break;
                case 'check_image_avalaibility';
                    $this->checkImageAvalaibility();
                    break;
                case 'load_add_property';
                    $this->loadAddProperty();
                    break;
                case 'get_property_details_for_location';
                    $this->getPropertyDetailsForLocation();
                    break;
                case 'search_for_property_details';
                    $this->searchForPropertyDetailsUsingUserProvidedInputs();
                    break;
                case 'load_property_addition';
                    $this->loadPageForPropertyAddition();
                    break;
                case 'process_property_form';
                    $this->processPropertyAddition();
                    break;
                case 'upload_listed_property_media';
                    $this->uploadListedPropertyMedia();
                    break;
                case 'publish_property';
                    $this->publishProperty();
                    break;
                case 'my_listed_property';
                    $this->viewMyListedProperty();
                    break;
                case 'process_property_form_update';
                    $this->processPropertyFormUpdate();
                    break;
                case 'registered_properties';
                    $this->viewRegisteredProperties();
                    break;
                case 'view_single_property_details';
                    $this->viewSinglePropertyDetail();
                    break;
                case 'view_booked_properties';
                    $this->viewBookedProperties();
                    break;
                case 'view_clients_details';
                    $this->viewClientsDetails();
                    break;
                case 'make_available_unavailable_for_payment';
                    $this->makeAvailableUnavailableForPayment();
                    break;
                case 'process_find_roomy_form';
                    $this->processFindRoomyForm();
                    break;
                default:
                    $this->show404ErrorPage();

            }//

        }

        private function insertDepartment(){

            $departments =  explode('\r\n', $this->input->post('departments'));

            foreach($departments as $value){

                $unique_id = $this->createUniqueId('department_table','unique_id');

                $this->db->insert('department_table',
                    array(
                        'unique_id'=>$unique_id,
                        'department_name'=>$value,
                        'faculty_name'=>''
                    )
                );

            }

        }

        private function insertDepartmentCaller(){

            $this->page_name = 'dashboard/insert_department';
            $this->send_to_view();

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

/*case 'insert_department';
$this->insertDepartment();
break;
case 'insert_department_caller';
$this->insertDepartmentCaller();
break;*/

?>