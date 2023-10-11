<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<form class="card" method="post" action="<?php echo site_url('voucher/bulk'); ?>" onsubmit="return confirm('Are you sure?')">
	<div class="card-header">
		<div class="row">
			<span class="col">Data Voucher <?php echo $status ?></span>
			<div class="col-3 d-flex justify-content-evenly">
			<a href="<?php echo site_url('voucher/form'); ?>" class="btn btn-primary btn-sm mr-2">Add New</a>
			<a href="<?php echo site_url('voucher/export/'.$status); ?>" class="btn btn-success btn-sm mr-2">Export</a>
			<button type="submit" id="submit" disabled class="btn btn-danger btn-sm ml-2">Delete Selected</button>
			</div>
		</div>
	</div>
	<div class="card-body">
	<table id="voucher" class="table table-striped datatable">
		<thead>
		<tr>
			<td><input type="checkbox" id="checkall" /></td>
			<td>Code</td>
			<td>Partner</td>
			<td>Status</td>
			<td>Customer</td>
			<td>Action</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($vouchers->result() as $row): ?>
			<tr>
				<td><input type="checkbox" class="selected" name="ids[]" value="<?php echo $row->id; ?>" /></td>
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
</form>
