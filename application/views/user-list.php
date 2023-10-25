<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<form class="card" method="post" action="<?php echo site_url('user/bulk'); ?>" onsubmit="return confirm('Are you sure?')">
	<div class="card-header">
		<div class="row">
			<span class="col">Data user</span>
			<div class="col-2 d-flex justify-content-end">
			<a href="<?php echo site_url('user/form'); ?>" class="btn btn-primary btn-sm">Add New</a>
			</div>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-striped">
		<thead>
		<tr>
			<td>Username</td>
			<td>Role</td>
			<td width="12%">Action</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users->result() as $row): ?>
			<tr>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->role; ?></td>
				<td>
					<a href="<?php echo site_url('user/form/'.$row->username); ?>" class="btn btn-warning btn-sm">Edit</a>
					<a href="<?php echo site_url('user/delete/'.$row->username); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</form>
