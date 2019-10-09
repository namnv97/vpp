<?php if($_SESSION['user_login']['role'] != 3) header('location: '.base_url.'admin'); ?>
<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h3>Thêm người dùng</h3>
	<hr>
	<div class="content_user">
		<form action="" method="post" style="width: 60%;margin: 0 auto;" id="add_user">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo isset($_POST['username'])?$_POST['username']:FALSE; ?>">
				<?php if(isset($error['username']) && !empty($error['username'])): ?>
				<label class="error"><?php echo $error['username']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
				<?php if(isset($error['pwd']) && !empty($error['pwd'])): ?>
				<label class="error"><?php echo $error['pwd']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" name="fullname" class="form-control" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:FALSE; ?>">
				<?php if(isset($error['fullname']) && !empty($error['fullname'])): ?>
				<label class="error"><?php echo $error['fullname']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email'])?$_POST['email']:FALSE; ?>">
				<?php if(isset($error['email'])): ?>
					<label class="error"><?php echo $error['email']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="tel" name="phone" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:FALSE; ?>">
				<?php if(isset($error['phone']) && !empty($error['phone'])): ?>
				<label class="error"><?php echo $error['phone']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Địa chỉ</label>
				<textarea name="address" rows="5" style="resize: none;" class="form-control"><?php echo (isset($_POST['address']))?$_POST['address']:FALSE; ?></textarea>
				<?php if(isset($error['address']) && !empty($error['address'])): ?>
				<label class="error"><?php echo $error['address']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Chức vụ</label>
				<select name="role">
					<option value="1" <?php echo (isset($_POST['role']) && $_POST['role'] == 1)?'selected':FALSE; ?>>User</option>
					<option value="2" <?php echo (isset($_POST['role']) && $_POST['role'] == 2)?'selected':FALSE; ?>>Editor</option>
					<option value="3" <?php echo (isset($_POST['role']) && $_POST['role'] == 3)?'selected':FALSE; ?>>Administrator</option>
				</select>
			</div>
			<div class="text-center">
				<input type="hidden" name="add_user" value="add_user">
				<button type="submit" class="btn btn-md btn-primary">Thêm</button>
			</div>
		</form>
	</div>
</div>

<?php require view_cus.'admin/footer.php'; ?>