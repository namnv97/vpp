<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 best_sale">
				<h2 class="title"><span><?php echo $cate->name; ?></span></h2>
				<div class="row">
					<?php if(!empty($products)): ?>
					
						<?php
							foreach($products as $product):
						 ?>
						 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 item_cate">
						 	<div class="box-item">
						 		<div class="box-img">
						 			<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
						 				<img src="<?php echo base_url.$product->thumbnail; ?>" alt="product" width="100%" />
						 				<?php if($product->sale > 0): ?>
						 					<span class="sale_img">-<?php echo $product->sale; ?>%</span>
						 				<?php endif; ?>
						 			</a>
						 		</div>
						 		<div class="box-text">
						 			<h3 class="title text-center">
						 				<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
						 					<?php echo $product->name ?>
						 				</a>						 				
						 			</h3>
						 			<p class="price text-center" data-value="<?php echo $product->price; ?>">Giá : <span>
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
						 			<p class="text-center">
						 				<!-- <button class="btn btn-sm btn-success" data-value="<?php //echo $product->id; ?>">Mua ngay</button> -->
						 				<button class="btn btn-sm btn-danger btn-add" data-value="<?php echo $product->id; ?>">Thêm vào giỏ</button>
						 			</p>
						 		</div>
						 	</div>
						 </div>
						<?php endforeach; ?>
						<?php if(count($products) == 6): ?>
						<div class="text-center vhn">
							<button class="btn btn-md btn-primary showmore" data-num="2" data-id="<?php echo $list_cat; ?>">Xem thêm <img src="../img/loading.gif" alt="" width="30" class="hidden"></button>
						</div>
						<?php endif; ?>
					<?php else: ?>
						<div class="alert alert-warning">Updating ...</div>
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