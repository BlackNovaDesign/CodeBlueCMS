<?php
include('password.class.php');
class User extends Password{
    private $db;
	
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db;
	}
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	private function get_user_hash($username){	
		try {
			$stmt = $this->_db->prepare('SELECT user_name, pwd FROM core_users WHERE user_name = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['pwd'];
			return $row['user_name'];
		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}
	
	public function login($username,$password){	
		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
	
			 
			$_SESSION['user'] = $username; 
		    $_SESSION['loggedin'] = true;
			
			
		    return true;
		}		
	}
	

		
	public function logout(){
		session_destroy();
	}
}
?>
