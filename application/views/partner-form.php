<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('partner/submit'); ?>">
		<input type="hidden" name="id" value="<?php echo $partner?->id; ?>" />
		<h1 class="h3 mb-3 fw-normal">partner</h1>
		<div class="mb-3">
			<label for="name" class="form-label">name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $partner?->name; ?>" required />
		</div>
		<div class="mb-3">
			<label for="product" class="form-label">product</label>
			<input type="text" name="product" class="form-control" value="<?php echo $partner?->product; ?>" required />
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('partner'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
