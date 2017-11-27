<?php
class Blog extends Controller{
	protected function Index(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function profile(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->profile(), true);
	}

	protected function edit(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->edit(), true);
	}

	protected function add(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function editprofile(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->editprofile(), true);
	}

	protected function post(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->post(), true);
	}

	protected function delete(){
		$viewmodel = new BlogModel();
		$this->returnView($viewmodel->delete(), true);
	}
}