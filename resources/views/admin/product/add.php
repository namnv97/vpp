<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1>Thêm sản phẩm</h1>
	<hr>
	
	<form id="add_product" action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
				</div>
				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" class="form-control" placeholder="Slug">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" style="resize: none;" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					<textarea name="content" id="editor"></textarea>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="form-group">
					<p id="thum" style="display: none;">
						<img  alt="thumbnails" id="output" style="max-width: 100%;">
					</p>
					<p id="choose">
						<span class="btn btn-link add">Thêm ảnh bài viết</span>
						<input type="hidden" name="thumnails">
					</p>
				</div>
				<div class="form-group">
					<label>Giá sản phẩm</label>
					<input type="text" name="price" class="form-control">
				</div>
				<div class="form-group">
					<label>Khuyến mãi (%)</label>
					<input type="text" class="form-control" name="sale">
				</div>
				<div class="form-group">
					<label>Danh mục sản phẩm</label>
					<select name="cat_id" class="form-control">
						<option value="0">None</option>
						<?php if(!empty($category)): ?>
							<?php foreach($category as $cate): ?>
								<option value="<?php echo $cate->id; ?>"><?php echo $cate->name; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>
				<div class="text-center">
					<input type="hidden" name="add" value="add">
					<button type="submit" class="btn btn-md btn-success">Lưu sản phẩm</button>
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