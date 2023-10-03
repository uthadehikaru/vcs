<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<span class="col">Data Customer</span>
			<a href="<?php echo site_url('customer/form'); ?>" class="btn btn-primary btn-sm col-1">Add New</a>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-striped">
		<thead>
		<tr>
			<td>ID</td>
			<td>Nama</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Paket</td>
			<td>Voucher</td>
			<td>Aksi</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($customers->result() as $row): ?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->phone; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->package; ?></td>
				<td><?php echo $row->voucher_id?$row->voucher:'-'; ?></td>
				<td>
					<a href="<?php echo site_url('customer/form/'.$row->id); ?>" class="btn btn-warning btn-sm">Edit</a>
					<a href="<?php echo site_url('customer/delete/'.$row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
