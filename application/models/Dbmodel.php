<?php
class Dbmodel extends CI_Model{
		
	public function __construct() {
				parent::__construct();
				$this->load->library('lib');
	}
	
	/*ADMIN*/
	public function getLogginAdminData($SESSION){
		$query = $this->db->get_where($this->lib->nazac_admin, array('nazac_admin_id'=>$SESSION));
		return $query->row_array();
	}
	
	
	
	/*USERs*/
	public function siteDetails($item){
		$siteDetail = $this->dbmodel->getSiteDetails();
		return $siteDetail[$item];
	}
	
	public function getUserSingleData($id,$field){
		$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id'=>$id));
		$row = $query->row_array();
		return $row[$field];
	}
	
	public function getAllPaymentMethod(){
		$table = $this->lib->payment_gateways;
		$query_cat = $this->db->query("SELECT * FROM $table");
		return $query_cat->result_array();
	}
	
	public function getDepartments(){
		$table = $this->lib->department_table;
		$query_cat = $this->db->query("SELECT * FROM $table");
		return $query_cat->result_array();
	}
	
	public function getFaculty(){
		$table = $this->lib->faculty_table;
		$query_cat = $this->db->query("SELECT * FROM $table");
		return $query_cat->result_array();
	}
	
	public function count_all_user() {
		$this->db->where('nazac_client_role !=', 'agent');
		$query = $this->db->get($this->lib->nazac_clients);
		return $query->num_rows();
	}
	
	public function count_all_agents_home() {
		$this->db->where('nazac_client_role', 'agent');
		$query = $this->db->get($this->lib->nazac_clients);
		return $query->num_rows();
	}
	
