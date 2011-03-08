<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author JayNa
 */
class payment_class {
    //put your code here
    public $userid;
    public $first_name;
    public $last_name;
    public $address_street;
    public $payment_date;
    public $address_city;
    public $address_zip;
    public $address_state;
    public $address_country;
    public $verify_sign;
    public $item_name;
    public $payment_gross;
    public $receipt_id;
    public $txn_id;


    // global error messages
    var $last_error_message = "";

    function __construct(){
        $this->userid = 0;
        $this->first_name = "";
        $this->last_name = "";
        $this->address_street = "";
        $this->address_city = "";
        $this->address_zip = "";
        $this->address_state = "";
        $this->address_country = "";
        $this->verify_sign = "";
        $this->item_name = "";
        $this->payment_gross = 0.00;
        $this->receipt_id = "";
        $this->txn_id = "";
        $this->payment_date = date('U');
    }
}
?>