<div class="news_high">
	<h3><span>Tin tức nổi bật</span></h3>
	<hr>
	<?php 
	if(!empty($feature_post)):
		?>
		<ul class="list_news">
			<?php foreach($feature_post as $post): ?>
				<li>
					<a href="<?php echo URL_POST.$post->slug; ?>"><img src="<?php echo base_url.$post->thubnails; ?>" alt="news"></a>
					<div class="box-text">
						<h4 class="title"><a href="<?php echo URL_POST.$post->slug; ?>"><?php echo $post->title; ?></a></h4>
						<p><span><i class="fa fa-calendar"></i> 
							<?php 
							$time = date_create($post->created_at);
							echo date_format($time,"d-m-Y");
							?>
						</span> <span><i class="fa fa-eye"></i> <?php echo $post->view; ?></span></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>