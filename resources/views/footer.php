<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
				<img src="<?php echo logo; ?>">
				<ul>
					<li>
						<i class="fa fa-map-marker"></i> Địa chỉ: <span>Km10 Nguyễn Trãi, Hà Đông, Hà Nội</span>
					</li>
					<li>
						<i class="fa fa-envelope"></i> Email: <a href="mailto:namnguyen@gmail.com" class="inline">namnguyen@gmail.com</a>
					</li>
					<li>
						<i class="fa fa-phone"></i> Số điện thoại: <a href="tel:0357235648" class="inline">0357.235.648</a>
					</li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
				<h4>Quy định - Chính sách</h4>
				<ul>
					<li>
						<a href="#">Chính sách bảo hành</a>
					</li>
					<li>
						<a href="#">Chính sách bảo mật</a>
					</li>
					<li>
						<a href="#">Hướng dẫn mua hàng</a>
					</li>
					<li>
						<a href="#">Hướng dẫn thanh toán</a>
					</li>
					<li>
						<a href="#">Tuyển dụng</a>
					</li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
				<h4>Thành viên nhóm</h4>
				<ul>
					<li>
						<i class="fa fa-user"></i> <a href="#">Nguyễn Văn Nam - B15DCCN378</a>
					</li>
					<li>
						<i class="fa fa-user"></i> <a href="#">Nguyễn Thành Duy - B15DCCN169</a>
					</li>
					<li>
						<i class="fa fa-user"></i> <a href="#">Lê Minh Tuấn - B15DCCN609</a>
					</li>
					<li>
						<i class="fa fa-user"></i> <a href="#">Chu Quế Phương - B15DCCN420</a>
					</li>
					<li>
						<i class="fa fa-user"></i> <a href="#">Trần Đức Lâm - B15DCCN301</a>
					</li>
					
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
				<div class="fb-page" data-href="https://www.facebook.com/FacebookVietnam/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FacebookVietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FacebookVietnam/">Facebook</a></blockquote></div>
			</div>
		</div>
	</div>
</footer>
<div class="copyright">
	<div class="container">
		<span><?php echo copyright; ?></span>
	</div>
</div>
<?php if(!isset($_SESSION['user_login'])): ?>
<div id="form_log" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Đăng nhập</h4>
			</div>
			<div class="modal-body">
				<form id="form_in" action="<?php echo base_url.'login'; ?>" method="post">
					<div class="form-group">
						<label for="username">Tên đăng nhập</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Mật khẩu</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="text-center">
						<input type="hidden" name="url" value="<?php echo current_url(); ?>">
						<input type="hidden" name="login" value="login">
						<button type="submit" class="btn btn-md btn-primary">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<script type="text/javascript">
	var ajax = "<?php echo base_url.'ajax/'; ?>";
</script>
<script src="<?php echo base_url; ?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url; ?>js/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url; ?>js/jQuery.data.min.js"></script>
<script src="<?php echo base_url; ?>js/jquery.marquee.min.js"></script>
<script src="<?php echo base_url; ?>js/sweet.alert.min.js"></script>
<script src="<?php echo base_url; ?>js/custom.js"></script>
<?php 
if(isset($_SESSION['msg_login'])):
	?>
	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			// title: 'Oops...',
			text: "<?php echo $_SESSION['msg_login']; ?>",
		})
	</script>

	<?php 
	unset($_SESSION['msg_login']); 
endif; 
?>



<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=381461119271778&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script async defer src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=381461119271778&autoLogAppEvents=1"></script>
</body>
</html>