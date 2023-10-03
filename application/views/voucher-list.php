<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<span class="col">Data Voucher</span>
			<a href="<?php echo site_url('voucher/form'); ?>" class="btn btn-primary btn-sm col-1">Add New</a>
		</div>
	</div>
	<div class="card-body">
	<table id="voucher" class="table table-striped">
		<thead>
		<tr>
			<td>Code</td>
			<td>Partner</td>
			<td>Status</td>
			<td>Customer</td>
			<td>Aksi</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($vouchers->result() as $row): ?>
			<tr>
				<td><?php echo $row->code; ?></td>
				<td><?php echo $row->partner; ?></td>
				<td><?php echo $row->status; ?></td>
				<td><?php echo $row->customer??'-'; ?></td>
				<td>
					<a href="<?php echo site_url('voucher/form/'.$row->id); ?>" class="btn btn-warning btn-sm">Edit</a>
					<a href="<?php echo site_url('voucher/delete/'.$row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
