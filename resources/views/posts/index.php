<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<h3><?php echo $post->title; ?></h3>
				<p><i class="fa fa-calendar"></i> 
					<?php 
					$time = date_create($post->created_at);
					echo date_format($time,"d-m-Y");
					?> 
					<i class="fa fa-eye"></i> <?php echo $post->view; ?>
				</p>
				<div class="content">
					<?php echo $post->content; ?>
				</div>
				<div class="like_share">
					<div class="fb-like" data-href="<?php echo URL_POST.$post->slug; ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
				</div>
				<div class="relate_post">
					<h3 class="text-center">Bài viết khác</h3>
					<hr>
					<ul class="clearfix">
						<?php 
							$relate_post = get_relate_post($post->ID);
							foreach($relate_post as $relate):
						 ?>
						<li>
							<a href="<?php echo URL_POST.$relate->slug; ?>"><img src="<?php echo base_url.$relate->thubnails; ?>" alt="news" style="height: 150px;"></a>
							<h4 class="title"><a href="<?php echo URL_POST.$relate->slug; ?>"><?php echo $relate->title; ?></a></h4>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<?php require view_cus.'sidebar.php'; ?>
			</div>
		</div>
	</div>
</main>


<?php require view_cus.'footer.php'; ?>