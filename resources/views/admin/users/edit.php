<?php if($_SESSION['user_login']['role'] != 3) header('location: '.base_url.'admin'); ?>
<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h3>Cập nhật thông tin người dùng</h3>
	<hr>
	<div class="content_user">
		<form action="" method="post" style="width: 60%;margin: 0 auto;" id="edit_user">
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" name="fullname" class="form-control" value="<?php echo $user->fullname; ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email'])?$_POST['email']:$user->email; ?>">
				<?php if(isset($error['email'])): ?>
					<label class="error"><?php echo $error['email']; ?></label>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="tel" name="phone" class="form-control" value="<?php echo $user->phone; ?>">
			</div>
			<div class="form-group">
				<label>Địa chỉ</label>
				<textarea name="address" rows="5" style="resize: none;" class="form-control"><?php echo $user->address; ?></textarea>
			</div>
			<div class="form-group">
				<label>Chức vụ</label>
				<select name="role">
					<option value="1" <?php echo ($user->role == 1)?'selected':FALSE; ?>>User</option>
					<option value="2" <?php echo ($user->role == 2)?'selected':FALSE; ?>>Editor</option>
					<option value="3" <?php echo ($user->role == 3)?'selected':FALSE; ?>>Administrator</option>
				</select>
			</div>
			<div class="form-group">
				<p><span class="changepass create">Thay đổi mật khẩu</span></p>
			</div>
			<div class="text-center">
				<input type="hidden" name="edit_user" value="edit_user">
				<button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
			</div>
		</form>
	</div>
</div>

<?php require view_cus.'admin/footer.php'; ?>