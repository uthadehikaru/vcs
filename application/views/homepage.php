<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-3 mt-2">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher'); ?>">Received : <?php echo $total; ?></a>
			</div>
		</div>
	</div>
	<?php foreach($statuses as $status): ?>
	<div class="col-3 mt-2">
		<div class="card">
			<div class="card-body">
				<a href="<?php echo site_url('voucher?status='.$status); ?>"><?php echo $status; ?> : <?php echo $$status; ?></a>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
