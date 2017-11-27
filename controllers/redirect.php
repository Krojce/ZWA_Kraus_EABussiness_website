<?php
class Redirect extends Controller{
	protected function Index(){
		$viewmodel = new RedirectModel();
		$this->returnView($viewmodel->Index(), true);
	}
}