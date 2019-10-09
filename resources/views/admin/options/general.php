<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h2>Thiết lập chung</h2>
	<hr>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Logo</label>
			<p id="thum">
				<img src="<?php echo logo; ?>" alt="thumbnails" id="output" style="max-width: 100%;">
			</p>
			<p id="choose" class="logo">
				<span class="btn btn-link delete">Xóa ảnh</span>
				<input type="hidden" name="thumnails">
			</p>
		</div>
		<div class="form-group">
			<label>Số điện thoại</label>
			<input type="text" name="phone" placeholder="Số điện thoại liên hệ" class="form-control" value="<?php echo isset($phone)?$phone:FALSE; ?>">
		</div>
		<!-- <div class="form-group">
			<label>Footer cột 1</label>
			<textarea name="footer-1" id="ft1"></textarea>
		</div>
		<div class="form-group">
			<label>Footer cột 2</label>
			<textarea name="footer-2" id="ft2"></textarea>
		</div>
		<div class="form-group">
			<label>Footer cột 3</label>
			<textarea name="footer-3" id="ft3"></textarea>
		</div>
		<div class="form-group">
			<label>Footer cột 4</label>
			<textarea name="footer-4" id="ft4"></textarea>
		</div> -->

		
		<div class="form-group">
			<label>Copright</label>
			<input type="text" name="copyright" value="<?php echo (isset($copyright))?$copyright:FALSE; ?>" class="form-control" placeholder="Copyright">
		</div>

		<div class="text-center">
			<input type="hidden" name="general" value="general">
			<button class="btn btn-md btn-success">Lưu</button>
		</div>
	</form>
</div>

<?php require view_cus.'admin/footer.php'; ?>
<!-- <script type="text/javascript">
	jQuery(document).ready(function(){
    
    if(jQuery('*').has('#ft1'))
    {
        CKEDITOR.replace('ft1');
    }
    if(jQuery('*').has('#ft2'))
    {
        CKEDITOR.replace('ft2');
    }
    if(jQuery('*').has('#ft3'))
    {
        CKEDITOR.replace('ft3');
    }
    if(jQuery('*').has('#ft4'))
    {
        CKEDITOR.replace('ft4');
    }

});
</script> -->