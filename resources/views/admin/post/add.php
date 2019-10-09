<?php require view_cus.'admin/header.php'; ?>
<div class="content_container">
	<h1>Thêm bài viết</h1>
	<hr>
	<div class="form">
		<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Tiêu đề bài viết">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="3" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<textarea name="content" rows="10" id="editor" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="form-group">
					<p id="thum" style="display: none;">
						<img alt="thumbnails" id="output" style="max-width: 100%;">
					</p>
					<p id="choose">
						<span class="btn btn-link add">Thêm ảnh bài viết</span>
						<input type="hidden" name="thumnails">
					</p>
				</div>
				<div class="form-group">
					<label>Trạng thái</label>
					<select name="status" class="form-control">
						<option value="0">Bản nháp</option>
						<option value="1">Công khai</option>
					</select>
				</div>
				<div class="text-center">
					<input type="hidden" name="add" value="add">
					<button type="submit" class="btn btn-md btn-success">Đăng bài</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?php require view_cus.'admin/footer.php'; ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		CKEDITOR.replace('editor');
	});
</script>