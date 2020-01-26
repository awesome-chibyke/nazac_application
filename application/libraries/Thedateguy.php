<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'Carbon/autoload.php';
use Carbon\Carbon;
use Carbon\CarbonInterval;

	class thedateguy
	{

	    function returnDateFromCarbon($date, $delimeter){

            $exploded_date = explode($delimeter, $date);

            return Carbon::createFromDate($exploded_date[0], $exploded_date[1], $exploded_date[2])->diffForHumans();

        }

        function returnTimeFromCarbon($date, $delimeter){

            $exploded_date = explode($delimeter, $date);

            return Carbon::createFromTime($exploded_date[0], $exploded_date[1], $exploded_date[2])->diffForHumans();

        }

        function returnDateTimeFromCarbon($date_time, $delimeter_for_date, $delimeter_for_time){

            $exploded_date_time = explode(' ', $date_time);
            $exploded_date = explode($delimeter_for_date, $exploded_date_time[0]);
            $exploded_time = explode($delimeter_for_time, $exploded_date_time[1]);

            return Carbon::create($exploded_date[0], $exploded_date[1], $exploded_date[2], $exploded_time[0], $exploded_time[1], $exploded_time[2])->diffForHumans();

        }

        function convertLocaltoUtcTime($datetime, $range){

            //$datetime = date('Y-m-d G:i:s');
            $tz_to = 'UTC';
            $range = $range/1000;
            date_default_timezone_set($tz_to);

            $dated=date('Y-m-d G:i:s');
            return $dates=date('Y-m-d G:i:s', strtotime($datetime) -$range);

        }

        //current date guys
        function getDateNow($time_zone) {
            $tz_object = new DateTimeZone($time_zone);
            //date_default_timezone_set('Brazil/East');

            $this->datetime = new DateTime();
            $this->datetime->setTimezone($tz_object);
            return $this->datetime->format('Y\-m\-d');
        }

        //current date guys
        function getCurrentDayNow($time_zone) {
            $tz_object = new DateTimeZone($time_zone);
            //date_default_timezone_set('Brazil/East');

            $this->datetime = new DateTime();
            $this->datetime->setTimezone($tz_object);
            return $this->datetime->format('l');
        }

        //current day of the week from th date that is supplied
        function getCurrentDayNowWithDateSupplied($time_zone, $date) {
            $tz_object = new DateTimeZone($time_zone);
            //date_default_timezone_set('Brazil/East');

            $datetime = new DateTime($date);
            $datetime->setTimezone($tz_object);
            return $datetime->format('l');
        }

        //current date guys
        function getTimeNow($time_zone) {
            $tz_object = new DateTimeZone($time_zone);
            //date_default_timezone_set('Brazil/East');

            $this->datetime = new DateTime();
            $this->datetime->setTimezone($tz_object);
            return $this->datetime->format('G:i:s');
        }
		
		//current date guys
		function getDatetimeNow($time_zone) {
			$tz_object = new DateTimeZone($time_zone);
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y\-m\-d\ G:i:s');
		}

        function getDateNowNaija() {
            $tz_object = new DateTimeZone('Africa/Lagos');
            //date_default_timezone_set('Brazil/East');

            $this->datetime = new DateTime();
            $this->datetime->setTimezone($tz_object);
            return $this->datetime->format('Y-m-d');
        }

        function getTimeNowNaija() {
            $tz_object = new DateTimeZone('Africa/Lagos');

            $this->datetime = new DateTime();
            $this->datetime->setTimezone($tz_object);
            return $this->datetime->format('G:i:s');
        }
		
		//current date guys
		function getDatetimeNowNaija() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y\-m\-d\ G:i:s');
		}

		function getDatetimeNowGhana() {
			$tz_object = new DateTimeZone('Africa/Accra');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y\-m\-d\ G:i:s');
		}

		function getDatetimeNowSouth() {
			$tz_object = new DateTimeZone('Africa/Johannesburg');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y\-m\-d\ G:i:s');
		}
		
		//adds whatever to the dates
		function getDatetimeAdderNow($range, $time_zone) {
			date_default_timezone_set($time_zone);

			$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}
		
		
		//adds whatever to the dates
		function getDatetimeAdderNowNaija($range) {
			date_default_timezone_set('Africa/Lagos');

			$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}

		function getDatetimeAdderNowGhana($range) {
			date_default_timezone_set('Africa/Accra');

			$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}

		function getDatetimeAdderNowSouth($range) {
			date_default_timezone_set('Africa/Johannesburg');

			$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}
		
		
		//adds whatever to your choice of dates
		function getDatetimeAdder($dated, $range, $time_zone) {
			date_default_timezone_set($time_zone);

			//$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
            //return $dates=date('Y\-m\-d', strtotime($dated . " $range"));
		}
		
		function getDatetimeAdderNaija($dated, $range) {
			date_default_timezone_set('Africa/Lagos');

			//$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d', strtotime($dated . " $range"));
		}

		function getDatetimeAdderGhana($dated, $range) {
			date_default_timezone_set('Africa/Accra');

			//$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}

		function getDatetimeAdderSouth($dated, $range) {
			date_default_timezone_set('Africa/Johannesburg');

			//$dated=date('Y\-m\-d\ G:i:s');
			return $dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " $range"));
		}
		
		//naija dateadder with day checker
		function dateAdderNaijaWithDay(){
			
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
		
		//ghana date adder with day check
		function dateAdderGhanaWithDay(){
			
			if(date('D') == 'Fri') { 
			  	date_default_timezone_set('Africa/Accra');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +72 hours"));
			} elseif(date('D') == 'Sat') {
			  	date_default_timezone_set('Africa/Accra');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +60 hours"));
			}elseif(date('D') == 'Sun'){
				date_default_timezone_set('Africa/Accra');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +48 hours"));
			}else{
				date_default_timezone_set('Africa/Accra');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));
			}
			//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

			return $dates;
		}

		//south date adder with day check
		function dateAdderSouthWithDay(){
			
			if(date('D') == 'Fri') { 
			  	date_default_timezone_set('Africa/Johannesburg');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +72 hours"));
			} elseif(date('D') == 'Sat') {
			  	date_default_timezone_set('Africa/Johannesburg');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +60 hours"));
			}elseif(date('D') == 'Sun'){
				date_default_timezone_set('Africa/Johannesburg');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +48 hours"));
			}else{
				date_default_timezone_set('Africa/Johannesburg');

				$dated=date('Y-m-d H:i');
				$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));
			}
			//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

			return $dates;
		}
		
		
		function getDateForAnyCount($country, $dated, $range){
			
			
			
			//get ghana date
			if($country == "Ghana"){
				
			$range = $range. "0 hours";
				
			$this->date_now = theDateGuy::getDatetimeNow("Africa/Accra");
			//adds to now
			$this->added_date_now = theDateGuy::getDatetimeAdderNow($range, "Africa/Accra");
			//we supply date
			$this->added_date = theDateGuy::getDatetimeAdder($dated, $range, "Africa/Accra");
				
				
				return $this;
			}

			//get naija date 
			if($country == "Nigeria"){
				
				$range = $range. "1 hours";
				
				$this->date_now = theDateGuy::getDatetimeNow("Africa/Lagos");
				//adds to now
				$this->added_date_now = theDateGuy::getDatetimeAdderNow($range, "Africa/Lagos");
				//we supply date
				$this->added_date = theDateGuy::getDatetimeAdder($dated, $range, "Africa/Lagos");
				return $this;
			}

			//get south date
			if($country == "South Africa"){
				
				$range = $range. "2 hours";
				
				$this->date_now = theDateGuy::getDatetimeNow("Africa/Johannesburg");
				//adds to now
				$this->added_date_now = theDateGuy::getDatetimeAdderNow($range, "Africa/Johannesburg");
				//we supply date
				$this->added_date = theDateGuy::getDatetimeAdder($dated, $range, "Africa/Johannesburg");
				
				return $this;
				
			}
			
		}

        function isThisDayAWeekend($date) {

            $timestamp = strtotime($date);

            $weekday= date("l", $timestamp );
            return $weekday;
            //if ($weekday =="Saturday" OR $weekday =="Sunday") { return true; }
            //else {return false; }

        }
		
		
	}

?>