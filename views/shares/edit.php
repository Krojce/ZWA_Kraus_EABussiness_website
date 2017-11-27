<?php    
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    if(!empty($parts['query'])){
      parse_str($parts['query'], $query);
      if(!empty($query['id'])){
        $id =  $query['id'];
        $id = intval($id);
      }
    }
    $model = new EditModel();
    $query = "SELECT * FROM posts where id = ".$id;
    $model->query($query);
    $result = $model->resultSet();
?>
<?php Messages::display(); ?>
<div class="container" id="profile">
    <?php foreach($result as $item) : ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Edit a post</h3>
      </div>
      <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
            <div class="form-group">
                <label>Country</label><br>
                <select name="country">
                    <option value="europe" <?php if($item['country'] == "europe") echo "selected='selected'"; ?>>Europe</option>
                    <option value="asia" <?php if($item['country'] == "asia") echo "selected='selected'"; ?>>Asia</option>
                </select>
            </div>
            <div class="form-group">
                <label>Language</label><br>
                <select name="language">
                    <option value="czech" <?php if($item['language'] == "czech") echo "selected='selected'"; ?>>Czech</option>
                    <option value="russian" <?php if($item['language'] == "russian") echo "selected='selected'"; ?>>Russian</option>
                    <option value="german" <?php if($item['language'] == "german") echo "selected='selected'"; ?>>German</option>
                    <option value="english" <?php if($item['language'] == "english") echo "selected='selected'"; ?>>English</option>
                </select>
            </div>
        	<div class="form-group">
        		<label>Share Title</label>
        		<input type="text" name="title" class="form-control" value="<?php echo $item['title']; ?>" />
        	</div>
        	<div class="form-group">
        		<label>Text</label>
        		<textarea rows="5" name="content" class="form-control" required><?php echo $item['content']; ?></textarea>
        	</div>
        	<div class="form-group">
        		<label>Link</label>
        		<input type="text" name="link" class="form-control" required value="<?php echo $item['link']; ?>" />
        	</div>
            <div class="form-group">
                <label>Image name</label>
                <input type="text" name="image_name" class="form-control" required value="<?php echo $item['image_name']; ?>" />
            </div>
        	<input class="btn btn-primary" name="submit" type="submit" value="Submit" onClick="return addValidation()"/>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>">Cancel</a>
        </form>
      </div>
    </div>
    <?php endforeach; ?>
</div>