<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Lib{
	/*Database Tables*/
	var $nazac_clients = 'nazac_clients';
	var $nazac_site_details = 'nazac_site_details';
	var $nazac_account_type = 'nazac_account_type';
	var $nazac_property_listing = 'nazac_property_listing';
	var $nazac_property_category = 'nazac_property_category';
	var $nazac_property_locations = 'nazac_property_locations';
	var $nazac_register_property = 'nazac_register_property';
	var $property_type = 'property_type';
	var $nazac_news_feed = 'nazac_news_feed';
	var $nazac_clients_review = 'nazac_clients_review';
	var $nazac_faq = 'nazac_faq';
	var $nazac_book_property = 'nazac_book_property';
	var $nazac_property_vacancy_report = 'nazac_property_vacancy_report';
	var $nazac_partners = 'nazac_partners';
	var $nazac_email_subscription = 'nazac_email_subscription';
	var $payment_gateways = 'payment_gateways';
	var $nazac_renting_payment = 'nazac_renting_payment';
	var $department_table = 'department_table';
	var $faculty_table = 'faculty_table';
	var $nazac_admin = 'nazac_admin';
	/*Other variables*/
	var $algorithm = 'haval160,4';
	
	/*ADMIN*/
	public function checkIfLogginAdmin(){
		if(isset($_SESSION['_nacad_id'])&&!empty($_SESSION['_nacad_id'])){
			$_SESSION['_adminlogger'] = $_SESSION['_nacad_id'];
		}else if(isset($_COOKIE['_nacad_id'])&&!empty($_COOKIE['_nacad_id'])){
			$_SESSION['_adminlogger'] = $_COOKIE['_nacad_id'];
		}
	}
	
	public function authLoginSTAYAdmin(){
		if(isset($_SESSION['_adminlogger'])&&!empty($_SESSION['_adminlogger'])){
			return true;
		}else{
			redirect(base_url().'admin/dashboard/login');
		}
	}
	
	public function authLoginOUTAdmin(){
		if(isset($_SESSION['_adminlogger'])&&!empty($_SESSION['_adminlogger'])){
			redirect(base_url().'admin/dashboard/');
		}else{
			//do nothing
		}
	}
	
	/*ADMIN END*/
	
	/*USER*/
	public function checkIfLoggin(){
		if(isset($_SESSION['_nazp_id'])&&!empty($_SESSION['_nazp_id'])){
			$_SESSION['_nazlogger'] = $_SESSION['_nazp_id'];
		}else if(isset($_COOKIE['_nazp_id'])&&!empty($_COOKIE['_nazp_id'])){
			$_SESSION['_nazlogger'] = $_COOKIE['_nazp_id'];
		}
	}
	
	public function authLoginSTAY(){
		if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){
			return true;
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function authLoginOUT(){
		if(isset($_SESSION['_nazlogger'])&&!empty($_SESSION['_nazlogger'])){
			redirect(base_url().'member/dashboard');
		}else{
			return true;
		}
	}
	/*USER END*/
	
	
	public function sendBasicMail($to_email,$from_email,$siteName,$subject,$message){  
         //Load email library 
        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.$siteName.' <'.$from_email.'>' . "\r\n";
		$retval = @mail($to_email,$subject,$message,$headers);
		if($retval = true){ 
         	return 1; 
		 }else{
			return 0; 
		 }
    }
	
	public function timeZone(){
		date_default_timezone_set('Africa/Lagos');
	}
	
	public function getDate(){
		$this->timeZone();
		return date("Y-m-d h:i:s");
	}
	
	public function getDate2(){
		$this->timeZone();
		return date("d M Y h:i:s A");
	}
	
	public  function passwordHash($algorithm,$password){
		$md5_value = hash($algorithm, $password, FALSE);
		return $md5_value;
    }
	
	public function unlinkFile($fileName,$filePath){
		@unlink($filePath.$fileName);
		return $this;
	}

	
	public function randGenerator(){
		$randnum = time();
		$randpicker = rand(1,143);
		$pickerbox = array('RCA','RCB','RCC','RCD','RCE','RCF','RCG','RCH','RCI','RCJ','RCK','RCL','RCM','RCN','RCO','RCP','RCQ','RCR','RCS','RCT','RCU','RCV','RCW','RCX','RCY','RCZ','RTA','RTB','RT','RTC','RTD','RTE','RTF','RTG','RTH','RTI','RTJ','RTK','RTL','RTM','RTN','RTO','RTP','RTQ','RTR','RTS','RTT','RTU','RTV','RTW','RTX','RTY','RTZ','RPA','RPB','RPC','RPD','RPD','RPE','RPF','RPG','RPH','RPI','RPJ','RPK','RPL','RPM','RPN','RPO','RPP','RPQ','RPR','RPS','RPT','RPU','RPV','RPW','RPX','RPY','RPZ','RRR','REA','REB','REC','RED','REE','REF','REG','REH','REI','REJ','REK','REL','REM','REN','REO','REP','REQ','RER','RES','RET','REU','REV','REW','REX','REY','REZ','RDA','RDB','RDC','RDD','RDE',"RAA","RBH","RHJ","RKK","RWH","RBB","RFC","RGC","RHC","RJC","RKC","TLC","TZC","TXC","TCC","TVC","TBC","TNC","TDO","TDT","TTT","TAG","TAH","TAS","TAR","TAC","TAT","TAZ","TSY","TSB","TZX","TQO","TAP");
		$shuff = $pickerbox[$randpicker];
		$id = strtoupper(substr(uniqid(), 5));
		$main = $shuff.$randnum.$id;
		return $main; 
	} 
	
	public function nazacIdGenerator(){
		$year = date('Y');
		$initial = 'NAZAC/'.$year;
		$randnum = time();
		$randpicker = rand(1,143);
		$pickerbox = array('RCA','RCB','RCC','RCD','RCE','RCF','RCG','RCH','RCI','RCJ','RCK','RCL','RCM','RCN','RCO','RCP','RCQ','RCR','RCS','RCT','RCU','RCV','RCW','RCX','RCY','RCZ','RTA','RTB','RT','RTC','RTD','RTE','RTF','RTG','RTH','RTI','RTJ','RTK','RTL','RTM','RTN','RTO','RTP','RTQ','RTR','RTS','RTT','RTU','RTV','RTW','RTX','RTY','RTZ','RPA','RPB','RPC','RPD','RPD','RPE','RPF','RPG','RPH','RPI','RPJ','RPK','RPL','RPM','RPN','RPO','RPP','RPQ','RPR','RPS','RPT','RPU','RPV','RPW','RPX','RPY','RPZ','RRR','REA','REB','REC','RED','REE','REF','REG','REH','REI','REJ','REK','REL','REM','REN','REO','REP','REQ','RER','RES','RET','REU','REV','REW','REX','REY','REZ','RDA','RDB','RDC','RDD','RDE',"RAA","RBH","RHJ","RKK","RWH","RBB","RFC","RGC","RHC","RJC","RKC","TLC","TZC","TXC","TCC","TVC","TBC","TNC","TDO","TDT","TTT","TAG","TAH","TAS","TAR","TAC","TAT","TAZ","TSY","TSB","TZX","TQO","TAP");
		$shuff = $pickerbox[$randpicker];
		$id = strtoupper(substr(uniqid(), 5));
		$main = $initial.$shuff.'/'.$randnum;
		return $main;
	}
	
	public function country(){
		$country = array('Afghanistan','Albania','Algeria','Andorra','Angola','Antigua and Barbuda','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan','Bolivia','Bosnia and Herzegovina','Botswana','Brazil','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cabo Verde','Cambodia','Cameroon','Canada','Central African Republic','Chad','Chile','China','Colombia','Comoros','Congo','Costa Rica','C?te dIvoire','Croatia','Cuba','Cyprus','Czech Republic','Democratic Peoples Republic of Korea North Korea','Democratic Republic of the Cong','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Fiji','Finland','France','Gabon','Gambia','Georgia','Germany','Ghana','Greece','Grenada','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Kuwait','Kyrgyzstan','Lao Peoples Democratic Republic Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Mauritania','Mauritius','Mexico','Micronesia Federated States','Monaco','Mongolia','Montenegro','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Zealand','Nicaragua','Niger','Nigeria','Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Qatar','Republic of Korea South Korea','Republic of Moldova','Romania','Russian Federation','Rwanda','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Tajikistan','Thailand','Timor-Leste','Togo','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom of Great Britain and Northern Ireland','United Republic of Tanzania','United States of America','Uruguay','Uzbekistan','Vanuatu','Venezuela','Vietnam','Yemen','Zambia','Zimbabwe','Others');
		return $country;
	}
	
	public function extentionName($filename){
		    $extension = mb_strtolower(substr($filename, strpos($filename, '.') + 1));
			return '.'.$extension;
	}

	public function picVlidator($picname,$picsize){
		$maxsiz = 2097152;
		if($picsize>2097152){
			  return 'Picture size to big use image lessthan 2MB';
			}else{
			   $picextension = mb_strtolower(substr($picname, strpos($picname, '.') + 1));
			if($picextension =='jpg' || $picextension =='jpeg' || $picextension =='gif' || $picextension =='png'){

				}else{
				$errMsg =  'please use images-eg..jpg,.jpeg,.gif,.png.';
				return $errMsg;
				}
			}
	}
	
	public function picVlidator2($picname,$picsize){
		$maxsiz = 2097152;
		if($picsize>2097152){
			  return 'Picture size to big use image lessthan 2MB';
			}else{
			   $picextension = mb_strtolower(substr($picname, strpos($picname, '.') + 1));
			if($picextension =='jpg' || $picextension =='jpeg' || $picextension =='pdf' || $picextension =='png'){

				}else{
				$errMsg =  'please use images-eg..jpg,.jpeg,.pdf,.png.';
				return $errMsg;
				}
			}
	}


	public function uploadImage($imageTempname,$imageNewLocation){
		if(move_uploaded_file($imageTempname,$imageNewLocation)){
			}else{
				return 'Error occured. Image failed to upload to folder.';
			}
	}
	
	public function startDate(){
		$this->timeZone();
		return date('d/M/Y', strtotime(' +0 day'));
	}
	
	public function expireDate($duration){
		$this->timeZone();
		$dated=date('Y/m/d');
		return $dates=date('d/M/Y', strtotime($dated . " +".$duration." month"));
	}
	
}
?>