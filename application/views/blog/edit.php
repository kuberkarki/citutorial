<h2><?php echo $title;?></h2>
<?php if(validation_errors()){?>
<div class="form_error alert alert-danger">
  <?php echo validation_errors(); ?>
</div>
<?php } ?>
<?php echo form_open('blog/update');?>
<input type="hidden" name="id" value="<?php echo $post->id;?>"/>
  <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" id="title"  placeholder="Post Title" value="<?php echo $post->title;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <textarea name="body" class="form-control" id="textarea" placeholder="body"><?php echo $post->body;?></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>