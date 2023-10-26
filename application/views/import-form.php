<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('alert') ?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('import/submit'); ?>" enctype="multipart/form-data">
		<h1 class="h3 mb-3 fw-normal">Import Data</h1>
		<div class="mb-3">
			<label for="table" class="form-label">Data</label>
			<select name="table" class="form-control">
				<option value="customers">1. Customer</option>
				<option value="billings">2. Billing</option>
				<option value="partners">3. Partner</option>
				<option value="vouchers">2. Voucher</option>
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
