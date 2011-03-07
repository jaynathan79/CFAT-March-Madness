<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// Setup class
require_once('paypal.class.php');  // include the class file
// require_once('class.payment.php'); // include the payment class file
require_once('class.login.php');   // login class manages all registration information
                                    // including payment info associated with an account

$p = new paypal_class;             // initiate an instance of the class
// $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // production paypal url

if ($p->validate_ipn()) {

         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.

         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.

         // For this example, we'll just email ourselves ALL the data.
         $subject = 'Instant Payment Notification - Recieved Payment';
         $to = 'jay.nathan@gmail.com';    //  your email
         $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";

         foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
         mail($to, $subject, $body,"From: jay.nathan@changefora10.org");

         $pmt = new payment_class();
         $pmt->userid = $p->ipn_data['custom'];
         $pmt->address_state = $p->ipn_data['address_state'];
         $pmt->payment_gross = $p->ipn_data['payment_gross'];
         $pmt->first_name = $p->ipn_data['first_name'];
         $pmt->last_name = $p->ipn_data['last_name'];

         $l = new logmein();
         try{
                 $l->update_registration_with_payment_info($pmt);
         } catch (Exception $e) {
                $err = "Caught exception: ".$e->getMessage();
                mail("jay.nathan@gmail.com", "Failed IPN - DB write", "there was a failure writing a donation for ID $pmt->userid", "From: jay.nathan@changefora10.org");
         }

      } else {

         // echo "invalid ipn";
          mail("jay.nathan@gmail.com", "Failed IPN", "This is to let you know that there was a failed IPN to the cfat account today. Please log in to PayPal for more details.", "From: jay.nathan@changefora10.org");
      }

     // mail('jay.nathan@changefora10.org', 'test', 'hi jay, this is a test email.');
?>
