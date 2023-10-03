<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		Data Voucher
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
				<td><a href="<?php echo site_url('voucher/form/'.$row->id); ?>" class="btn btn-primary btn-sm">Edit</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
