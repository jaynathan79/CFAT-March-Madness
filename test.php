<?php
include_once('class.login.php');
include_once('class.payment.php');

$pmt = new payment();
         $pmt->userid =  20;
         $pmt->address_state = "SC";
         $pmt->payment_gross = 1.00;
         $pmt->first_name = 'Jack';
         $pmt->last_name = 'Nathan';

         $l = new logmein();
         try{
                 $l->update_registration_with_payment_info($pmt);
         } catch (Exception $e) {
                $err = "Caught exception: ".$e->getMessage();
                mail("jay.nathan@gmail.com", "Failed IPN - DB write", "there was a failure writing a donation for ID $pmt->userid", "From: jay.nathan@changefora10.org");
         }

?>
