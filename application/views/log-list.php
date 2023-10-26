<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<span class="col">Logs History</span>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-striped" id="logs">
		<thead>
		<tr>
			<td>Created</td>
			<td>Message</td>
			<td width="12%">Action</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($logs->result() as $row): ?>
			<tr>
				<td><?php echo $row->created; ?></td>
				<td><?php echo $row->message; ?></td>
				<td><a href="<?php echo site_url('log/detail/'.$row->id); ?>">Detail</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</form>
