<?php
	session_start();
	// database connection class
	class DatabaseConfig{

		// member variables
		public $con;

		// member functions
		public function __construct(){
			//create connection
			$this->con = new mysqli("localhost", "root", "rootroot", "contactsappdb");
			// check connection
			if($this->con->connect_error){
				die("Connection Failed: " . $this->con->connect_error);
			}
		}

	}

	// class to login, logout and sign up

	class Authentication{
		// member variables
		public $username = "";
		public $names = "";
		public $password = "";
		

		public function __construct(){

			// create instance/object of DatabaseConfig
			$this->dbobj = new DatabaseConfig();
		}

		// member functions
		public function signUp($myusername, $mynames, $mypassword){
			$this->username = $myusername;

			$mypassword = md5($mypassword);

			// create instance/object of DatabaseConfig
			$dbobj = new DatabaseConfig();

			// insert into users table

			$sql = "INSERT INTO users(username, names, password) VALUES('$myusername', '$mynames', '$mypassword')";

			if($dbobj->con->query($sql)===TRUE){
				echo "You've successfuly register! <a href='login.php'> Click here to login</a>";
			}else{
				echo "Error: ". $dbobj->con->error;
			}


		}

		// login method
		public function login($username, $password){
			$thepassword = md5($password);
			// check if username and pasword match

			$sql = "SELECT * FROM users WHERE username='$username' AND password='$thepassword' LIMIT 1 ";
			$result = $this->dbobj->con->query($sql);

			if($result->num_rows > 0){

				$row = $result->fetch_array();

				// create session variables
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['names'] = $row['names'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['africpoet'] = "thepoet";

				// redirect to app backend home/dashboard
				header("Location: http://localhost/contactsapp/home.php");



			}else{
				echo "<span class='error'> Invalid Username or Password </span>";
			}


		}

	}


	// Phonebook class, to add/delete/view/search contacts

	class PhoneBook{

		// member variables
		public $lastname ="";
		public $firstname = "";
		public $nickname = "";
		public $emailaddress = "";
		public $phonenumber = "";
		public $contactaddress = "";
		public $meetat = "";
		public $userid = "";

		// member functions
		public function __construct(){

			
			// create instance/object of DatabaseConfig
			$this->dbobj = new DatabaseConfig();

			// session variable
			$this->userid = $_SESSION['userid'];

		}

		public function addContact($lname, $fname, $kname, $email, $phone, $caddress, $meetat){
			$this->lastname = $lname;
			$this->firstname = $fname;
			$this->nickname = $kname;
			$this->emailaddress = $email;
			$this->phonenumber = $phone;
			$this->meetat = $meetat;
			$this->contactaddress = $caddress;

			$userid = $_SESSION['userid'];
			// add contact to database
			$sql = "INSERT INTO contacts(userid, lastname, firstname, nickname, phonenumber, emailaddress, contactaddress, meetat) VALUES('$userid', '$this->lastname', '$this->firstname', '$this->nickname', '$this->phonenumber', '$this->emailaddress', '$this->contactaddress', '$this->meetat')";

			if($this->dbobj->con->query($sql)===TRUE){
				echo "<span class='alert alert-success'>New contact was successfuly created!</span>";
			}else{
				echo "Error: ". $this->dbobj->con->error;
			}



		}


		public function viewContact(){

			$sql = "SELECT * FROM contacts WHERE userid='$this->userid'";
			$result = $this->dbobj->con->query($sql);
			$row = $result->fetch_all(MYSQLI_BOTH);

			return $row;
		}

		public function getContactDetails($id){
			// query to select specific contact
			$sql = "SELECT * FROM contacts WHERE contactid='$id' AND userid='$this->userid' LIMIT 1";
			$result = $this->dbobj->con->query($sql);
			$row = $result->fetch_assoc();

			return $row;

		}

		public function editContact($lname, $fname, $kname, $email, $phone, $caddress, $meetat, $contactid){

			$sql = "UPDATE contacts SET 
			lastname = '$lname',
			firstname = '$fname',
			nickname = '$kname',
			emailaddress = '$email',
			phonenumber = '$phone',
			contactaddress = '$caddress',
			meetat = '$meetat'
			WHERE contactid = '$contactid'
			AND userid = '$this->userid' ";

			if($this->dbobj->con->query($sql)===TRUE){
				header("Location: http://localhost/contactsapp/viewcontacts.php");
			}else{
				echo "Error: ". $this->dbobj->con->error;
			}

		}


		public function deleteContact($id){

			$sql = "DELETE  FROM contacts WHERE contactid='$id' AND userid='$this->userid'";

			if($this->dbobj->con->query($sql)===TRUE){
				
				header("Location: http://localhost/contactsapp/viewcontacts.php");
			}else{
				echo "Error: ". $this->dbobj->con->error;
			}

		}

	}

?>