	public function count_all_Property_listed() {
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function count_all_reviews_post() {
		$query = $this->db->get($this->lib->nazac_clients_review);
		return $query->num_rows();
	}
	
	public function getAllPropertyType(){;
		$table = $this->lib->property_type;
		$query_type = $this->db->query("SELECT * FROM $table");
		return $query_type->result_array();
	}
	
	public function returnSingleData($table,$column,$value,$field){
		$query = $this->db->get_where($table, array($column=>$value));
		$row = $query->row_array();
		return $row[$field];
	}
	
	public function getSiteDetails(){
		$query = $this->db->get_where($this->lib->nazac_site_details, array('id'=>1));
		$data = $query->row_array();
		return $data;
	}
	
	public function getLogginUserData($SESSION){
		$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_clients_hashpost'=>$SESSION));
		return $query->row_array();
	}
	
	public function getUserById($id){
		$query = $this->db->get_where($this->lib->nazac_clients, array('nazac_id'=>$id));
		return $query->row_array();
	}
	
	public function countMultiImages($id){
        $query = $this->db->get_where($this->lib->nazac_register_property, array('nazac_property_id'=>$id));
        $data = $query->row_array();
        return $data;
    }
	
	public function getAllAccountType(){
		$table = $this->lib->nazac_account_type;
		$query_type = $this->db->query("SELECT * FROM $table");
		return $query_type->result_array();
	}
	
	public function getAllLocations(){
		$table = $this->lib->nazac_property_locations;
		$query_type = $this->db->query("SELECT * FROM $table");
		return $query_type->result_array();
	}
	
	public function fetch_recent_property(){
		$this->db->limit(2);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function count_all_property($cat) {
		$cat = str_replace("-"," ",$cat);
		$catid = $this->returnSingleData($this->lib->nazac_property_category,'nazac_category_name',$cat,'nazac_category_id');
		if($cat=='' || $cat=='All'){}else{
		$this->db->where('nazac_property_category', $catid);
		}
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function fetch_all_property_no_cat($limit,$start,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function fetch_all_property($limit,$start,$cat,$total_row) {
		$cat = str_replace("-"," ",$cat);
		$catid = $this->returnSingleData($this->lib->nazac_property_category,'nazac_category_name',$cat,'nazac_category_id');
		if($cat=='' || $cat=='All'){}else{
		$this->db->where('nazac_property_category', $catid);
		}
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function fetch_three_property(){
		$this->db->limit(3);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;
		}
	}
	
	public function fetch_three_property_last(){
		$this->db->limit(9);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;
		}
	}
	
	public function getAllPropertyCategory(){
		$table = $this->lib->nazac_property_category;
		$query_cat = $this->db->query("SELECT * FROM $table");
		return $query_cat->result_array();
	}
	
	public function getVerifiedAgentsHome(){
		$this->db->limit(4);
		$this->db->where('nazac_client_account_verification', 'yes');
		$this->db->where('nazac_account_delete_status', 'no');
		$this->db->where('nazac_client_role', 'agent');
		$this->db->where('nazac_client_email_confirmation', 'yes');
		$this->db->where('nazac_block_client_account', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_clients);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function getVerifiedSingleAgentsData($id){
		$this->db->limit(1);
		$this->db->where('nazac_client_account_verification', 'yes');
		$this->db->where('nazac_account_delete_status', 'no');
		$this->db->where('nazac_client_role', 'agent');
		$this->db->where('nazac_client_email_confirmation', 'yes');
		$this->db->where('nazac_block_client_account', 'no');
		$query = $this->db->get($this->lib->nazac_clients);
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function count_all_agents() {
		$this->db->where('nazac_client_account_verification', 'yes');
		$this->db->where('nazac_account_delete_status', 'no');
		$this->db->where('nazac_client_role', 'agent');
		$this->db->where('nazac_client_email_confirmation', 'yes');
		$this->db->where('nazac_block_client_account', 'no');
		$query = $this->db->get($this->lib->nazac_clients);
		return $query->num_rows();
	}
	
	public function fetch_all_agents($limit,$start,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->where('nazac_client_account_verification', 'yes');
		$this->db->where('nazac_account_delete_status', 'no');
		$this->db->where('nazac_client_role', 'agent');
		$this->db->where('nazac_client_email_confirmation', 'yes');
		$this->db->where('nazac_block_client_account', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_clients);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	
	public function fetchAllPropertyBySingleAgent($limit,$start,$id,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->where('nazac_property_gent_incharge_id', $id);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_listing);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function countAllPropertyBySingleAgent($id) {
		$this->db->where('nazac_property_gent_incharge_id', $id);
		$this->db->where('nazac_property_publish_status', 'published');
		$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function countAllPropertyListedBySingleAgent($id) {
		$this->db->where('nazac_property_gent_incharge_id', $id);
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function countAllPropertyListedBySingleAgentStatus($id,$status) {
		$this->db->where('nazac_property_publish_status', $status);
		$this->db->where('nazac_property_gent_incharge_id', $id);
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function countAllBookPropertyUnderAgent($id) {
		$this->db->where('agent_incahrge_id', $id);
		$query = $this->db->get($this->lib->nazac_book_property);
		return $query->num_rows();
	}
	
	public function countAllBookPropertyUnderUser($id) {
		$this->db->where('nazac_bookers_id', $id);
		$query = $this->db->get($this->lib->nazac_book_property);
		return $query->num_rows();
	}
	
	public function countAllRegisterPropertyBySingleAgent($id) {
		$this->db->where('agent_incahrge_id', $id);
		$query = $this->db->get($this->lib->nazac_register_property);
		return $query->num_rows();
	}
	
	public function count_all_news() {
		$query = $this->db->get($this->lib->nazac_news_feed);
		return $query->num_rows();
	}
	
	public function fetch_all_news($limit,$start,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_news_feed);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function getSingleNew($id){
		$query = $this->db->get_where($this->lib->nazac_news_feed, array('nazac_news_id'=>$id));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getSingleProperty($pId){
		$this->db->where('nazac_property_publish_status', 'published');
		//$this->db->where('nazac_property_rent_status', 'available');
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_unique_id'=>$pId));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getSingleBookedProperty($bId){
		$query = $this->db->get_where($this->lib->nazac_book_property, array('nazac_book_id'=>$bId));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getSinglePayment($payId){
		$query = $this->db->get_where($this->lib->nazac_renting_payment, array('nazac_renting_id'=>$payId));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getSingleRegisteredProperty($pId){
		$query = $this->db->get_where($this->lib->nazac_register_property, array('nazac_property_id'=>$pId));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function fetch_all_faq() {
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_faq);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function countAllBookedPropertyBySingleClient($id) {
		$this->db->where('nazac_bookers_id', $id);
		$query = $this->db->get($this->lib->nazac_book_property);
		return $query->num_rows();
	}
	
	public function bookingCounterDecrementer(){
		$table = $this->lib->nazac_book_property;
		$query = $this->db->query("SELECT * FROM $table WHERE `nazac_book_counter`>0");
		while($row = $query->unbuffered_row()){
			$count = $row->nazac_book_counter;
			$newcount = $row->nazac_book_counter-1;
			$this->db->query("UPDATE $table SET `nazac_book_counter`='".$newcount."' WHERE `nazac_book_counter`> 0 ");
		}
	}
	
	public function DeleteDueBooking(){
		$table = $this->lib->nazac_book_property;
		$query = $this->db->query("SELECT * FROM $table WHERE `nazac_book_counter`=0");
		while($row = $query->unbuffered_row()){
			$id = $row->nazac_book_id;
			$this->db->query("DELETE FROM $table WHERE `nazac_book_id`='".$id."' ");
		}
	}
	
	public function getBookedPropertyBySingleClient($uid){
		$table = $this->lib->nazac_book_property;
		$table2 = $this->lib->nazac_property_listing;
		$query = $this->db->query("SELECT * FROM $table WHERE `nazac_bookers_id`='".$uid."' ");
		if($query->num_rows()>0){
			$bookdata = $query->result_array();
			$getPro = array();
			for($i=0;$i<count($bookdata);$i++){
				$query =  $this->db->query("SELECT * FROM $table2 WHERE `nazac_property_unique_id`='".$bookdata[$i]['nazac_booked_property_id']."' and `nazac_property_publish_status`='published' and `nazac_property_rent_status`='available' and `nazac_property_delete_status`='no' ");
		    	$getPro[] = $query->result_array();
			}
			return $getPro;
		}else{
			return(0);
		}
	}
	
	public function getBookingExpireTime($uid, $pid){
		$this->db->where('nazac_bookers_id', $uid);
		$this->db->where('nazac_booked_property_id', $pid);
		$query = $this->db->get($this->lib->nazac_book_property);
		if($query){
			return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getUserSingleBookedProperty($uid,$pid,$field){
		$query = $this->db->get_where($this->lib->nazac_book_property, array('nazac_bookers_id'=>$uid, 'nazac_booked_property_id'=>$pid));
		$row = $query->row_array();
		return $row[$field];
	}
	
	public function search_for_property($limit,$start,$keywords,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$keywork = str_replace("_"," ", $keywords);
		$key = explode("-", $keywork);
		$location = $key[0];
		$cat = $key[1];
		$stype = $key[2];
		$sbudget = $key[3];
		if(count($key)>0){
			$this->db->like('nazac_property_location', $location);
            //$this->db->or_like('nazac_property_category', $cat);
            $this->db->or_like('nazac_property_type', $stype);
            $this->db->or_like('nazac_property_price', $sbudget);
			$this->db->order_by("id desc");
            $query = $this->db->get($this->lib->nazac_property_listing);
			if ($query->num_rows() > 0) {
				$data = $query->result_array();
				return $data;
			}else{
			 	return 0;	
			}
		}else{
			return(0);
		}
	}
	
	public function count_search_for_property($keywords) {
		$keywork = str_replace("_"," ", $keywords);
		$key = explode("-", $keywork);
		$location = $key[0];
		$cat = $key[1];
		$stype = $key[2];
		$sbudget = $key[3];
		$this->db->like('nazac_property_location', $location);
		//$this->db->or_like('nazac_property_category', $cat);
		$this->db->or_like('nazac_property_type', $stype);
		$this->db->or_like('nazac_property_price', $sbudget);
		$query = $this->db->get($this->lib->nazac_property_listing);
		return $query->num_rows();
	}
	
	public function fetch_all_report_property_by_user($uid) {
		$this->db->where('nazac_vacancy_reporter_id', $uid);
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_property_vacancy_report);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function updateViewedProperty($pid){
		if(!empty($pid)){
			if($query = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_unique_id'=>$pid))){
				$row = $query->row_array();
				$viewCount = $row['nazac_property_views'];
				$newViewCount = $viewCount + 1;
				$data = array(
					"nazac_property_views" => $newViewCount
				);
				$this->db->update($this->lib->nazac_property_listing, $data, array("nazac_property_unique_id"=>$pid));
				return $viewCount;
			}
		}
	}
	
	public function countAgentsPropertyView($agentId){
		$query = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_gent_incharge_id'=>$agentId));
		$data = $query->result_array();
		$count = 0;
		for($i=0;$i<count($data);$i++){
		 	$count += $data[$i]['nazac_property_views'];	
		}
		return $count;
	}
	
	public function count_all_reviews() {
		$query = $this->db->get($this->lib->nazac_clients_review);
		return $query->num_rows();
	}
	
	public function fetch_all_reviews($limit,$start,$total_row) {
		$offset = ($start-1)*$limit;
		$this->db->limit($limit,$offset);
		$this->db->where("nazac_review_aproval", "yes");
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_clients_review);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function fetch_all_partners() {
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_partners);
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}else{
		 return 0;	
		}
	}
	
	public function getCurrentRentedProperty($uid){
		$this->db->limit(1);
		$this->db->where('nazac_renters_id', $uid);
		$this->db->where('nazac_renting_payment_status', 'confirmed');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_renting_payment);
		if($query){
			return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getSingleRentedProperty($pId){
		$this->db->where('nazac_property_publish_status', 'published');
		//$this->db->where('nazac_property_rent_status', 'taken');
		$this->db->where('nazac_property_delete_status', 'no');
		$query = $this->db->get_where($this->lib->nazac_property_listing, array('nazac_property_unique_id'=>$pId));
		if($query){
		return $query->row_array();
		}else{
			return 0;
		}
	}
	
	public function getAllRentedPropertyBySingleClient($uid){
		$this->db->where('nazac_renters_id', $uid);
		//$this->db->where('nazac_renting_payment_status', 'pending');
		$this->db->order_by("id desc");
		$query = $this->db->get($this->lib->nazac_renting_payment);
		if($query){
			return $query->result_array();
		}else{
			return 0;
		}
	}
	
	public function returnSingleDataFromRentProperty($pId,$field){
		$query = $this->db->get_where($this->lib->nazac_property_listing, array("nazac_property_unique_id"=>$pId));
		$row = $query->row_array();
		return $row[$field];
	}
	
	public function rentingCounterDecrementer(){
		$table = $this->lib->nazac_renting_payment;
		$query = $this->db->query("SELECT * FROM $table WHERE `nazac_renting_countdown`>0 and `nazac_renting_payment_status`='confirmed'");
		while($row = $query->unbuffered_row()){
			$count = $row->nazac_renting_countdown;
			$newcount = $row->nazac_renting_countdown-1;
			$this->db->query("UPDATE $table SET `nazac_renting_countdown`='".$newcount."' WHERE `nazac_renting_countdown`> 0 and `nazac_renting_payment_status`='confirmed' ");
		}
	}
	
	
	public function sendEmail3monthToExpiringRent(){
		$table = $this->lib->nazac_renting_payment;
		$query = $this->db->query("SELECT * FROM $table WHERE `nazac_renting_countdown`<=4 and `nazac_renting_payment_status`='confirmed'");
		//$to_email = $agentRow['nazac_client_email'];
		$from_email = $this->siteDetails('email3');
		$siteName = $this->siteDetails('site_name');
		$subject = $this->siteDetails('site_name').' Rent Expiring Notice!';
		while($row = $query->unbuffered_row()){
			print $message = '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$this->siteDetails('site_name').'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3><span><img src="'.base_url().'resource/img/logo.jpg" width="80" height="80"/></span> <span>'.$this->siteDetails('site_name').' Rent Expiring Notice!</span> </h3><p>Hi '.$this->getUserSingleData($row->nazac_renters_id,'nazac_clients_fname').'</p><p>Your rent will expire in '.$row->nazac_renting_countdown.' months time ('.$row->expiry_date.'). Take action now and renew your rent to secure your apartment before someone else will take it. Thanks</p><p><strong style="font-size: 19px;">For more enquires please contact:</strong><br>Email: '.$this->siteDetails('email3').', '.$this->siteDetails('email4').'<br>Phone: '.$this->siteDetails('phone1').', '.$this->siteDetails('phone2').'</p></div></body></html>';
			
			$this->lib->sendBasicMail($this->getUserSingleData($row->nazac_renters_id,'nazac_client_email'),$from_email,$siteName,$subject,$message);
		}
	}
	
	
	

}
?>