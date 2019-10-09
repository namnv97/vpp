<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/jQuery.dataTable.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>css/style.css">
</head>
<body>
	<header>
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="logo">
						<a href="<?php echo base_url; ?>">
							<img src="<?php echo logo; ?>" width="100%">
						</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-sm hidden-xs" id="search">
						<form action="<?php echo base_url.'search/'; ?>">
							<input type="text" name="s" class="form-control" autocomplete="off" placeholder="Tìm kiếm.." value="<?php echo (isset($_GET['s']))?$_GET['s']:FALSE; ?>">
							<button type="submit" class="btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div class="hidden-sm hidden-xs col-md-3 col-lg-3" id="hotline">
						<a href="tel:<?php echo phone; ?>">
							<img src="<?php echo base_url; ?>img/phone_volume.png">
							<div>
								<p>Hotline</p>
								<p><?php echo preg_replace('/([0-9]{4})([0-9]{3})([0-9]{3})/',"$1.$2.$3",phone); ?></p>
							</div>
						</a>
						<?php if(!isset($_SESSION['user_login'])): ?>
						<button class="btn btn-link btn-primary" data-toggle="modal" data-target="#form_log"><i class="fa fa-user"></i>&ensp;Đăng nhập</button>
						<?php else: ?>
							<div class="userlogin">
								<p><span>Xin chào : <b><?php echo $_SESSION['user_login']['name']; ?></b> <i class="fa fa-angle-down"></i></span></p>
								<ul class="list_info">
									<?php if($_SESSION['user_login']['role'] > 1): ?>
									<li><a href="<?php echo base_url.'admin' ?>">Trang quản trị</a></li>
									<?php endif; ?>
									<li><a href="<?php echo base_url.'user/thong-tin-ca-nhan'; ?>">Cập nhật thông tin</a></li>
									<li><a href="<?php echo base_url.'don-hang'; ?>">Xem đơn hàng</a></li>
									<li><a href="<?php echo base_url.'logout'; ?>">Đăng xuất</a></li>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container hidden-lg hiden-md bar_mobile">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 bar_menu">
					<button class="btn btn-sm"><i class="fa fa-bars"></i></button>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="search_mb">
					<form action="<?php echo base_url.'search/'; ?>">
						<input type="text" name="s" class="form-control" autocomplete="off" placeholder="Tìm kiếm.." value="<?php echo (isset($_GET['s']))?$_GET['s']:FALSE; ?>">
						<button type="submit" class="btn"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<a data-toggle="modal" data-target="#form_log" style="font-size: 24px;cursor: pointer;">
						<i class="fa fa-user"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="header-main">
			<div class="container">
				<div class="main-menu">
					<?php 
					$url = isset($_GET['url'])?$_GET['url']:FALSE;
					$url = explode('/',$url);
					?>
					
					<ul class="menu-main-menu clearfix">
						<li <?php echo empty($url[0])?'class="active"':FALSE; ?>>
							<a href="<?php echo base_url; ?>"><i class="fa fa-home"></i></a>
						</li>
						<?php
							if(!empty($category)):
								foreach($category as $cat):
									if($cat->cat_parent == 0):
						 ?>
							<li class="menu-item-has-children <?php echo (isset($url[1]) && $url[1] == $cat->slug)?'active':FALSE; ?>">
								<a href="<?php echo URL_CATEGORY.$cat->slug; ?>"><?php echo $cat->name; ?></a>
								<?php 
									$list_child = array();
									$i = 0;
									foreach($category as $cat_ch)
									{
										if($cat_ch->cat_parent == $cat->id)
										{
											$list_child[$i]['slug'] = $cat_ch->slug;
											$list_child[$i]['name'] = $cat_ch->name;
											$i ++;
										}
									}
									if(!empty($list_child)):
								 ?>
									<ul class="sub-menu">
										<?php foreach ($list_child as $child): ?>
										<li>
											<a href="<?php echo URL_CATEGORY.$child['slug']; ?>"><?php echo $child['name']; ?></a>
										</li>
										<?php endforeach; ?>
									</ul>
									<?php endif; ?>
							</li>
						<?php endif; endforeach; endif; ?>
						<li class="menu-item-has-children <?php echo ($url[0] == 'tin-tuc')?'active':FALSE; ?>">
							<a href="<?php echo base_url.'tin-tuc'; ?>">Tin tức</a>
							<?php 
							if(!empty($cat_post)):
							 ?>
							<!-- <ul class="sub-menu">
								<?php foreach($cat_post as $cat): ?>
									<li>
										<a href="<?php echo base_url.'tin-tuc/'.$cat->slug; ?>"><?php echo $cat->name; ?></a>
									</li>
								<?php endforeach; ?>
							</ul> -->
							<?php endif; ?>
						</li>
						<li class="shopping-cart">
							<a href="<?php echo base_url.'cart'; ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php 
							if(isset($_SESSION['list_pro']) && !empty($_SESSION['list_pro'])):
							 ?>
								<span><?php echo count($_SESSION['list_pro']); ?></span>
								<!-- <ul class="sub-cart">
									<?php foreach($_SESSION['list_pro'] as $pdo): ?>
									<li>
										<img src="<?php echo base_url.'img/pro3.jpg'; ?>" alt="">
										<div class="cnoi">
											<p>tên sản phẩm</p>
											<p><span>1</span>x<span>50,000 VND</span></p>
										</div>
										<i class="fa fa-times"></i>
									</li>
									<?php endforeach; ?>
									<li class="text-center">Tổng cộng : <span>100,000</span> VND</li>
									<a href="#" class="btn btn-md form-control">Xem giỏ hàng</a>
								</ul> -->
							<?php else: ?>
								<!-- <ul class="sub-cart">
									<p>bạn chưa có sản phẩm nào</p>
								</ul> -->
							<?php endif; ?>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<?php 
		//unset($_SESSION['list_pro']);
	// echo date('Y-m-d H:i:s');
	// echo '<pre>';
	// var_dump($_SESSION['list_pro']);
	// echo '</pre>';
	 ?>