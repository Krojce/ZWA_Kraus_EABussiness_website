<?php
class Users extends Controller{
	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		if (isset($_SESSION['is_logged_in_admin'])) {
			unset($_SESSION['is_logged_in_admin']);
			unset($_SESSION['user_data']);
			session_destroy();
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function administration(){
		if (isset($_SESSION['is_logged_in'])) {
			unset($_SESSION['is_logged_in']);
			session_destroy();
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->administration(), true);
	}

	protected function logout(){
		if (isset($_SESSION['is_logged_in_admin'])) {
			unset($_SESSION['is_logged_in_admin']);
			session_destroy();
		}else{
			unset($_SESSION['is_logged_in']);
			unset($_SESSION['user_data']);
			session_destroy();
		}
		// Redirect
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}