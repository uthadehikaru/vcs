<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher'); ?>">Received : <?php echo $total; ?></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<a href="<?php echo site_url('voucher?status=available'); ?>">Available : <?php echo $tersedia; ?></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher?status=sent'); ?>">Sent : <?php echo $terkirim; ?></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher?status=active'); ?>">Active : <?php echo $aktif; ?></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher?status=suspend'); ?>">Suspend : <?php echo $suspend; ?></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
			<a href="<?php echo site_url('voucher?status=redeem'); ?>">Redeem : <?php echo $redeem; ?></a>
			</div>
		</div>
	</div>
</div>
