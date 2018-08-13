<h1><?php echo $post->title;?></h1>
<small class="datetime"><?php echo $post->created_at;?></small>
<p><?php echo $post->body;?></p>
<p class="pull-right">
	<?php echo form_open('blog/delete');?>
	<input type="hidden" value="<?php echo $post->id;?>" name="id" />
	<button type="submit" class="btn btn-danger pull-right" > Delete</button>
</form>
<a class="btn btn-success pull-right btn-space" href="<?php echo site_url('blog/edit/'.$post->id);?>">Edit</a>
</p>