
<article class="postcontent">
	<?php
		foreach ($postbycat as $key => $value) {
		
	?>
	<div class="post">
		<div class="title">
			<h2><?php echo $value['title']; ?></h2>
			<p>Category : <?php echo $value['name']; ?></p>
		</div>
		<p><?php
			$text = $value['content'];
		 	if (strlen($text) >250) {
		 		$text = substr($text, 0,220);
		 		echo $text;
		 	}
		 ?></p>
		<div class="readmore"><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>">Read More...</a></div>
	</div>
<?php } ?>
</article>


	
