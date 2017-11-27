<?php
class Asia extends Controller{
	protected function Index(){
		$viewmodel = new AsiaModel();
		$this->returnView($viewmodel->Index(), true);
	}
}