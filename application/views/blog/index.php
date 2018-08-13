<h2><?php echo $title;?></h2>
<?php foreach($posts as $post){
?>
	<h3><?php echo $post->title;?></h3>
	<p><?php echo substr($post->body,0,200);?>...</p>
	<a class='btn btn-default' href='post/<?php echo $post->id;?>'>Read More...</a>
<?php
}
?>