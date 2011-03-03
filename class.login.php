<?php
//start session
session_start();


class logmein {

	//database setup
       //MAKE SURE TO FILL IN DATABASE INFO
	var $hostname_logon = 'localhost';		//Database server LOCATION
	var $database_logon = 'ncaa';		//Database NAME
	var $username_logon = 'root';		//Database USERNAME
	var $password_logon = 'admin';		//Database PASSWORD

	//table fields
	var $user_table = 'users';		//Users table name
	var $user_column = 'useremail';		//USERNAME column (value MUST be valid email)
	var $pass_column = 'password';		//PASSWORD column
	var $user_level = 'userlevel';		//(optional) userlevel column

	//encryption
	var $encrypt = false;		//set to true to use md5 encryption for the password

	//connect to database
	function dbconnect(){
		$connections = mysql_connect($this->hostname_logon, $this->username_logon, $this->password_logon) or die ('Unabale to connect to the database');
		mysql_select_db($this->database_logon) or die ('Unable to select database!');
		return;
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
                                echo "break 2";
				return -1;
			}
		}else{
                        echo "break 3";
			return -1;
		}

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
            echo $query."<br/><br/>";
            
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
	function passwordreset($username, $user_table, $pass_column, $user_column){
		//conect to DB
		$this->dbconnect();
		//generate new password
		$newpassword = $this->createPassword();

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
		//check if encryption is used
		if($this->encrypt == true){
			$newpassword = md5($newpassword);
		}

		//update database with new password
		$qry = "UPDATE ".$this->user_table." SET ".$this->pass_column."='".$newpassword."' WHERE ".$this->user_column."='".stripslashes($username)."'";
		$result = mysql_query($qry) or die(mysql_error());

		$to = stripslashes($username);
		//some injection protection
		$illigals=array("n", "r","%0A","%0D","%0a","%0d","bcc:","Content-Type","BCC:","Bcc:","Cc:","CC:","TO:","To:","cc:","to:");
		$to = str_replace($illigals, "", $to);
		$getemail = explode("@",$to);

		//send only if there is one email
		if(sizeof($getemail) > 2){
			return false;
		}else{
			//send email
			$from = $_SERVER['SERVER_NAME'];
			$subject = "Password Reset: ".$_SERVER['SERVER_NAME'];
			$msg = "<p>Your new password is: ".$newpassword."</p>";

			//now we need to set mail headers
			$headers = "MIME-Version: 1.0 rn" ;
			$headers .= "Content-Type: text/html; rn" ;
			$headers .= "From: $from  rn" ;

			//now we are ready to send mail
			$sent = mail($to, $subject, $msg, $headers);
			if($sent){
				return true;
			}else{
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
        /*
	//function to install logon table
	function cratetable($tablename){
		//conect to DB
		$this->dbconnect();
		$qry = "CREATE TABLE IF NOT EXISTS ".$tablename." (
			  userid int(11) NOT NULL auto_increment,
			  useremail varchar(50) NOT NULL default '',
			  password varchar(50) NOT NULL default '',
			  userlevel int(11) NOT NULL default '0',
			  PRIMARY KEY  (userid)
			)";
		$result = mysql_query($qry) or die(mysql_error());
		return;
	}
         */

        function register($username, $password, $displayname){
            //conect to DB
            $this->dbconnect();

            //check if encryption is used
            if($this->encrypt == true){
                $password = md5($password);
            }

            try{
                //execute registration via qry function that prevents MySQL injections
                // TODO: check that username is a valid email address
                // TODO: check that email address isn't already registered
                // TODO: check that displayname isn't duplicated and concatenate an incremental number if so
                $result = $this->qry("INSERT INTO ".$this->user_table." (useremail, password, displayname) VALUES('?','?','?')", $username, $password, $displayname);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                return false;
            }

            echo "<br/>".$username."<br/>";


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

         function isemailtaken($email){
            // connect to DB
            $this->dbconnect();

            $result = $this->qry("SELECT useremail FROM ".$this->user_table." WHERE ".$this->user_column." = '?';", $email);
            if(mysql_num_rows($result) > 0){
                return true;
            }else{
                return false;
            }
        }
}
?>