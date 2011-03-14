<?php
include("admin/database.php");
include("class.payment.php");
//start session
session_start();

class logmein {

	var $hostname_logon = "localhost";		//Database server LOCATION
    var $database_logon = "ncaa_qa";		//Database NAME
    var $username_logon = "root";		//Database USERNAME
    var $password_logon = "admin";		//Database PASSWORD
	
	//table fields
	var $user_table = 'users';		//Users table name
	var $user_column = 'useremail';		//USERNAME column (value MUST be valid email)
	var $pass_column = 'password';		//PASSWORD column
	var $user_level = 'userlevel';		//(optional) userlevel column

        public $last_error_message = "";

	//encryption
	var $encrypt = false;		//set to true to use md5 encryption for the password

        //connect to database
	function dbconnect()
	{
            if($_SERVER['SERVER_NAME'] == "www.changefora10.org"){

            }
            $connections = mysql_connect($this->hostname_logon, $this->username_logon, $this->password_logon) or die ('Unable to connect to the database: class.login.php -> dbconnect()');
            mysql_select_db($this->database_logon) or die ('Unable to select database!');
            return;
	}

    function get_last_error()
    {
        return $last_error_message;
    }

	//login function
	function login($username, $password){
		//conect to DB
		$this->dbconnect();

                //check if encryption is used
		if($this->encrypt == true){
			$password = md5($password);
		}
		//execute login via qry function that prevents MySQL injections
		$result = $this->qry("SELECT userid FROM ".$this->user_table." WHERE ".$this->user_column."='?' AND ".$this->pass_column." = '?';" , $username, $password);
		$row=mysql_fetch_assoc($result);
		if($row != "Error"){
		   if($row['userid'] > -1 ){
                        // echo "break 1 - ".$row['userid'];
                        return $row['userid'];
                    }else{
                        return -1;
                    }
		}else{
			return -1;
		}
	}
	
	//login function
	function getUserInfo($userid){
		//conect to DB
		$this->dbconnect();

        $result = $this->qry("SELECT * FROM ".$this->user_table." WHERE userid='?';" , $userid);
		$row=mysql_fetch_assoc($result);
		if($row != "Error"){
		   return $row;
		}else{
			return -1;
		}
	}

        function save_user_charity($userid, $charity){
            $this->dbconnect();

            try{
                //execute registration via qry function that prevents MySQL injections
                $result = $this->qry("UPDATE users SET supportedcharity = '?' WHERE userid = ?", $charity, $userid);
                return true;
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                return false;
            }

            return true;
        }

        //prevent injection
        function qry($query) {
            $this->dbconnect();
            $args  = func_get_args();
            $query = array_shift($args);
            $query = str_replace("?", "%s", $query);
            $args  = array_map('mysql_real_escape_string', $args);
            array_unshift($args,$query);
            $query = call_user_func_array('sprintf',$args);
            
            $result = mysql_query($query) or die(mysql_error());
            if($result){
                return $result;
            }else{
                $error = "Error";
                return $result;
            }
        }

	//logout function
	function logout(){
		session_destroy();
		return;
	}

