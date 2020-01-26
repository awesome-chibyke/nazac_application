<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Extras{

    //for the hashing of passwords
    const SALT = 'sha256';

    //app name and details
    const APP_NAME = 'NAZAAC PROPERTY';
    const LOGO = '';

    //create varaible for table name
    const USER_TB = 'nazac_clients';
    const USER_TB_COLUMN = 'nazac_id,nazac_clients_rin,nazac_clients_has_roommy,nazac_clients_roommy_rin,nazac_clients_regno,nazac_client_department,nazac_clients_fname,nazac_clients_lname,nazac_client_email,nazac_client_phone,nazac_client_gender,nazac_client_passport,nazac_client_home_address,nazac_client_nationality,nazac_client_state_of_origin,nazac_client_lga,nazac_client_password,nazac_clients_hashpost,nazac_client_kins_name,nazac_client_kins_email,nazac_client_kins_phone,nazac_client_kins_address,nazac_client_kins_relationship,nazac_client_account_verification,nazac_client_verification_document,nazac_block_client_account,nazac_block_client_account_counter,nazac_block_client_account_reason,nazac_client_email_confirmation,nazac_client_forgot_password_code,nazac_client_role,nazac_account_delete_status,nazac_account_last_update,nazac_date_account_created,nazac_client_verification_front_id,nazac_client_verification_back_id,nazac_client_verification_ac_name,nazac_client_verification_ac_nom,nazac_client_verification_bank_name';

    const NAZAC_PROPERTY_REGISTRATION_TABLE = 'nazac_register_property';
    const NAZAC_PROPERTY_REGISTRATION_COLUMN = 	'nazac_property_id,nazac_property_number,nazac_property_lodge_name,nazac_property_lodge_address,nazac_property_interior_image,nazac_property_exterior,nazac_property_youtube_video,nazac_property_location,nazac_property_type,nazac_property_storey_type,nazac_property_amenities,nazac_property_closest_landmark,nazac_property_distance_from_landmark,nazac_property_caretaker_name,nazac_property_caretaker_email,nazac_property_caretaker_phone,nazac_property_caretaker_address,nazac_property_caretaker_ac_name,nazac_property_caretaker_ac_nom,nazac_property_caretaker_bank_name,nazac_property_date_added,nazac_property_last_update,nazac_property_thumbnail';

    const PROPERTY_TYPE_TABLE = 'property_type';
    const PROPERTY_TYPE_TABLE_COLUMNS = 'property_type';

    const LOCATION_TABLE = 'nazac_property_locations';
    const LOCATION_TABLE_COLUMN = 'nazac_location_id,nazac_location_name,nazac_date_added,location_number';

    const PROPERTY_LISTING_TABLE = 'nazac_property_listing';
    const PROPERTY_LISTING_TABLE_COLUMN = 'nazac_property_unique_id,nazac_property_gent_incharge_id,nazac_property_location,nazac_property_type,nazac_property_title,nazac_property_lodge_name,nazac_property_country,nazac_property_state,nazac_property_local_gov_area,nazac_property_town,nazac_property_street_address,nazac_property_street_location,nazac_property_closest_landmark,nazac_property_distance_from_landmark,nazac_property_room_number,nazac_property_price,nazac_property_older_price,nazac_property_currency,nazac_property_approximate_size,nazac_property_floor_type,nazac_property_description,nazac_property_thumbnail,nazac_property_images,nazac_property_features,nazac_property_defect_features,nazac_property_rating,nazac_property_category,nazac_property_purpose,nazac_payment_type,nazac_property_no_of_rooms,nazac_property_no_of_bathrooms,nazac_property_no_of_toilets,nazac_property_no_of_parking_space,nazac_property_youtube_link,nazac_property_publish_status,nazac_property_map_cordinates,nazac_property_booked_status,nazac_property_booker_id,nazac_property_book_count_down,nazac_property_rent_status,nazac_property_renters_id,nazac_property_rent_count_down,nazac_property_status,nazac_property_delete_status,nazac_property_views,nazac_property_last_update,nazac_property_post_date,nazac_property_legal_fee,nazac_property_agents_fee,nazaac_main_property_id';

    const PROPERTY_CATEGORY_TABLE = 'nazac_property_category';
    const PROPERTY_CATEGORY_TABLE_COLUMN = 'nazac_category_id,nazac_category_name,nazac_category_date_added';

    const PROPERTY_PURPOSE_TABLE = 'property_purpose';
    const PROPERTY_PURPOSE_TABLE_COLUMN = 'property_purpose';

    const PAYMENT_MOOD_TABLE = 'payment_mood';
    const PAYMENT_MOOD_TABLE_COLUMN = 'payment_mood';

    const SETUP_TABLE = 'nazac_site_details';
    const SETUP_TABLE_COLUMN = 'email1,email2,email3,phone1,phone2,address,site_name';

    const ADMIN_TABLE = 'yeah_yeah';
    const ADMIN_TABLE_COLUMN = 'unique_id,email,full_name,pass,status,admin_type,date,secret_code,check_on';

    const BOOKED_PROPERTY_TABLE = 'nazac_book_property';

    const BOOKED_PROPERTY_TABLE_COLUMNS = 'nazac_book_id,nazac_booked_property_id,nazac_bookers_id,nazac_book_counter,nazac_date_booked';//

    const FIND_ROOMY_TABLE = 'find_a_roomy';
    const FIND_ROOMY_TABLE_COLUMNS = 'unique_id,roomate_seeker_id,listed_property_id,description_of_personality,room_mate_pair,faculty_department_name,gender,prefered_level,purpose,roomate_find_status';

    const FACULTY_TABLE = 'faculty_table';

    const RESPONSE_FOR_ROOMY_REQUEST_TB = 'response_for_roomy_request_tb';

    //domain information
    const DOMAIN_NAME = 'what_ever.com';
    const SUPPORT_EMAIL = 'info@techocraft.com';
    const SITE_NAME = 'Bet Banker';
    const ADDRESS = 'No 3 Benin Enugu';
    const PHONE_NUMBER = '+2348056352463';

    public function exploder($value, $delimeter){

        return explode($delimeter,$value);

    }

    //create object from error array
    public function createObjectFromErrorArray($error_array, $field_names, $name_attribute){
        //declare an empty array
        //print_r($error_array); print_r($field_names); die();
        $carrier = array();
        for($i = 0; $i < count($field_names); $i++){

            for($l = 0; $l < count($error_array); $l++){

                if (strpos($error_array[$l],$field_names[$i]) !== false)
                {
                    $carrier[$name_attribute[$i]] = $error_array[$l];
                    break;
                }else{
                    $carrier[$name_attribute[$i]] = "";
                }

            }

        }

        return $carrier;

    }

    //createa an array from another array taking note of empty values and leaving them out
    public function createArrayFromAnotherArrayWhileOmittingEmptyValues($array = array()){

        $new_array = array();
        if(count($array) > 0){

            foreach($array as $key => $value){
                if(!empty($value)){
                    $new_array[] = $value;
                }
            }

        }

        return $new_array;

    }

    function returnNone($value){
        if(empty($value)){
            return 'None';
        }
        return $value;
    }

    public function returnVoteTypeDetail($vote_type){

        if (strpos($vote_type, 'not') !== false)
        {
            return 'You have voted against this event';
        }
        else
        {
            return 'You have voted in favour of this event';
        }

    }
//2019-10-05_05:37:25_3600000_Africa-Lagos
    public function splitDateForBetTipSelection($date_time_zone){

        $exploded_array = $this->exploder($date_time_zone, '_');

        $date_time = $exploded_array[0].' '.$exploded_array[1];

        $time_zone = str_replace('-','/',$exploded_array[3]);

        return array($date_time, $exploded_array[2], $time_zone);

    }

    public function returnUserFbFullName($full_name){

        //split the full name
        $splitted_full_name = explode(' ', $full_name);

        //based on the lenght of catch the different names
        if(count($splitted_full_name) == 3){
            $last_name = $splitted_full_name[0];
            $first_name = $splitted_full_name[1];
            $middle_name = $splitted_full_name[2];
        }elseif(count($splitted_full_name) == 2){
            $last_name = $splitted_full_name[0];
            $first_name = $splitted_full_name[1];
            $middle_name = "";
        }elseif(count($splitted_full_name) == 1){
            $last_name = $splitted_full_name[0];
            $first_name = "";
            $middle_name = "";
        }elseif(count($splitted_full_name) == 0){
            $last_name = "";
            $first_name = "";
            $middle_name = "";
        }

        return array($last_name, $first_name, $middle_name);

    }



}