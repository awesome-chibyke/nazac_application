<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Email_handler {

        STATIC function  activation_email($site_name, $site_location, $site_email, $full_name, $unique_id){

            return '<div align="center"><div style="background:#CCCCCC;"><div style="max-width: 600px; font-family:"Trebuchet MS";  margin-left: auto; margin-right: auto;"><div style="width: 100%; padding-top: 70px; background:#71bc37;height: 150px;"><h1 style="color:white; text-align: center;"> Welcome To '.$site_name.'</h1></div><div style="background: white; width: 100%;"><div style="width: 90%; padding:10px 5%;"><h3 style="color:black; text-align: left;">Hi '.$full_name.'</h3><p style="font-size: 14px; margin-bottom: 0px; text-align: left;">Welcome to '.$site_name.', your registration was successful and you are one step away from enjoy our awesome services. Please click the link below to activate your account and get started.</p></div><div align="left" style="width: 90%; padding:10px 5%; text-align: left;"><p style="margin-top: 10px;"> <a href="'.base_url("bet_manager/mains/account_activation/$unique_id").'" style="background:#71bc37; padding: 25px 50px; color:white; text-decoration: white;">Activate Account</a> </p></div><div style="width:90%; padding:10px 5%; text-align: left;"><p style="font-size: 14px;">We provide awesome tip that will serve as a guide to you in the world of betting.</p><p style="color:black;">'.$site_name.' Support</p> </div> </div> <div style="width: 100%; text-align: center; padding-bottom: 20px;"> <p style="margin: 5px 0px; margin-top: 10px; font-size: 15px; color:#666;"> Sent by '.$site_name.', '.$site_location.' </p> <p style="margin: 5px 0px; font-size: 15px; color:#666;"><a href="#" style="color:#666; text-decoration: none;">'.$site_email.'</a> | <a href="'.base_url("bet_manager/mains/unsubscribe/$unique_id").'" style="color:#666; text-decoration: none;">Unsubscribe</a></p></div></div></div></div>';

        }

        STATIC function forgotPassword($site_name, $site_location, $site_email, $full_name, $unique_id){

            return '<div align="center"><div style="background:#CCCCCC; max-width:600px;"><div style=" font-family:"Trebuchet MS";  margin-left: auto; margin-right: auto;"><div style="width: 100%; padding-top: 70px; background:#71bc37;height: 150px;"><h1 style="color:white; text-align: center;"> Reset Password Request</h1></div><div style="background: white; width: 100%;"><div style="width: 90%; padding:10px 5%;"><h3 style="color:black;">Hi '.$full_name.'</h3><p style="font-size: 14px;">A password reset request was initiated from your account with us, Click the button below to proceed. Please ignore this message if you did not initiate this request.</p></div><div style="width: 90%; padding:10px 5%; margin-top: 20px; text-align: center;"><a href="'.base_url("bet_manager/mains/password_reset/$unique_id").'" style="background:#71bc37; padding: 25px 50px; color:white; text-decoration: white;">Reset Passsword</a></div><div style="width:90%; padding:10px 5%; margin-top: 20px; text-align: left;"><p style="font-size: 14px;">We provide awesome tip that will serve as a guide to you in the world of betting.</p><p style="color:black;">'.$site_name.' Support</p> </div> </div> <div style="width: 100%; text-align: center; padding-bottom: 20px;"> <p style="margin: 5px 0px; margin-top: 10px; font-size: 15px; color:#666;"> Sent by '.$site_name.', '.$site_location.' </p> <p style="margin: 5px 0px; font-size: 15px; color:#666;"><a href="#" style="color:#666; text-decoration: none;">'.$site_email.'</a> | <a href="'.base_url('bet_manager/mains/unsubscribe').'" style="color:#666; text-decoration: none;">Unsubscribe</a></p></div></div></div></div>';

        }

        STATIC function email_for_facebook_registration($site_name, $site_location, $site_email, $full_name, $password){

            return '<div align="center"><div style="background:#CCCCCC;"><div style="max-width: 600px; font-family:"Trebuchet MS";  margin-left: auto; margin-right: auto;"><div style="width: 100%; padding-top: 70px; background:#71bc37;height: 150px;"><h1 style="color:white; text-align: center;"> Welcome To '.$site_name.'</h1></div><div style="background: white; width: 100%;"><div style="width: 90%; padding:10px 5%;"><h3 style="color:black; text-align: left;">Hi '.$full_name.'</h3><p style="font-size: 14px; margin-bottom: 0px; text-align: left;">Welcome to '.$site_name.', your registration was successful. A unique password has been generated for your account and can be seen below. You can login with this password and email address for the facebook account you used for your facebook. Please endeavor to change password when logged in</p></div><div align="left" style="width: 90%; padding:10px 5%; text-align: left;"><p style="margin-top: 0px;"><strong>Password: </strong><span>'.$password.'</span></p></div><div style="width:90%; padding:10px 5%; text-align: left;"><p style="font-size: 14px;">We provide awesome tip that will serve as a guide to you in the world of betting.</p><p style="color:black;">Bet Monger Support</p> </div> </div> <div style="width: 100%; text-align: center; padding-bottom: 20px;"> <p style="margin: 5px 0px; margin-top: 10px; font-size: 15px; color:#666;"> Sent by '.$site_name.', '.$site_location.' </p> <p style="margin: 5px 0px; font-size: 15px; color:#666;"><a href="#" style="color:#666; text-decoration: none;">'.$site_email.'</a> | <a href="'.base_url('bet_manager/mains/unsubscribe').'" style="color:#666; text-decoration: none;">Unsubscribe</a></p></div></div></div></div>';

        }

        STATIC function sendContactMessage($subject, $message, $full_name, $site_name, $site_location, $site_email, $user_email){

            return '<div align="center"> <div style="background:#CCCCCC;"><div style="max-width: 600px; font-family:"Trebuchet MS";  margin-left: auto; margin-right: auto;"><div style="width: 100%; padding-top: 70px; background:#71bc37;height: 150px;"><h1 style="color:white; text-align: center;">'.$subject.'</h1></div><div style="background: white; width: 100%;"><div style="width: 90%; padding:10px 5%;"><h3 style="color:black;">Message from '.$full_name.'</h3><p style="font-size: 14px;">'.$message.'</p><p><strong>Email: </strong><span>'.$user_email.'</span></p></div> </div> <div style="width: 100%; text-align: center; padding-bottom: 20px;"> <p style="margin: 5px 0px; margin-top: 10px; font-size: 15px; color:#666;"> Sent by '.$site_name.', '.$site_location.' </p> <p style="margin: 5px 0px; font-size: 15px; color:#666;"><a href="#" style="color:#666; text-decoration: none;">'.$site_email.'</a> | <a href="'.base_url('bet_manager/mains/unsubscribe').'" style="color:#666; text-decoration: none;">Unsubscribe</a></p></div></div></div></div>';

        }

        STATIC function messageForPaymentActivation($siteName, $full_name, $property_no, $site_email, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>Property Status Notification</h3><p>Hi '.$full_name.'</p><p>Please note that the payment button has been made available for the property with Number '.$property_no.' which you booked recently on '.$siteName.'. You can now proceed and make payment for this property. </p> <p>Please Click the link below to continue with this process <a href="'.base_url('agents/mains/property_rent/'.$property_no.'/'.$checker).'"> Make Payment</a> </p><p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForPaymentDeactivation($siteName, $full_name, $property_no, $site_email, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>Property Status Notification</h3><p>Hi '.$full_name.'</p><p>Property with '.$property_no.' which you booked on '.$siteName.' recently is not available for rent . You can follow the link below to checkout more properties available for rent on our platform. </p> <p><a href="'.base_url('users/user/property-listing/for-rent/1/'.'/'.$checker).'"> View Properties</a></p> <p>Please Click the link below to continue with this process </p><p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForCreationOfRoomyRequest($siteName, $full_name, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>Your request for Room mate has been recieved, and is now available for view by propective roomate seekers.</p> <p>You will be notified via email once someone declares interest. Mean while you click the button below to view your request.</p> <p><a href="'.base_url('roomy/mains/single_roomy_request/'.$roomy_request_id.'/'.$checker).'"> View Properties</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForInitiationOfInterestOnARoomyRequestForTheRoomySeeker($siteName, $full_name, $full_name_of_interest_initiator, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>An interest has been indicated by '.$full_name_of_interest_initiator.' to become your room mate.</p> <p>Please follow the link below to checkout this request.</p> <p><a href="'.base_url('roomy/mains/view_interest/'.$roomy_request_id.'/'.$checker).'"> View Request</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForInitiationOfInterestOnARoomyRequestForTheInitiator($siteName, $full_name, $full_name_of_seeker, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>You have indicated interest to become room mate with '.$full_name_of_seeker.' who currently made a request for one.</p> <p>Your profile and contacts details have been made available for him/her.</p> <p>He/She is meant to confirm the process after both parties have reached an understanding.</p> <p>Follow the link below to view the Request.</p> <p><a href="'.base_url('roomy/mains/single_roomy_request/'.$roomy_request_id.'/'.$checker).'"> View Request Details</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function declineOfRoomMateRequestForInerestInitiator($siteName, $full_name, $full_name_of_seeker, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>Your Request to be room mate with '.$full_name_of_seeker.' has been declined.</p> <p><a href="'.base_url('roomy/mains/single_roomy_request/'.$roomy_request_id.'/'.$checker).'"> View Request Details</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function declineOfRoomMateRequestForRoomMateSeeker($siteName, $full_name, $full_name_of_ineterest_initiator, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>You have successfully declined the interest Initiated by '.$full_name_of_ineterest_initiator.' to your request for a room mate.</p> <p><a href="'.base_url('roomy/mains/view_interest/'.$roomy_request_id.'/'.$checker).'"> View Request Details</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForAcceptanceOfRoomyRequestForSeeker($siteName, $full_name, $full_name_of_interest_initiator, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>You have confirmed '.$full_name_of_interest_initiator.' as your new room mate.</p> <p>You can view this details of this by visiting our '.$siteName.' website and then check your profile.</p> <p><a href="'.base_url('roomy/mains/view_interest/'.$roomy_request_id.'/'.$checker).'">'.$siteName.'</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

        STATIC function messageForAcceptanceOfRoomyRequestForInterestInitiator($siteName, $full_name, $full_name_of_interest_initiator, $roomy_request_id, $site_email, $subject, $checker){

            return '<!doctype html><html><head><meta name="viewport" content="width=device-width" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>'.$siteName.'</title></head><body style="background: #B4B9AD;"><div style="background: #FFFFFF; width: 86%; margin-left: 5%; margin-right: 5%; border-radius: 10px;  padding: 15px;"><h3>'.$subject.'</h3><p>Hi '.$full_name.'</p><p>Your Interest to be room mates with '.$full_name_of_interest_initiator.' has been confirmed.</p> <p>You can view this details of this by visiting our '.$siteName.' website and then check your profile.</p> <p><a href="'.base_url('roomy/mains/single_roomy_request/'.$roomy_request_id.'/'.$checker).'">'.$siteName.'</a></p> <p>Having issues? Please contact us:</p><p>Email: '.$site_email.'</p></div></body></html>';

        }

    }

?>