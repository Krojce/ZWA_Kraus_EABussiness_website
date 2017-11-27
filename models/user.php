<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$email = "";
		$name = "";
		//hash the password based on latest technology with salt
		$password = $post['password'];
		$password = password_hash($password, PASSWORD_DEFAULT);

		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				//all fields are needed to be filled
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			
			$this->query("SELECT * FROM `users` WHERE `email` = '".$_POST['email']."'");
			$result = $this->resultSet();
			foreach ($result as $item) {
				$email = $item["email"];
			}
			if($email == $post['email']){
				Messages::setMsg('Email already in use.', 'error');
				return;
			}

			$this->query("SELECT * FROM `users` WHERE `name` = '".$_POST['name']."'");
			$result = $this->resultSet();
			foreach ($result as $item) {
				$name = $item["name"];
			}
			if($name == $post['name']){
				Messages::setMsg('Username already in use.', 'error');
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO users (name, email, hash, image_url) VALUES(:name, :email, :hash, :image_url)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':hash', $password);
			$this->bind(':image_url', "https://spaceacre.co.za/wp-content/uploads/avatar-1.png");
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST against SQL injections
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			$password = $post['password'];
			$email = $post['email'];
			//Get query of the hash from written email to check if the hashes match
			$this->query("SELECT * FROM `users` WHERE email = '".$email."'");
			$result = $this->resultSet();
			foreach ($result as $item) {
				$hash = $item["hash"];
				$id = $item["id"];
				$name = $item["name"];
				$email = $item["email"];
			}
			//returns true if hashes match
			if(empty($hash)){
				$password = false;
			}else{
				$password = password_verify($password, $hash);
			}
			
			//if true, session is set and session data as well
			if($password){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $id,
					"name"	=> $name,
					"email"	=> $email
				);
				//go to selected page
				header('Location: '.ROOT_URL.'blog');
			} else {
				//show message, when login data don't match
				Messages::setMsg('Permission denied, incorrect login', 'error');
			}
		}
		return;
	}

	public function administration(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$password = $post['password'];
		$this->query("SELECT * FROM `admin` WHERE id = 1");
		$result = $this->resultSet();
		foreach ($result as $item) {
			$hash = $item["hash"];
		}

		$password = password_verify($password, $hash);

		if($post['submit']){
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		    $parts = parse_url($url);
		    parse_str($parts['query'], $query);
	        $last_page = $query['last_page'];
			// Check login name
			$this->query('SELECT * FROM admin WHERE username = :username');
			$this->bind(':username', $post['username']);
			$row = $this->single();
			//if login and hash match, set session
			if($row && $password){
				$_SESSION['is_logged_in_admin'] = true;
				header('Location: '.$last_page);
			} else {
				//show message, when login data don't match
				Messages::setMsg('Permission denied, inncorrect login', 'error');
			}
		}
		return;
	}
}