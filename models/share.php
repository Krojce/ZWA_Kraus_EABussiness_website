<?php
class ShareModel extends Model{
	public function edit(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['title'] == '' || $post['content'] == '' || $post['link'] == '' || $post['image_name'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Get ID from URL
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		    $parts = parse_url($url);
		    parse_str($parts['query'], $query);
	        $id = $query['id'];
			// Update the database based on the id
			$this->query('UPDATE `posts`   
						  SET `country` = :country,
							  `language` = :language,
							  `title` = :title,
							  `content` = :content,
							  `link` = :link,
							  `image_name` = :image_name
						  WHERE `id` = :id');
			$this->bind(':id', $id);
			$this->bind(':country', $post['country']);
			$this->bind(':language', $post['language']);
			$this->bind(':title', $post['title']);
			$this->bind(':content', $post['content']);
			$this->bind(':link', $post['link']);
			$this->bind(':image_name', $post['image_name']);
			$this->execute();
			// Verify
			header('Location: '.ROOT_URL);
		}
		return;
	}	

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['title'] == '' || $post['content'] == '' || $post['link'] == '' || $post['image_name'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO posts (country, language, title, content, link,  image_name) VALUES(:country, :language, :title, 
						:content, :link, :image_name)');
			$this->bind(':country', $post['country']);
			$this->bind(':language', $post['language']);
			$this->bind(':title', $post['title']);
			$this->bind(':content', $post['content']);
			$this->bind(':link', $post['link']);
			$this->bind(':image_name', $post['image_name']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'shares/add');
			}
		}
		return;
	}
}