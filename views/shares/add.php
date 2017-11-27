<?php Messages::display(); ?>
<div class="container" id="profile">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add a post</h3>
      </div>
      <div class="panel-body">
        <form id="submit-add-shares" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
            <div class="form-group">
                <label>Country</label><br>
                <select name="country">
                    <option value="europe">Europe</option>
                    <option value="asia">Asia</option>
                </select>
            </div>
            <div class="form-group">
                <label>Language</label><br>
                <select name="language">
                    <option value="czech">Czech</option>
                    <option value="russian">Russian</option>
                    <option value="german">German</option>
                    <option value="english">English</option>
                </select>
            </div>
        	<div class="form-group">
        		<label>Share Title</label>
        		<input type="text" name="title" class="form-control" required/>
        	</div>
        	<div class="form-group">
        		<label>Text</label>
        		<textarea name="content" class="form-control" required></textarea>
        	</div>
        	<div class="form-group">
        		<label>Link</label>
        		<input type="text" name="link" class="form-control" id="get_link" required
                        value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['link']);} ?>"/>
        	</div>
            <div class="form-group">
                <label>Image name</label>
                <input type="text" name="image_name" class="form-control" id="get_image_name" required
                        value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['image_name']);} ?>" />
            </div>
        	<input class="btn btn-primary" name="submit" type="submit" value="submit"/>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>">Cancel</a>
        </form>
      </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("submit-add-shares").addEventListener("submit", addValidation)
</script>