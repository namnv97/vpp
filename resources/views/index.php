<?php require view_cus.'header.php'; ?>

<main>
	<div class="banners">
		<?php if(!empty($slider)): ?>
		<div class="banner-home owl-carousel">
			<?php 
				
					$slider = json_decode($slider,true);
					foreach($slider as $slide):
			 ?>
					<div class="item">
						<img src="<?php echo base_url.$slide; ?>">
					</div>
				<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="container">
			<div class="why_choose">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="item">
							<img src="<?php echo base_url; ?>img/free_shipping.png" alt="">
							<div class="text">
								<h4>Miễn phí giao hàng</h4>
								<p>Miễn phí cho đơn hàng từ 500,000 VND trở lên</p>
								<p>Miễn phí giao hàng trong phạm vi 5km</p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="item">
							<img src="<?php echo base_url; ?>img/dolla.jpg" alt="">
							<div class="text">
								<h4>Giá cả hợp lý</h4>
								<p>Bán giá rẻ nhất cho khách hangf</p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="item">
							<img src="<?php echo base_url; ?>img/care.png" alt="">
							<div class="text">
								<h4>Chăm sóc khách hàng</h4>
								<p>Luôn lắng nghe để mang đến những sản phẩm cũng như chất lượng tốt nhất cho khách hàng</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="best_sale">
			<h2 class="title"><span>Sản phẩm bán chạy</span></h2>
			<div class="row">
				<?php foreach($best_seller as $bse): ?>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="box-item">
							<div class="box-img">
								<a href="<?php echo URL_PRODUCT.$bse->slug; ?>">
									<img src="<?php echo base_url.$bse->thumbnail; ?>" alt="product" width="100%" />
									<?php if($bse->sale > 0): ?>
										<span class="sale_img">-<?php echo $bse->sale; ?>%</span>
									<?php endif; ?>
								</a>
							</div>
							<div class="box-text">
								<h3 class="title text-center">
									<a href="<?php echo URL_PRODUCT.$bse->slug; ?>"><?php echo $bse->name; ?></a>
								</h3>
								<p class="price text-center" data-value="<?php echo ($bse->sale > 0)?$bse->sale:$bse->price; ?>">Giá : <span>
									<?php
										if($bse->sale > 0):
									?>
										<?php
										$sale = round($bse->price*(100-$bse->sale)/100); 
										echo number_format($sale).'VND'; 
										?>
										<i style="text-decoration: line-through;color: #000;"><?php echo number_format($bse->price).'VND'; ?></i>
									<?php else: ?>
										<?php echo number_format($bse->price).' VND'; ?>
									<?php endif; ?>										
									</span>
								</p>
								<p class="text-center">
									<!-- <button class="btn btn-sm btn-success">Mua ngay</button> -->
									<button class="btn btn-sm btn-danger btn-add" data-value="<?php echo $bse->id; ?>">Thêm vào giỏ</button>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		
		<?php 
		if(!empty($list_by_cat)):
			foreach($list_by_cat as $key => $list):

				if(count($list['list_post']) == 0): continue;
					else:?>
		<div class="category_list">
			<h2 class="title"><a href="<?php echo URL_CATEGORY.$list['slug_cat']; ?>" target="_blank"><?php echo $list['cat_name']; ?></a></h2>
			<div class="owl-carousel product_by_cat">
				<?php foreach($list['list_post'] as $post): ?>
				<div class="item">
					<a href="<?php echo URL_PRODUCT.$post->slug; ?>">
						<img src="<?php echo base_url.$post->thumbnail; ?>" alt="">
						<?php if($post->sale > 0): ?>
							<span class="sale_img">-<?php echo $post->sale; ?>%</span>
						<?php endif; ?>
					</a>
					<div class="hover_text">
						<h4 class="title text-center">
							<a href="<?php echo URL_PRODUCT.$post->slug; ?>"><?php echo $post->name; ?></a>
						</h4>
						<p class="price text-center">Giá : <span>
							<?php
							if($post->sale > 0):
								?>
								<?php
								$sale = round($post->price*(100-$post->sale)/100); 
								echo number_format($sale).'VND'; 
								?>
								<i style="text-decoration: line-through;color: #000;"><?php echo number_format($post->price).'VND'; ?></i>
								<?php else: ?>
									<?php echo number_format($post->price).' VND'; ?>
								<?php endif; ?>	
						</span></p>
						<p class="text-center">
							<!-- <button class="btn btn-sm btn-success">Mua ngay</button> -->
							<button class="btn btn-sm btn-danger btn-add" data-value="<?php echo $post->id; ?>">Thêm vào giỏ</button>
						</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		
		<?php
				endif;
			endforeach;
		endif;
		 ?>
	</div>
	</div>
	<div class="register_mail">
		<div class="form_register">
			<form action="">
				<div class="form_left">
					<h2>Đăng ký theo dõi</h2>
					<h4>Để không bỏ lỡ bài viết mỗi ngày</h4>
				</div>
				<div class="form_abs">
					<input type="email" name="email" class="form-control">
					<button type="submit" class="btn btn-success">Gửi</button>
				</div>
			</form>
		</div>
	</div>
	<div class="container">
		<div class="news_high">
			<h3><span>Tin tức xem nhiều</span></h3>
			<hr>
			<?php 
			if(!empty($feature_post)):
				?>
				<div class="list_news">
					<div class="row">
						<?php foreach($feature_post as $post): ?>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<a href="<?php echo URL_POST.$post->slug; ?>"><img src="<?php echo base_url.$post->thubnails; ?>" alt="news" style="height: 200px;"></a>
								<div class="box-text">
									<h4 class="title"><a href="<?php echo URL_POST.$post->slug; ?>"><?php echo $post->title; ?></a></h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php view_cus.require 'footer.php'; ?>