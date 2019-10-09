<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1>Danh sách sản phẩm</h1>
	<hr>
	<p>
		<a href="<?php echo base_url.'admin/them-san-pham'; ?>" class="btn btn-md btn-primary">Thêm mới</a>
	</p>
	<table id="table_category" class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Mô tả</th>
				<th>Danh mục</th>
				<th>Ngày đăng</th>
				<th>Bán chạy</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($products)): foreach($products as $key => $product): ?>
				<tr>
					<td><?= $key+1; ?></td>
					<td><a href="<?php echo base_url.'product/'.$product->slug; ?>" target="_blank" title="Xem sản phẩm: <?= $product->name; ?>"><?= $product->name; ?></a></td>
					<td><?php echo $product->description; ?></td>
					<td><?php echo get_product_cat($product->cat_id); ?></td>
					<td><?php echo date_format(date_create($product->created_at),'d/m/Y'); ?></td>
					<td class="text-center"><i class="fa fa-star <?php echo ($product->best_seller == 1)?'orange':'opa'; ?>" data-id="<?php echo $product->id; ?>"></i></td>
					<td><a href="<?php echo base_url.'admin/sua-san-pham/'.$product->id; ?>" class="btn btn-md btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
					<td><a href="<?php echo base_url.'admin/xoa-san-pham/'.$product->id; ?>" class="btn btn-md btn-danger" onclick="
					if(confirm('Bạn muốn xóa bài viết này ?')) return true; return false;
					"><i class="fa fa-trash"></i> Xóa</a></td>
				</tr>

			<?php endforeach; endif; ?>
		</tbody>
	</table>
</div>

<?php require view_cus.'admin/footer.php'; ?>