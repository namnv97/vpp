<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<h2 class="title">Tin tức</h2>
				<hr>
				<div class="row categorypost">
					<?php foreach($list_post as $post): ?>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="box-item">
							<div class="box-img">
								<a href="<?php echo URL_POST.$post->slug; ?>">
									<img src="<?php echo base_url.$post->thubnails; ?>" alt="<?php echo $post->title; ?>"></a>
							</div>
							<div class="box-text">
								<h4>
									<a href="<?php echo URL_POST.$post->slug; ?>"><?php echo $post->title; ?></a>
								</h4>
								<div class="excerpt">
									<?php echo trim_word_cus($post->description,30,'...'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="pagation text-center">
					<?php 
						if($page < 5):
							for($i = 1; $i <= $page; $i ++):
					?>
						<a href="#" class="page <?php echo ($i == 1)?'current':FALSE; ?>"><?php echo $i; ?></a>
					<?php endfor; ?>

					<?php else: ?>
						<a href="#" class="page prev">Trang trước</a>
						<?php for($i = 1; $i <= $page; $i ++): ?>
						<a class="page <?php echo ($i == 1)?'current':FALSE; ?>"><?php echo $i; ?></a>
						<?php endfor; ?>
						<a href="#" class="page next">Trang sau</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="high_pro">
					<h3><span>Sản phẩm bán chạy</span></h3>
					<hr>
					<ul>
						<?php foreach($product as $pro): ?>
						<li>
							<a href="<?php echo URL_PRODUCT.$pro->slug; ?>"><img src="<?php echo base_url.$pro->thumbnail; ?>" alt=""></a>
							<div class="pro_text">
								<h4><a href="<?php echo URL_PRODUCT.$pro->slug; ?>"><?php echo $pro->name; ?></a></h4>
								<p class="price">Giá: <?php echo number_format($pro->price).' VND'; ?></p>
							</div>

						</li>
						<p style="width: 50%;margin: 10px auto;border-bottom: thin #eee solid;"></p>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>