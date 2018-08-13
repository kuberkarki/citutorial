<h2><?php echo $title;?></h2>
<?php if(validation_errors()){?>
<div class="form_error alert alert-danger">
  <?php echo validation_errors(); ?>
</div>
<?php } ?>
<?php echo form_open('blog/create');?>
  <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" id="title"  placeholder="Post Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <textarea name="body" class="form-control" id="textarea" placeholder="body"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>