	//check if loggedin
	function logincheck($logincode, $user_table, $pass_column, $user_column){
		//conect to DB
		$this->dbconnect();
		//make sure password column and table are set
		if($this->pass_column == ""){
			$this->pass_column = $pass_column;
		}
		if($this->user_column == ""){
			$this->user_column = $user_column;
		}
		if($this->user_table == ""){
			$this->user_table = $user_table;
		}
		//exectue query
		$result = $this->qry("SELECT * FROM ".$this->user_table." WHERE ".$this->pass_column." = '?';" , $logincode);
		$rownum = mysql_num_rows($result);
		//return true if logged in and false if not
		if($row != "Error"){
			if($rownum > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	//reset password
	function passwordreset($username){
		//conect to DB
		$this->dbconnect();
		//generate new password
		$newpassword = $this->createPassword();

		//make sure password column and table are set
                $this->pass_column = $pass_column;
                $this->user_column = $user_column;
                $this->user_table = $user_table;

                $newhashedpassword = md5($newpassword);

		//update database with new password
		$qry = "UPDATE users SET password ='".$newhashedpassword."' WHERE useremail ='".stripslashes($username)."'";
		$result = mysql_query($qry) or die(mysql_error());

		$to = stripslashes($username);
		//some injection protection
		// $illigals=array("n", "r","%0A","%0D","%0a","%0d","bcc:","Content-Type","BCC:","Bcc:","Cc:","CC:","TO:","To:","cc:","to:");
                $illigals=array("%0A","%0D","%0a","%0d","bcc:","Content-Type","BCC:","Bcc:","Cc:","CC:","TO:","To:","cc:","to:");
		$to = str_replace($illigals, "", $to);
		$getemail = explode("@",$to);

		//send only if there is one email
		if(sizeof($getemail) > 2){
			return false;
		}else{

			//send email
			$from = $_SERVER['SERVER_NAME'];
			$subject = "Password Reset: ".$_SERVER['SERVER_NAME'];
			$msg = "<p>A temporary Change for a 10 password has been generated for you: $newpassword</p>";
                        $msg = $msg."You can use this password, or ";
                        $msg = $msg."<a href='$from/resetpassword.php?l=".md5($newpassword)."'>click here</a> to reset your password.</p>";
                        
			//now we need to set mail headers
			$headers = "MIME-Version: 1.0 \r\n" ;
			$headers .= "Content-Type: text/html; \r\n" ;
			$headers .= "From: jay.nathan@changefora10.org \r\n" ;

			//now we are ready to send mail
			// $sent = mail("jay.nathan@gmail.com", $subject, $msg, "From: jay.nathan@changefora10.org");
                        $sent = mail($to, $subject, $msg, $headers);

			if($sent){
                                // echo "Your password has been reset, please check your email at $to";
                            return true;
			}else{
                            $this->last_error_message = "Your password has been reset, but there was a problem sending you an email, please <a href='resetpassword.php'>try again</a>.";
                            return false;
			}
		}
	}

	//create random password with 8 alphanumerical characters
	function createPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}

	//login form
	function loginform($formname, $formclass, $formaction){
		//conect to DB
		$this->dbconnect();
		echo'<form name="'.$formname.'" method="post" id="'.$formname.'" class="'.$formclass.'" enctype="application/x-www-form-urlencoded" action="'.$formaction.'">
				<div><label for="username">Username</label>
				<input name="username" id="username" type="text"></div>
				<div><label for="password">Password</label>
				<input name="password" id="password" type="password"></div>
				<input name="action" id="action" value="login" type="hidden">
				<div><input name="submit" id="submit" value="Login" type="submit"></div>
			</form>';
	}
        
        //login form
	function registerform($formname, $formclass, $formaction){
		//conect to DB
		$this->dbconnect();
		echo'<form name="'.$formname.'" method="post" id="'.$formname.'" class="'.$formclass.'" enctype="application/x-www-form-urlencoded" action="'.$formaction.'">
                        <div>
                            <label for="registerusername">Username</label>
                            <input name="registerusername" id="username" type="text">
                        </div>
                        <div>
                            <label for="registerpassword">Password</label>
                            <input name="registerpassword" id="password" type="password">
                        </div>
                        <div>
                            <label for="registerconfirmpassword">Confirm Password</label>
                            <input name="registerconfirmpassword" id="repeatpassword" type="password">
                        </div>
                        <input name="action" id="action" value="register" type="hidden">
                        <div>
                            <input name="submit" id="submit" value="Login" type="submit">
                        </div>
                </form>';
	}


	//reset password form
	function resetform($formname, $formclass, $formaction){
		//conect to DB
		$this->dbconnect();
		echo'<form name="'.$formname.'" method="post" id="'.$formname.'" class="'.$formclass.'" enctype="application/x-www-form-urlencoded" action="'.$formaction.'">
				<div><label for="username">Username</label>
				<input name="username" id="username" type="text"></div>
				<input name="action" id="action" value="resetlogin" type="hidden">
				<div><input name="submit" id="submit" value="Reset Password" type="submit"></div>
			</form>';
	}
        
        function register($username, $password, $confirm_password, $displayname){

            if(!$this->is_registration_valid($username, $password, $confirm_password)){
                // registration failed. the client of this class should call
                // the last_error_message method on this class.
                return false;
            }

            //conect to DB
            $this->dbconnect();

            //check if encryption is used
            if($this->encrypt == true){
                $password = md5($password);
            }

            try{
                //execute registration via qry function that prevents MySQL injections
                $result = $this->qry("INSERT INTO ".$this->user_table." (useremail, password, displayname) VALUES('?','?','?')", $username, $password, $displayname);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                return false;
            }

            // if we make it here, account was successfully created, so we grab userid
            $result = $this->qry("SELECT userid FROM ".$this->user_table." WHERE ".$this->user_column." = '?';" , $username);
            $rownum = mysql_num_rows($result);
            $row=mysql_fetch_assoc($result);
            //return userid if login was successful and -1 if not
            if($row != "Error"){
                if($rownum > 0){
                   return true;
                }else{
                   return false;
                }
            }
            
            // if we make it here registration failed
            return false;
        }

        function is_registration_valid($username, $password, $confirmpassword){

            $this->last_error_message = "";

            if($username == "" || $password == "" || $confirmpassword == "")
            {
                $this->last_error_message = "All fields are required.";
                return false;
            };

            if(!$this->is_valid_email_address($username)) {
                $this->last_error_message = "Email address is invalid. Please enter a valid email address.";
                return false;
            };

            if($this->is_email_taken(trim($username))) {
                $this->last_error_message = "This email address is already in use. Please use another one.";
                return false; // registration fails if email already in the database
            };

            if($password != $confirmpassword){
                $this->last_error_message = "Passwords must match.";
                return false;
            };

            return true;
        }

        function update_registration_with_payment_info($pmt){
            $this->dbconnect();

            $sql = "UPDATE users SET paid = 1, address_state = '?', payment_gross = '?', first_name = '?', last_name = '?' WHERE userid = '?'";

            try{
                //execute registration via qry function that prevents MySQL injections
                $result = $this->qry($sql, $pmt->address_state, $pmt->payment_gross, $pmt->first_name, $pmt->last_name, $pmt->userid);
            } catch (Exception $e) {
                $err = "Caught exception: ".$e->getMessage();
                $this->last_error_message = $err;
                echo $err;
                return false;
            }
        }

         function is_email_taken($email){
            // connect to DB
            $this->dbconnect();

            $result = $this->qry("SELECT useremail FROM ".$this->user_table." WHERE ".$this->user_column." = '?';", $email);
            if(mysql_num_rows($result) > 0){
                return true;
            } else {
                return false;
            }

            return false;
        }

        function is_valid_email_address($email) {
          // First, we check that there's one @ symbol,
          // and that the lengths are right.
          if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
            // Email invalid because wrong number of characters
            // in one section or wrong number of @ symbols.
            return false;
          }
          // Split it into sections to make life easier
          $email_array = explode("@", $email);
          $local_array = explode(".", $email_array[0]);
          for ($i = 0; $i < sizeof($local_array); $i++) {
            if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
              return false;
            }
          }
          // Check if domain is IP. If not,
          // it should be valid domain name
          if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
              if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
              }
            }
          }
          return true;
    }
}
?>
