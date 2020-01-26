<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class processes 
	{
		private static $_instance = null;
		private $connect;
		
		
		
	function hasHer($password, $salt){
			return hash($salt, md5($password));
	}
		
		//return file extension
	function fileExtension($path){

		return pathinfo($path, PATHINFO_EXTENSION);

	}
		
	
	function getDatetimeNow($time_zone) {
			$tz_object = new DateTimeZone($time_zone);
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y\-m\-d\ G:i:s');
		}
	
		private static function generateQuestionMark($arr){//generates question mark for insert
				$count = count($arr);
				$x = 0;
				$s = "";
				foreach($arr as $value){
						if($x === ($count - 1)){
							$s = $s."?";
						}else{
								$s = $s."?,";
						}
						$x++;
				}	
				return $s;
		}
		
	
		function sumArraysByKeys($main_counter){ //sums arrays by similar keys 
			
			$this->sumArray = array();

			foreach ($main_counter as $k => $subArray) {
			  foreach ($subArray as $id => $value) {
				@$this->sumArray[$id]+=$value;
			  }
			}
			
			return $this->sumArray;
		}
		
		function valid_email ( $str ){
			return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
		}

		function alpha_numeric ( $str ){
			return ( ! preg_match ( "/^([-a-z0-9])+$/i", $str ) ) ? FALSE : TRUE;
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

		public function picker(){
			
				$randpicker = rand(1,143);
				$pickerbox = array('RCA13','RCB12','RCC23','RCD43','RCE34','RCF56','RCG23','RCH34','RCI17','RCJ23','RCK34','RCL54','RCM56','RCN23','RCO34','RCP56','RCQ34','RCR32','RCS32','RCT34','RCU12','RCV43','RCW12','RCX34','RCY23','RCZ65','RTA76','RTB34','RTH45','RTC54','RTD65','RTE78','RTF67','RTG54','RTH34','RTI34','RTJ67','RTK12','RTL54','RTM76','RTN34','RTO87','RTP67','RTQ65','RTR34','RTS65','RTT67','RTU98','RTV78','RTW34','RTX64','RTY54','RTZ32','RPA43','RPB45','RPC34','RPD32','RPD56','RPE89','RPF87','RPG76','RPH23','RPI78','RPJ54','RPK45','RPL90','RPM43','RPN43','RPO56','RPP67','RPQ78','RPR43','RPS76','RPT34','RPU45','RPV67','RPW78','RPX56','RPY67','RPZ34','RRR09','REA90','REB56','REC54','RED67','REE78','REF54','REG','REH56','REI56','REJ34','REK87','REL56','REM54','REN45','REO43','REP78','REQ67','RER43','RES45','RET34','REU34','REV65','REW56','REX56','REY78','REZ43','RDA65','RDB67','RDC34','RDD23','RDE87',"RAA87","RBH54","RHJ65","RKK45","RWH43","RBB45","RFC67","RGC54","RHC90","RJC43","RKC67","TLC34","TZC54","TXC34","TCC34","TVC67","TBC54","TNC54","TDO56","TDT67","TTT45","TAG54","TAH34","TAS54","TAR45","TAC78","TAT67","TAZ34","TSY54","TSB54","TZX78","TQO65","TAP45");
				$shuff = $pickerbox[$randpicker];
			
				$unique_id = uniqid();
				$unique_id_len = strlen($unique_id);
				$main = $shuff.substr($unique_id, $unique_id_len/2);
				return $main; 
			
			}

		
		function dbpass(){

			$user='root'; 
			 $pass=''; 
			 $database='new_school'; 
			 $server='localhost';
			$con=@mysqli_connect($server,$user,$pass,$database);
			return $con;
			
		}
		//lets generate alphanumeric key, we will use in session validation
		function random_string($length) {
			$this->key = '';
			$this->keys = array_merge(range(0, 3));

			for ($i = 0; $i < $length; $i++) {
				$this->key .= $this->keys[array_rand($this->keys)];
			}

			return $this->key;
		}
		
			function random_string2 ( $type = 'alnum', $len = 8 )
			{					
				switch ( $type )
				{
					case 'alnum'	:
					case 'numeric'	:
                    case 'alpha'	:
					case 'nozero'	:

							switch ($type)
							{
								case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
									break;
                                case 'alpha'	:	$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    break;
								case 'numeric'	:	$pool = '0123456789';
									break;
								case 'nozero'	:	$pool = '123456789';
									break;
							}

							$str = '';
							for ( $i=0; $i < $len; $i++ )
							{
								$str .= substr ( $pool, mt_rand ( 0, strlen ( $pool ) -1 ), 1 );
							}
							return $str;
					break;
					case 'unique' : return md5 ( uniqid ( mt_rand () ) );
					break;
				}
			}
		
		public function p_amtCheck(){
			if ($this->_count == 0){
				$this->p_id_s = 0;
			}else{
				$this->p_id_s = $this->p_id;
			}		
		}

		
		function generatePamt(){//generates the p_amt no
		
				$selectP_amt = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				
				$this->p_id_s++;
				
				$Amt_Pre = "P_";
				$randAmt = rand(0, 19);
				$pickAmt = $selectP_amt[$randAmt];
				
				$paddAmt = sprintf("%02d", $this->p_id_s);
				
				$this->P_amt = $Amt_Pre.$paddAmt.$pickAmt;		
		}
		
		function getP_amt(){
			echo $this->P_amt;
		}
		
		function generateRandomNo($prefix ){
					$surfix = array("AVS","CDD","GMV","PUH","GHY","HUW","REV", "SDV", "WFT", "PUT", "DIS", "FGO", "HUP", "POU", "MXT", "BSP", "HJG", "JUC", "NVO", "LLM");
					$random =rand(0, 19);
					$surfix = $surfix[$random];
					$surfix = str_shuffle($surfix);
					
					$No = rand(10, 99);
					$mid_No = sprintf("%04d", $No);
					
					
					$random_no = $prefix.$mid_No.$surfix;
					
					return $random_no;
		}
		
		function getLiteralDateNow(){//get datez
			$tz_object = new DateTimeZone('Africa/Lagos');

			$datetime = new DateTime();
			$datetime->setTimezone($tz_object);
			return $datetime->format('F j Y g:i A');
		}
		
		//adds now date to the any date passed
		function getLiteralDateAdder(){//get datez
			date_default_timezone_set('Africa/Lagos');

			$dated=date('F j Y g:i A');
			return $dates=date('F j Y g:i A', strtotime($dated . " +24 hours"));

		}
		
		function getDatetimeAdderNow() {
			date_default_timezone_set('Africa/Lagos');

			$dated=date('Y\-m\-d\ G:i');
			return $dates=date('Y\-m\-d\ G:i', strtotime($dated . " +6 hours"));
		}
		
	
		
		function getTimeNow() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			//return $datetime->format('Y\-m\-d\ G:i:s');
			return $this->datetime->format('G:i:s');
		}
		
		function getDateNow() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y-m-d');
			//return $this->datetime->format('G:i:s');
		}
		
		function dateAdder(){
			/*date_default_timezone_set('Africa/Lagos');

			$dated=date('Y-m-d H:i');
			$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));*/
			
			if(date('D') == 'Fri') { 
			  	date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +72 hours"));
			} elseif(date('D') == 'Sat') {
			  	date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +60 hours"));
			}elseif(date('D') == 'Sun'){
				date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +48 hours"));
			}else{
				date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));
			}
			//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

			return $dates;
		}
		
		
		function dateAdderNINE(){
			/*date_default_timezone_set('Africa/Lagos');

			$dated=date('Y-m-d H:i');
			$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));*/
			
			if(date('D') == 'Fri') { 
			  	date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +96 hours"));
			} elseif(date('D') == 'Sat') {
			  	date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +72 hours"));
			}elseif(date('D') == 'Sun'){
				date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +36 hours"));
			}else{
				date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +48 hours"));
			}
			//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

			return $dates;
		}
		
		function timeOnlyAdder(){
				date_default_timezone_set('Africa/Lagos');

				$dated=date('Y-m-d H:i');
				$dates=date('G:i:s', strtotime($dated . " +5 minutes"));
				//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

				return $dates;
		}
		
		function generateInvoiceNumber(){//generates the invoice no
				$inv = "INV_";
				$select = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				$rand = rand(0, 19);
				$pick = $select[$rand];
				
				$this->invoice_id_s++;
	 
				
				
				$a_paded = sprintf("%04d", $this->invoice_id_s);
				
				$this->main_inv = $inv.$a_paded.$pick;
				
				
				
				$selectOrder = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				
				$orderPre = "ORD";
				$randOrder = rand(0, 19);
				$pickOrder = $selectOrder[$randOrder];
				
				$paddOrder = sprintf("%03d", $this->invoice_id_s);
				
				$this->OrderNo = $orderPre.$paddOrder.$pickOrder;
						
				
		}
	
		function noFormatter($no){
			
			$this->_no = number_format($no, 2, '.', ',');
			return $this->_no;
		}
		
		function sendMail($to, $subject, $message, $headers){
				
				
				//ini_set("SMTP", "aspmx.l.google.com");
    			//ini_set("sendmail_from", "assammico66@gmail.com");
				
				if(mail($to,$subject,$message,$headers)){
					$this->sucMsg = "Your mail has been sent successfully";
				}
				
				//echo "Check your email now....<BR/>";
				/*$to = "somebody@example.com";  $subject = "My subject";  $txt = "Hello world!";  $headers = "From: webmaster@example.com" . "\r\n" ."CC: somebodyelse@example.com"; */
		}
		
		function headers($from_email){
			$headers = "From: $from_email ". "\r\n";
			$headers .= "Reply-To: No- Reply". "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		}
		
		function checkIfSessionIsSet($page, $main_session, $expire, $pic){
			
			
			if(isset($main_session)){// for session time
	
				$now = time(); // Checking the time now when home page starts.

				if ($now > $expire) {
					session_destroy();
					$error = "Your session has expired, please login again";
					/*$pic = "<img src='../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";*/
					//$pic = base64_encode($pic);
					header("location:".$page.$error);
				}

			}else{
				$error = "please login first";
				/*$pic = "<img src='../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";*/
				header("location:".$page.$error);
			}
			
		}
		
		//select distinct country,year from table1 where year=(select year from table  
//where country='turkey') and country !=turkey;


	}//class ends
?>