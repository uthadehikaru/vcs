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
			<input type="text" name="code" class="form-control" value="<?php echo $voucher?->code; ?>" <?php echo $voucher?'readonly':''; ?> required />
		</div>
		<div class="mb-3">
			<label for="partner" class="form-label">Partner</label>
			<select name="partner_id" class="form-control">
				<option value="">-- no partner --</option>
				<?php foreach($partners as $partner):?>
					<option value="<?php echo $partner->id; ?>" <?php echo $voucher && $partner?->id==$voucher->partner_id?'selected':''; ?>><?php echo $partner->name; ?> - <?php echo $partner->product; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="mb-3">
			<label for="billing" class="form-label">Billing Account</label>
			<select name="billing_id" class="form-control">
				<option value="">-- no billing account --</option>
				<?php foreach($billings as $billing):?>
					<option value="<?php echo $billing->id; ?>" <?php echo $voucher && $voucher->billing_id==$billing->id?'selected':''; ?>><?php echo $billing->customer_id; ?> - <?php echo $billing->id; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="mb-3">
			<label for="status" class="form-label">Status</label>
			<select name="status" required class="form-control">
				<option value="">-- select status --</option>
				<option value="available" <?php echo $voucher?->status=='available'?'selected':''; ?>>Available</option>
				<option value="sent" <?php echo $voucher?->status=='sent'?'selected':''; ?>>Sent</option>
				<option value="active" <?php echo $voucher?->status=='active'?'selected':''; ?>>Active</option>
				<option value="suspend" <?php echo $voucher?->status=='suspend'?'selected':''; ?>>Suspend</option>
				<option value="redeem" <?php echo $voucher?->status=='redeem'?'selected':''; ?>>Redeem</option>
				<option value="terminate" <?php echo $voucher?->status=='terminate'?'selected':''; ?>>Terminate</option>
				<option value="inactive" <?php echo $voucher?->status=='inactive'?'selected':''; ?>>Inactive</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('voucher'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
