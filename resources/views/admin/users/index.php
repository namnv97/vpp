<?php if($_SESSION['user_login']['role'] != 3) header('location: '.base_url.'admin'); ?>
<?php require view_cus.'admin/header.php'; ?>

<div class="content_container">
	<h3>Danh sách người dùng</h3>
	<hr>
	<p>
		<a href="<?php echo base_url.'admin/add-user'; ?>" class="btn btn-md btn-primary">Thêm mới</a>
	</p>
	<table id="table_category">
		<thead>
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Chức vụ</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($users)): foreach($users as $key => $user): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $user->fullname; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td><?php echo $user->address ?></td>
				<td><?php echo ($user->role == 3)?'Administrator':(($user->role == 2)?'Editor':'User'); ?></td>
				<td><a href="<?php echo base_url.'admin/edit_user/'.$user->id; ?>" class="btn btn-md btn-warning"><i class="fa fa-edit"></i> Sửa</a></td>
				<td><a href="<?php echo base_url.'admin/delete_user/'.$user->id; ?>" class="btn btn-md btn-danger" onclick="
					if(confirm('Bạn muốn xóa người dùng này ?')) return true; return false;
				"><i class="fa fa-trash"></i> Xóa</a></td>
			</tr>
			<?php endforeach; endif; ?>
		</tbody>
	</table>
</div>

<?php require view_cus.'admin/footer.php'; ?>