<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('customer/submit'); ?>">
		<h1 class="h3 mb-3 fw-normal">customer <?php echo $customer?->id; ?></h1>
		<?php if($customer): ?>
			<input type="hidden" name="id" value="<?php echo $customer->id; ?>" />
		<?php else: ?>
		<div class="mb-3">
			<label for="id" class="form-label">ID</label>
			<input type="text" name="id" class="form-control" value="<?php echo $customer?->id; ?>" required />
		</div>
		<?php endif; ?>
		<div class="mb-3">
			<label for="name" class="form-label">name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $customer?->name; ?>" required />
		</div>
		<div class="mb-3">
			<label for="phone" class="form-label">phone</label>
			<input type="text" name="phone" class="form-control" value="<?php echo $customer?->phone; ?>" required />
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">email</label>
			<input type="email" name="email" class="form-control" value="<?php echo $customer?->email; ?>" required />
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('customer'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
