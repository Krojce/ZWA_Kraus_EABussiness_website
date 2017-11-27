<?php
class BlogModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM blog_posts order by time_of_add desc');
		$rows = $this->resultSet();
		return $rows;
	}

	public function profile(){
		$query = "SELECT * FROM users where id=".$_SESSION['user_data']["id"];
		$this->query($query);
		$rows = $this->resultSet();
		return $rows;
	}

	public function edit(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['title'] == '' || $post['content'] == '' || $post['author'] == '' || $post['image_name'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Get ID from URL
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		    $parts = parse_url($url);
		    parse_str($parts['query'], $query);
	        $id = $query['id'];
			// Update the database based on the id
			$this->query('UPDATE `blog_posts`   
						  SET `title` = :title,
							  `content` = :content,
							  `author` = :author,
							  `image_name` = :image_name
						  WHERE `id` = :id');
			$this->bind(':id', $id);
			$this->bind(':title', $post['title']);
			$this->bind(':content', $post['content']);
			$this->bind(':author', $post['author']);
			$this->bind(':image_name', $post['image_name']);
			$this->execute();
			// Verify
			header('Location: '.ROOT_URL. 'blog');
		}
		return;
	}

	public function post(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if($post['submit']){
			$id = $_SESSION['user_data']['id'];
			// Get ID from URL
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		    $parts = parse_url($url);
		    parse_str($parts['query'], $query);
	        $post_id = $query['id'];
	        $query = "SELECT * FROM users where id=".$id;
	        $this->query($query);
	        $result = $this->resultSet();
			$this->query('INSERT INTO comments (post_id, comment, user_id, image_url) VALUES(:post_id, :comment, :user_id, :image_url)');
			$this->bind(':post_id', $post_id);
			$this->bind(':comment', $post['comment']);
			$this->bind(':user_id', $id);
			$this->bind(':image_url', $item['image_url']);
			$this->execute();
			// Verify
			header('Location: '.ROOT_URL.'blog/post/?id='. $post_id);
		}
		return;
	}

	public function editprofile(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
	        $id = $_SESSION['user_data']['id'];
			// Update the database based on the id
			$this->query('UPDATE `users`   
						  SET `country` = :country,
							  `email` = :email,
							  `name` = :name,
							  `fullname` = :fullname,
							  `date_of_birth` = :date_of_birth,
							  `job` = :job,
							  `education` = :education,
							  `personal_interest` = :personal_interest,
							  `biography` = :biography,
							  `image_url` = :image_url
						  WHERE `id` = :id');
			$this->bind(':id', $id);
			$this->bind(':country', $post['country']);
			$this->bind(':email', $post['email']);
			$this->bind(':name', $post['name']);
			$this->bind(':fullname', $post['fullname']);
			$this->bind(':date_of_birth', $post['date_of_birth']);
			$this->bind(':job', $post['job']);
			$this->bind(':education', $post['education']);
			$this->bind(':personal_interest', $post['personal_interest']);
			$this->bind(':biography', $post['biography']);
			$this->bind(':image_url', $post['image_url']);
			$this->execute();
			// Verify
			header('Location: '.ROOT_URL. 'blog/profile');
		}
		return;
	}

	public function add(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['title'] == '' || $post['content'] == '' || $post['author'] == '' || $post['image_name'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO blog_posts (title, content, author,  image_name) VALUES(:title, 
						:content, :author, :image_name)');
			$this->bind(':title', $post['title']);
			$this->bind(':content', $post['content']);
			$this->bind(':author', $post['author']);
			$this->bind(':image_name', $post['image_name']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'blog');
			}
		}
		return;
	}

	public function delete(){
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	    $parts = parse_url($url);
	    parse_str($parts['query'], $query);
        $comment_id = $query['comment_id'];
        $post_id = $query['id'];
		$this->query("DELETE FROM comments WHERE id=:id");
		$this->bind(':id', $comment_id);
		$this->execute();
		header('Location: '.ROOT_URL.'blog/post/?id='.$post_id);
		return;
	}
}