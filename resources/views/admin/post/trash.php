<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h1>Bài viết đã xóa</h1>
	<hr>
	<p>
		<a href="<?php echo base_url.'admin/them-bai-viet'; ?>" class="btn btn-md btn-primary">Thêm mới</a>
	</p>
	<table id="table_category">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên bài viết</th>
				<th>Mô tả</th>
				<th>Ngày đăng</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($posts)): foreach($posts as $key => $post): ?>
				<tr>
					<td><?= $key+1; ?></td>
					<td><?= $post->title; ?></td>
					<td><?php echo $post->description; ?></td>
					<td><?php echo date_format(date_create($post->created_at),'d/m//Y'); ?></td>
					<td><a href="<?php echo base_url.'admin/restore/'.$post->ID; ?>" class="btn btn-md btn-warning"><i class="fa fa-edit"></i> Khôi phục</a></td>
					<td><a href="<?php echo base_url.'admin/xoa-bai-viet-2/'.$post->ID; ?>" class="btn btn-md btn-danger" onclick="
						if(confirm('Bạn muốn xóa bài viết này ?')) return true; return false;
					"><i class="fa fa-trash"></i> Xóa</a></td>
				</tr>

			<?php endforeach; endif; ?>
		</tbody>
	</table>
</div>

<?php require view_cus.'admin/footer.php'; ?>