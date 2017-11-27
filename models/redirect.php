<?php
class RedirectModel extends Model{
	public function Index(){
		//simple redirect to get the cookies all set and ready
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    	$parts = parse_url($url);
    	parse_str($parts['query'], $query);
    	$route =  ltrim($query['url'], '/');
    	$full_url = "Location: ".ROOT_URL.$route;
		header('Location: '.ROOT_URL.$route);
		return;
	}
}