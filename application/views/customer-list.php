<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<form class="card" method="post" action="<?php echo site_url('customer/bulk'); ?>" onsubmit="return confirm('Are you sure?')">
	<div class="card-header">
		<div class="row">
			<span class="col">Data Customer</span>
			<div class="col-3 d-flex justify-content-evenly">
			<a href="<?php echo site_url('customer/form'); ?>" class="btn btn-primary btn-sm mr-2">Add New</a>
			<a href="<?php echo site_url('customer/export'); ?>" class="btn btn-success btn-sm mr-2">Export</a>
			<button type="submit" id="submit" disabled class="btn btn-danger btn-sm ml-2">Delete Selected</button>
			</div>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-striped datatable">
		<thead>
		<tr>
			<td><input type="checkbox" id="checkall" /></td>
			<td>ID CUST</td>
			<td>NAME</td>
			<td>PHONE</td>
			<td>EMAIL</td>
			<td>HIFI INTERNET PACKAGE</td>
			<td>VOUCHER</td>
			<td>PARTNER</td>
			<td>PRODUCT PARTNER</td>
			<td>STATUS</td>
			<td width="12%">Action</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($customers->result() as $row): ?>
			<tr>
				<td><input type="checkbox" class="selected" name="ids[]" value="<?php echo $row->id; ?>" /></td>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->phone; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->package; ?></td>
				<td><?php echo $row->voucher_id?$row->voucher:'-'; ?></td>
				<td><?php echo $row->partner?$row->partner:'-'; ?></td>
				<td><?php echo $row->partner?$row->product:'-'; ?></td>
				<td><?php echo $row->voucher_id?$row->status:'-'; ?></td>
				<td>
					<a href="<?php echo site_url('customer/form/'.$row->id); ?>" class="btn btn-warning btn-sm">Edit</a>
					<a href="<?php echo site_url('customer/delete/'.$row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</form>
