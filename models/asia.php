<?php
class AsiaModel extends Model{
	public function Index(){
		if($_COOKIE["language"] == "cs"){
			$this->query('SELECT * FROM posts where country = "asia" and language = "czech" order by title asc');
			$rows = $this->resultSet();
		}elseif($_COOKIE["language"] == "de"){
			$this->query('SELECT * FROM posts where country = "asia" and language = "german" order by title asc');
			$rows = $this->resultSet();
		}elseif($_COOKIE["language"] == "ru"){
			$this->query('SELECT * FROM posts where country = "asia" and language = "russian" order by title asc');
			$rows = $this->resultSet();
		}else{
			$this->query('SELECT * FROM posts where country = "asia" and language = "english" order by title asc');
			$rows = $this->resultSet();
		}
		return $rows;
	}
}