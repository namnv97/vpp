<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div class="content_product">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<img src="<?php echo base_url.$product->thumbnail; ?>" alt="">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<h2><?php echo $product->name; ?></h2>
							<p class="price">Giá : <span>
								<?php
								if($product->sale > 0):
									?>
									<?php
									$sale = round($product->price*(100-$product->sale)/100); 
									echo number_format($sale).'VND'; 
									?>
									<i style="text-decoration: line-through;color: #000;"><?php echo number_format($product->price).'VND'; ?></i>
									<?php else: ?>
										<?php echo number_format($product->price).' VND'; ?>
									<?php endif; ?>	
							</span></p>
							<hr/>
							<div class="excerpt">
								<?php echo $product->description; ?>
							</div>
							<hr/>
							<div class="buy_pro">
								<div class="quantity">
									<button class="btn btn-down">-</button>
									<input type="text" value="1" class="form-control numcus" min="1">
									<button class="btn btn-up">+</button>
								</div>
								<!-- <button class="btn btn-md btn-success btn-add" data-value="<?php echo $product->id; ?>">Mua ngay</button> -->
								<button class="btn btn-md btn-danger btn-add" data-value="<?php echo $product->id; ?>">Thêm vào giỏ</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="content_product">
							<?php 
							if(!empty($product->content)):
							 ?>
							 <ul>
							 	<li>Mô tả</li>
							 </ul>
							 <div class="tab_content">
							 	<?php echo $product->content; ?>
							 </div>

							<?php endif; ?>
						</div>
					</div>
					<div class="relate_product">
						<?php 
							if(!empty($relate_product)):
						?>
						<div class="row">
							<h2>Sản phẩm khác</h2>
							<hr>
							<?php foreach($relate_product as $rel): ?>
								<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
									<div class="product_item">
										<div class="product_img">
											<a href="<?php echo URL_PRODUCT.$rel->slug; ?>">
												<img src="http://localhost/VPP/<?php echo $rel->thumbnail; ?>" alt="img" width="100%">
											</a>
										</div>
										<div class="product_text text-center">
											<h3><a href="<?php echo URL_PRODUCT.$rel->slug; ?>"><?php echo $rel->name; ?></a></h3>
											<p class="price">Giá : <span><?php echo number_format($rel->price); ?>VND</span></p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						 <?php endif; ?>
					</div>
				</div>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<?php require view_cus.'sidebar.php'; ?>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>