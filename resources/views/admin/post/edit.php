<?php require view_cus.'admin/header.php'; ?>
<div class="content_container">
	<h1><?php echo $head_title; ?></h1>
	<hr>
	<div class="content_container">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title" class="form-control" value="<?php echo $post->title; ?>">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea name="description" rows="5" class="form-control"><?php echo $post->description; ?></textarea>
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<textarea name="content" id="editor" rows="20"><?php echo $post->content; ?></textarea>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<p id="thum">
							<img src="<?php echo base_url.$post->thubnails; ?>" alt="thumbnails" id="output" style="max-width: 100%;">
						</p>
						<p id="choose">
							<span class="btn btn-link delete">Xóa ảnh bài viết</span>
							<input type="hidden" name="thumnails" value="<?php echo $post->thubnails; ?>">
						</p>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<select name="status" class="form-control">
							<option value="0" <?php echo ($post->status == 0)?'selected':FALSE; ?>>Bản nháp</option>
							<option value="1" <?php echo ($post->status == 1)?'selected':FALSE; ?>>Công khai</option>
						</select>
					</div>
					<div class="text-center">
						<input type="hidden" name="edit" value="edit">
						<button type="submit" class="btn btn-md btn-success">Cập nhật</button>
					</div>
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