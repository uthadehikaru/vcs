<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if($this->session->flashdata('message')): ?>
<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('import/submit'); ?>" enctype="multipart/form-data">
		<h1 class="h3 mb-3 fw-normal">Import Data</h1>
		<div class="mb-3">
			<label for="table" class="form-label">Data</label>
			<select name="table" class="form-control">
				<option value="vouchers">Voucher</option>
				<option value="customers">Customer</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="file" class="form-label">File CSV</label>
			<input type="file" name="file" class="form-control" accept="text/csv" />
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn btn-warning">Reset</button>
	</form>
	</div>
</div>
