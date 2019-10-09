<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8">
				<h2>Thông tin tài khoản</h2>
				<hr>
				<form action="" method="post" id="info_user">
					<div class="form-group">
						<label for="fullname">Họ tên</label>
						<input type="text" name="fullname" class="form-control" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:$user->fullname; ?>">
						<?php if(isset($_SESSION['user_error']['name'])): ?>
						<label class="error"><?php echo $_SESSION['user_error']['name']; ?></label>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email'])?$_POST['email']:$user->email; ?>">
						<?php if(isset($_SESSION['user_error']['email'])): ?>
						<label class="error"><?php echo $_SESSION['user_error']['email']; ?></label>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại</label>
						<input type="tel" name="phone" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:$user->phone; ?>">
						<?php if(isset($_SESSION['user_error']['phone'])): ?>
						<label class="error"><?php echo $_SESSION['user_error']['phone']; ?></label>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ</label>
						<textarea name="address" rows="5" class="form-control" style="resize: none;"><?php echo isset($_POST['address'])?$_POST['address']:$user->address; ?></textarea>
						<?php if(isset($_SESSION['user_error']['address'])): ?>
						<label class="error"><?php echo $_SESSION['user_error']['address']; ?></label>
						<?php endif; ?>
					</div>
					<!-- <div class="form-group">
						<label for="password">Mật khẩu cũ</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="newpassword">Mật khẩu mới</label>
						<input type="password" name="newpassword" class="form-control">
					</div> -->
					<div class="text-center">
						<button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
						<input type="hidden" name="update_info" value="update">
					</div>
				</form>
				<?php 
				unset($_SESSION['user_error']);
				 ?>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>