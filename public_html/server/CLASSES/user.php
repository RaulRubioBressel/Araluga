<?php
	class user{
		public $user_id;
		public $user_nick;
		public $user_role;
		public $user_email;
		private $user_password;
		public $user_diamonds;
		
		function user(){
			$user_id = "";
			$user_nick = "";
                        $user_role = "";
			$user_email = "";
			$user_password = "";
			$user_diamonds = "";
		}
		
		function user_new($user_id, $user_nick, $user_role, $user_email, $user_password, $user_diamonds){
			$this -> user_id = $user_id;
			$this -> user_nick = $user_nick;
			$this -> user_role = $user_role;
			$this -> user_email = $user_email;
			$this -> user_password = $user_password;
			$this -> user_diamonds = $user_diamonds;
		}
		
		function setUser_id($user_id){
			$this -> user_id = $user_id;
		}
		
		function setUser_nick($user_nick){
			$this -> user_nick = $user_nick;
		}
		
		function setUser_role($user_role){
			$this -> user_role = $user_role;
		}
		
		function setUser_email($user_email){
			$this -> user_email = $user_email;
		}
		
		function setUser_password($user_password){
			$this -> user_password = $user_password;
		}
		
		function setUser_diamonds($user_diamonds){
			$this -> user_diamonds = $user_diamonds;
		}
		
	}
?>