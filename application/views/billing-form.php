<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('billing/submit'); ?>">
		<h1 class="h3 mb-3 fw-normal">billing <?php echo $billing?->id; ?></h1>
		<?php if($billing): ?>
			<input type="hidden" name="id" value="<?php echo $billing->id; ?>" />
		<?php else: ?>
		<div class="mb-3">
			<label for="id" class="form-label">ID</label>
			<input type="text" name="id" class="form-control" value="<?php echo $billing?->id; ?>" required />
		</div>
		<?php endif; ?>
		<div class="mb-3">
			<label for="customer" class="form-label">CUSTOMER</label>
			<select name="customer_id" class="form-control">
				<option value="">-- no customer --</option>
				<?php foreach($customers as $customer):?>
					<option value="<?php echo $customer->id; ?>" <?php echo $billing && $billing?->customer_id==$customer->id?'selected':''; ?>><?php echo $customer->id; ?> - <?php echo $customer->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="mb-3">
			<label for="package" class="form-label">HIFI INTERNET PACKAGE</label>
			<input type="text" name="package" class="form-control" value="<?php echo $billing?->package; ?>" required />
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('billing'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
