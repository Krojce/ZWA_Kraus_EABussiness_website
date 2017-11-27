<?php
class Europe extends Controller{
	protected function Index(){
		$viewmodel = new EuropeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}