<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h2>Thiết lập chung</h2>
	<hr>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group option_slide">
			<label>Slider trang chủ</label>
			<?php 
			if(!empty($slider)):
				$slides = json_decode($slider,true);
				foreach($slides as $slide):
			 ?>
			<div class="item_slide draggable-item">
				<div class="left" style="width: 95%;">
					<div class="img_sl">
						<img alt="slide" src="<?php echo base_url.$slide; ?>">
						<input type="hidden" name="slide[]"value="<?php echo $slide; ?>" >
					</div>
					<p class="add_sl hide"><span class="btn btn-md btn-success">Thêm ảnh</span></p>
				</div>
				<div class="right text-center" style="width: 5%;">
					<span>-</span>
				</div>
			</div>
			<?php endforeach; endif; ?>
			<div class="text-right">
				<button class="btn btn-sm btn-primary add_row">Thêm Slide</button>
			</div>
		</div>
		<!-- <div class="form-group option_attr">
			<label>Các chính sách</label>
			<?php //for($i = 0; $i < 3; $i ++): ?>
			<div class="attr_item">
				<label>Icon <span class="add">Thêm ảnh</span><img src="" alt="icon_attr" style="display: none;width: 50px;height: 50px;"></label>
				<input type="hidden" name="img[]">
				<input type="text" name="title[]" placeholder="Tiêu đề" class="form-control">
				<textarea name="content[]" id="cont<?php //echo $i; ?>" placeholder="Nội dung"></textarea>
			</div>
			<?php //endfor; ?>
		</div> -->
		<div class="text-center">
			<input type="hidden" name="home" value="home">
			<button class="btn btn-md btn-success">Lưu</button>
		</div>
	</form>
</div>

<?php require view_cus.'admin/footer.php'; ?>