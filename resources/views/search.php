<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 best_sale">
				<h3 class="text-left"><span>Kết quả tìm kiếm cho : <?php echo $_GET['s']; ?></span></h3>
				<hr>
				<div class="row">
					<?php if(!empty($list_product)): ?>
					
						<?php
							foreach($list_product as $product):
						 ?>
						 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 item_cate">
						 <div class="box-item">
						 	<div class="box-img">
						 		<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
						 			<img src="<?php echo base_url.$product->thumbnail; ?>" alt="product" width="100%" />
						 		</a>
						 	</div>
						 	<div class="box-text">
						 		<h3 class="title text-center">
						 			<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
						 				<?php echo $product->name ?>
						 			</a>						 				
						 		</h3>
						 		<p class="price text-center" data-value="<?php echo $product->price; ?>">Giá : <span><?php echo number_format($product->price); ?> VND</span></p>
						 		<p class="text-center">
						 			<!-- <button class="btn btn-sm btn-success" data-value="<?php //echo $product->id; ?>">Mua ngay</button> -->
						 			<button class="btn btn-sm btn-danger btn-add" data-value="<?php echo $product->id; ?>">Thêm vào giỏ</button>
						 		</p>
						 	</div>
						 </div>
					</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-warning">Không có sản phẩm nào phù hợp với từ khóa. Vui lòng kiểm tra lại.</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<?php require view_cus.'sidebar.php'; ?>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>