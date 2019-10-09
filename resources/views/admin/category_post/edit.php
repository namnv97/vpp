<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1><?php echo $head_title; ?></h1>
	<hr>
	<?php if(isset($msg) && !empty($msg)): ?>
	<p class="alert alert-<?php echo $msg['type']; ?>"><?php echo $msg['content']; ?></p>
	<?php endif; ?>
	<div class="form_add row">
		<form action="" method="post" class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="form-group">
				<label for="name">Tên danh mục</label>
				<input type="text" name="name" class="form-control" value="<?php echo $sgcat->name; ?>">
				<?php if(isset($error['name']) && !empty($error['name'])): ?>
					<label class="error"><?php echo $error['name']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" name="slug" class="form-control" value="<?php echo $sgcat->slug; ?>">
				<?php if(isset($error['slug']) && !empty($error['slug'])): ?>
					<label class="error"><?php echo $error['slug']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label for="cat_parent">Danh mục cha</label>
				<select name="cat_parent" class="form-control">
					<option value="0">None</option>
					<?php 
						if(!empty($cat_parent)):
							foreach($cat_parent as $cat):
					?>
						<option value="<?php echo $cat->id; ?>" <?php echo ($cat->id == $sgcat->cat_parent)?'selected':FALSE; ?>><?php echo $cat->name; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</div>
			<div class="text-center">
				<input type="hidden" name="edit" value="edit">
				<button class="btn btn-md btn-success">Lưu</button>
			</div>
		</form>
	</div>
</div>

<?php require view_cus.'admin/footer.php'; ?>