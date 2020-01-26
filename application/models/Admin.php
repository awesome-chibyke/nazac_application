<?php

class Admin extends CI_Model {
	
	public function __construct()
    {
       	
		parent::__construct();
		$this->load->library('processes');
    }



    //function that explode any value passed to it
    public function exploder($delimiter,$value){

	    return explode($delimiter, $value);

    }

    public function getActualRoomNumber($last_apartment_added_for_this_property){

        if(count($last_apartment_added_for_this_property) === 0){
            $current_room_num = '001';
        }else{

            $current_room_num = $last_apartment_added_for_this_property[0]['nazac_property_room_number'] + 1;

            $possible_count_array = array(0, 1, 2, 3, 4, 5, 6);
            $possible_prefix_array = array('001', '00', '0', '0', '', '', '');

            if(in_array(strlen($current_room_num), $possible_count_array)){
                $key = array_search(strlen($current_room_num), $possible_count_array);
            }

            $current_room_num = $possible_prefix_array[$key].$current_room_num;
        }

        return $current_room_num;

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

            $registered_property_details = $this->dbSelectWithOrWithoutParameter(
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

    public function buildEmbededLink($selected_url){

        $exploded_url = explode("=", $selected_url);

        $url = 'https://www.youtube.com/embed/'.end($exploded_url);

        return $url;
    }

    //create a unique id
    function createUniqueId($table_name, $column){

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

    public function getDepartments(){

	    $department_details = $this->dbSelectWithOrWithoutParameter('department_table');

        $department_details_array = $department_details['result'];

        return $department_details_array;

    }

    public function getFaculty(){

        $faculty_details = $this->dbSelectWithOrWithoutParameter('faculty_table');

        $faculty__details_array = $faculty_details['result'];

        return $faculty__details_array;

    }

    public function dbSelectWithOrWithoutParameter($table_name, $parameter_array = FALSE, $order_column = FALSE, $order_by = FALSE, $rowsperpage = FALSE, $offset = FALSE){

        if($order_column !== FALSE){

            $this->db->order_by($order_column, $order_by);

        }

        if($rowsperpage !== FALSE){
            $this->db->limit($rowsperpage, $offset);
        }

        if($parameter_array !== FALSE){

            $this->db->where($parameter_array);

        }
        $query = $this->db->get($table_name);

        //declare an empty array
        $query_result_array = array();

        //get row count
        $row_count = $query->num_rows();

        if($row_count > 0){
            $query_result_array = $query->result_array();
        }

        return array('row_count'=>$row_count, 'result'=>$query_result_array);


    }

    function getUSerDetails($SESSION){

        //get the users main id
        $user_id = $this->dbSelectWithOrWithoutParameter(
            extras::USER_TB,
            array(
                'nazac_clients_hashpost'=>$SESSION
            )
        );

        return array('row_count'=>$user_id['row_count'], 'result'=>$user_id['result']);

    }

    function returnAdminDetails($admin_id){

        $array  = array('unique_id' => $admin_id);
        $this->db->where($array);
        $admin_details = $this->db->get(extras::ADMIN_TABLE);
        $admin_details = $admin_details->result_array();
        $admin_details = $admin_details[0];

        return $admin_details;

    }
	
	public function getAll($table_name, $parameter_array = FALSE, $order_column = FALSE, $order_by = FALSE){ 
			
		if ($parameter_array === FALSE)
		{
			
			if($order_column !== FALSE){

				$this->db->order_by($order_column, $order_by);

			}
			$query = $this->db->get($table_name);
			return $query->result_array();

		}
		//$query = $this->db->get_where('portfolio', array('project_id' => $project_id));
		if($order_column !== FALSE){

			$this->db->order_by($order_column, $order_by);

		}
		$query = $this->db->get_where($table_name, $parameter_array);
		return $query->row_array();
			
	}

	public function insert($table_name, $data){
		
		return $this->db->insert($table_name, $data);

	}
	
	public function updateDatas($data, $column, $clause, $table){

		$this->db->where($column, $clause);
		if($this->db->update($table, $data)){
			return true;
		}else{

			return false;

		}
	}

	public function deleteDatas($column, $clause, $table){

        $this->db->where($column, $clause);
        if($this->db->delete($table)){
            return true;
        }else{
            return false;
        }

    }

    public function getAllPaymentMood(){
        $query_payment_mood = $this->db->query("SELECT * FROM payment_mood");
        return $query_payment_mood->result_array();
    }

    //the function that returns the type of users
    public function getUserType($user_type){

        $user_type = strtolower($user_type);

        $user = "NONE";

        if($user_type === 'individual'){

            $user = "INDIVIDUAL";

        }else if($user_type === 'agent'){

            $user = "AGENT";

        }else if($user_type === 'builder'){

            $user = "AGENT";

        }else if($user_type === 'owner'){

            $user = "OWNER";

        }

        return $user;

    }

	public function getCurrencySymbols($currency){

		//array for the currncy names
		$currency_array = array('NGN', 'USD');

		//array for the currency symbols
		$currency_symbol = array('₦', '$');

		//check if the currency sent in is the array for the currency names
		if(in_array($currency, $currency_array)){

			//get the key for the array value that was returned
			$key = array_search($currency, $currency_array);

			//return the value of the array symbol using the returned key
			return $currency_symbol[$key];

		}

	}

    //adds whatever to the dates
    function getDatetimeAdder($dated, $range, $time_zone) {

        date_default_timezone_set($time_zone);

        return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
    }

    //check for the existence of a value in an array
    function existenceChecker($value, $array_value, $array_value_to_deduced, $explode_option = 0, $delimeter = FALSE){

        $value_to_be_returned = "";

        $array = ($explode_option == 1) ? explode($delimeter, $array_value) : $array_value;

	    if(in_array($value, $array)){

            $key = array_search($value, $array);

            $array_to_be_deduded = ($explode_option == 1) ? explode($delimeter, $array_value_to_deduced) : $array_value_to_deduced;

            $value_to_be_returned = $array_to_be_deduded[$key];

        }

        return $value_to_be_returned;

    }

    function explodeImplodeValue($value, $delimiter_for_explode, $delimiter_for_implode, $option){

	    if($option == 'explode_first'){
            $exploded_value = explode($delimiter_for_explode, $value);
            return implode($delimiter_for_implode, $exploded_value);
        }

        if($option == 'implode_first'){
            $imploded_value = implode($delimiter_for_implode, $value);
            return explode($delimiter_for_explode, $imploded_value);
        }

        if($option == 'neat_explosion'){
            $value = rtrim($value, $delimiter_for_explode);
            $exploded_value = explode($delimiter_for_explode, $value);

            //looop through the array and remove empty values
            for($i = 0; $i < count($exploded_value); $i++){
                if(empty($exploded_value[$i])){
                    array_splice($exploded_value,$i,1);
                }
            }
            return $exploded_value;
        }

    }

    //for authenticating the
    function addValueToBeAuthenticated($user_id){

        $unique_id = $this->createUniqueId('authenticate_incoming', 'unique_id');
	    $this->db->insert('authenticate_incoming', array('unique_id'=>$unique_id, 'user_id'=>$user_id));
	    return 'checker-'.$unique_id;

    }

    public function states(){
        $states = array('Abia','Adamawa','Akwaibom','Anambra','Bauchi','Bayelsa','Benue','Borno','CrossRiver','Delta','Ebonyi','Edo','Ekiti','Enugu','Gombe','Imo','Jigawa','Kaduna','Kano','Kastina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto','Taraba','Yobe','Zamfara','Abuja','Other');
        return $states;
    }


    public function country(){
        $country = array('Afghanistan','Albania','Algeria','Andorra','Angola','Antigua and Barbuda','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan','Bolivia','Bosnia and Herzegovina','Botswana','Brazil','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cabo Verde','Cambodia','Cameroon','Canada','Central African Republic','Chad','Chile','China','Colombia','Comoros','Congo','Costa Rica','C?te dIvoire','Croatia','Cuba','Cyprus','Czech Republic','Democratic Peoples Republic of Korea North Korea','Democratic Republic of the Cong','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Fiji','Finland','France','Gabon','Gambia','Georgia','Germany','Ghana','Greece','Grenada','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Kuwait','Kyrgyzstan','Lao Peoples Democratic Republic Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Mauritania','Mauritius','Mexico','Micronesia Federated States','Monaco','Mongolia','Montenegro','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Zealand','Nicaragua','Niger','Nigeria','Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Qatar','Republic of Korea South Korea','Republic of Moldova','Romania','Russian Federation','Rwanda','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Tajikistan','Thailand','Timor-Leste','Togo','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom of Great Britain and Northern Ireland','United Republic of Tanzania','United States of America','Uruguay','Uzbekistan','Vanuatu','Venezuela','Vietnam','Yemen','Zambia','Zimbabwe');
        return $country;
    }

    function returnBankNames(){

        return array('Access Bank Plc','Citibank Nigeria Limited','Diamond Bank Plc','Ecobank Nigeria Plc','Fidelity Bank Plc','FIRST BANK NIGERIA LIMITED','First City Monument Bank Plc','Globus Bank Limited','Guaranty Trust Bank Plc','Heritage Banking Company Ltd.','Key Stone Bank','Polaris Bank','Providus Bank','Stanbic IBTC Bank Ltd.','Standard Chartered Bank Nigeria Ltd.','Sterling Bank Plc','SunTrust Bank Nigeria Limited','Titan Trust Bank Ltd', 'Union Bank of Nigeria Plc, United Bank For Africa Plc','Unity Bank Plc','Wema Bank Plc','Zenith Bank Plc');

    }

    //rename image
    function createFileName($supplied_file_path){

        $new_name = md5(microtime().uniqid()) . '.jpg';
        $file_path = $supplied_file_path;
        $file_path_to_check = $supplied_file_path . $new_name;

        if(file_exists($file_path_to_check)){
            $this->createFileName($supplied_file_path);
        }else{
            return array('file_path'=>$file_path, 'new_name'=>$new_name);
        }
    }
	
}

?>
