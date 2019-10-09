<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1>Cập nhật sản phẩm</h1>
	<hr>
	
	<form id="add_product" action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $product->name; ?>">
				</div>
				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" class="form-control" placeholder="Slug" value="<?php echo $product->slug; ?>">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" style="resize: none;" class="form-control"><?php echo $product->description; ?></textarea>
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					<textarea name="content" id="editor"><?php echo $product->content; ?></textarea>

				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="form-group">
					<p id="thum" <?php if(empty($product->thumbnail)) echo "style='display: none;'"; ?>>
						<img src="<?php echo base_url.$product->thumbnail; ?>" alt="thumbnails" id="output" style="max-width: 100%;">
					</p>
					<p id="choose">
						<span class="btn btn-link <?php echo (empty($product->thumbnail))?'add':'delete'; ?>"><?php echo (empty($product->thumbnail))?"Thêm ảnh đại diện":"Xóa ảnh đại diên"; ?></span>
						<input type="hidden" name="thumnails" value="<?php echo $product->thumbnail; ?>">
					</p>
				</div>
				<div class="form-group">
					<label>Giá sản phẩm</label>
					<input type="text" name="price" class="form-control" value="<?php echo $product->price; ?>">
				</div>
				<div class="form-group">
					<label>Khuyến mãi (%)</label>
					<input type="text" class="form-control" name="sale" value="<?php echo ($product->sale == 0)?FALSE:$product->sale; ?>">
				</div>
				<div class="form-group">
					<label>Danh mục sản phẩm</label>
					<select name="cat_id" class="form-control">
						<option value="0">None</option>
						<?php if(!empty($category)): ?>
							<?php foreach($category as $cate): ?>
								<option value="<?php echo $cate->id; ?>" <?php echo ($product->cat_id == $cate->id)?'selected':FALSE; ?>><?php echo $cate->name; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>
				<div class="text-center">
					<input type="hidden" name="edit" value="edit">
					<button type="submit" class="btn btn-md btn-success">Cập nhật sản phẩm</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php require view_cus.'admin/footer.php'; ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		CKEDITOR.replace('editor');
	});
</script>