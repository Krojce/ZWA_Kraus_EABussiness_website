<?php
class Shares extends Controller{
	protected function Index(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in_admin'])){
			header('Location: '.ROOT_URL);
		}
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function edit(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->edit(), true);
	}
}