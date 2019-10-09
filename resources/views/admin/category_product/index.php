<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1><?php echo $head_title; ?></h1>
	<hr>
	<p><a href="<?php echo base_url.'admin/add-category'; ?>" class="btn btn-md btn-primary">Thêm mới</a></p>
	<table id="table_category" class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên danh mục</th>
				<th>Slug</th>
				<th>Danh mục cha</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(!empty($category)):
				foreach($category as $key => $cat):
			 ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $cat->name; ?></td>
				<td><?php echo $cat->slug; ?></td>
				<td><?php echo $cat->cat_parent; ?></td>
				<td><a href="<?php echo base_url.'admin/edit-category/'.$cat->id; ?>" class="btn btn-warning btn-md"><i class="fa fa-edit"></i> Sửa</a></td>
				<td><a href="<?php echo base_url.'admin/delete-category/'.$cat->id; ?>" class="btn btn-md btn-danger" onclick="
				if(confirm('Bạn muốn xóa danh mục này?')) return true; return false;
				"><i class="fa fa-trash"></i> Xóa</a></td>
			</tr>

			<?php endforeach; endif; ?>
		</tbody>
	</table>
</div>

<?php require view_cus.'admin/footer.php'; ?>