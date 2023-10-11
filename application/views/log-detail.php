<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<span class="col">Logs #<?php echo $log->id; ?></span>
			<div class="col-3 d-flex justify-content-end">
			<a href="<?php echo site_url('log'); ?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
	<div class="card-body">
	<table class="table table-striped">
		<thead>
		<tr>
			<td>Created</td><td><?php echo $log->created; ?></td>
		</tr>
		<tr>
			<td>Message</td><td><?php echo $log->message; ?></td>
		</tr>
		<tr>
			<td>Data</td><td><?php echo $log->data; ?></td>
		</tr>
		</thead>
	</table>
	</div>
</form>
