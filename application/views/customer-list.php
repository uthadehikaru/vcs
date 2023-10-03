<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		Data Customer
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
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
