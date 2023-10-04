<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('voucher/submit'); ?>">
		<input type="hidden" name="id" value="<?php echo $voucher?->id; ?>" />
		<h1 class="h3 mb-3 fw-normal">Voucher <?php echo $voucher?->code; ?></h1>
		<div class="mb-3">
			<label for="code" class="form-label">Code</label>
			<input type="text" name="code" class="form-control" value="<?php echo $voucher?->code; ?>" required />
		</div>
		<div class="mb-3">
			<label for="partner" class="form-label">Partner</label>
			<input type="text" name="partner" class="form-control" value="<?php echo $voucher?->partner; ?>" required />
		</div>
		<div class="mb-3">
			<label for="customer" class="form-label">Customer</label>
			<select name="customer_id" class="form-control">
				<option value="">-- no customer --</option>
				<?php foreach($customers->result() as $customer):?>
					<option value="<?php echo $customer->id; ?>" <?php echo $voucher && $voucher?->id==$customer->voucher_id?'selected':''; ?>><?php echo $customer->id; ?> - <?php echo $customer->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="mb-3">
			<label for="status" class="form-label">Status</label>
			<select name="status" required class="form-control">
				<option value="">-- pilih status --</option>
				<option value="tersedia" <?php echo $voucher?->status=='tersedia'?'selected':''; ?>>Tersedia</option>
				<option value="terkirim" <?php echo $voucher?->status=='terkirim'?'selected':''; ?>>Terkirim</option>
				<option value="aktif" <?php echo $voucher?->status=='aktif'?'selected':''; ?>>Aktif</option>
				<option value="suspend" <?php echo $voucher?->status=='suspend'?'selected':''; ?>>Suspend</option>
				<option value="redeem" <?php echo $voucher?->status=='redeem'?'selected':''; ?>>Redeem</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('voucher'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
