<?php
if (!isset($_SESSION['user_login']['role']) || $_SESSION['user_login']['role'] == 1) {
    header('location: '.base_url);
}
?>
<!DOCTYPE html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?php echo $title; ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/admin/admin_lte.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/admin/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/admin/ionicon.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/admin/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/jQuery.dataTable.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>css/admin/admin_style.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="<?php echo base_url; ?>" class="logo" target="_blank">
          <span class="logo-mini"><b>VPP</b> Shop</span>
          <span class="logo-lg"><b>Admin</b> VPP Shop</span>
      </a>
      <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo logo; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['user_login']['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo logo; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION['user_login']['name']; ?>
                          </p>
                      </li>
                      <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?php echo base_url.'user/thong-tin-ca-nhan'; ?>" class="btn btn-default btn-flat" target="_blank">Cá nhân</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo base_url.'logout'; ?>" class="btn btn-default btn-flat">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
        </ul>
    </div>
</nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo logo; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
          <p><?php echo $_SESSION['user_login']['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
</div>
<ul class="sidebar-menu" data-widget="tree">
    <li class="active">
        <a href="<?php echo base_url.'admin'; ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Bài viết</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url.'admin/danh-sach-bai-viet'; ?>"><i class="fa fa-circle-o"></i> Tất cả bài viết</a></li>
            <li><a href="<?php echo base_url.'admin/them-bai-viet'; ?>"><i class="fa fa-circle-o"></i> Thêm mới bài viết</a></li>
            <li><a href="<?php echo base_url.'admin/danh-muc-bai-viet'; ?>"><i class="fa fa-circle-o"></i> Danh mục bài viết</a></li>
            <li><a href="<?php echo base_url.'admin/trash-post'; ?>"><i class="fa fa-circle-o"></i> Bài viết đã xóa</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url.'admin/danh-sach-san-pham'; ?>"><i class="fa fa-circle-o"></i> Tất cả sản phẩm</a></li>
            <li><a href="<?php echo base_url.'admin/them-san-pham'; ?>"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
            <li><a href="<?php echo base_url.'admin/danh-muc-san-pham'; ?>"><i class="fa fa-circle-o"></i> Danh mục sản phẩm</a></li>
        </ul>
    </li>
    <?php if ($_SESSION['user_login']['role'] == 3) : ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Người dùng</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url.'admin/users'; ?>"><i class="fa fa-circle-o"></i> Tất cả người dùng</a></li>
            <li><a href="<?php echo base_url.'admin/add_user'; ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
        </ul>
    </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo base_url.'admin/quan-ly-don-hang'; ?>">
            <i class="fa fa-pie-chart"></i>
            <span>Quản lý đơn hàng</span>
        </a>
    </li>
    <?php if ($_SESSION['user_login']['role'] == 3) : ?>
    <li>
        <a href="<?php echo base_url.'admin/thong-ke-doanh-thu'; ?>">
            <i class="fa fa-pie-chart"></i>
            <span>Thống kê</span>
        </a>
    </li>
    <?php endif; ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Thiết lập</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url.'admin/options/general-setting'; ?>"><i class="fa fa-circle-o"></i> Thiết lập chung</a></li>
            <li><a href="<?php echo base_url.'admin/options/home-setting'; ?>"><i class="fa fa-circle-o"></i> Thiết lập trang chủ</a></li>
            <!--<li><a href="<?php echo base_url.'admin/options/header-setting'; ?>"><i class="fa fa-circle-o"></i> Thiết lập Header</a></li>
            <li><a href="<?php echo base_url.'admin/options/footer-setting'; ?>"><i class="fa fa-circle-o"></i> Thiết lập Footer</a></li> -->
        </ul>
    </li>
</ul>
</section>
</aside>

<div class="content-wrapper">
