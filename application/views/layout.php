<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Voucher System</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>

<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Voucher System</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
                <?php if(isLogin()): ?>
				<div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link <?php echo uri_string()=='' || str_starts_with(uri_string(), 'homepage')?'active':''; ?>" href="<?php echo site_url(''); ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'customer')?'active':''; ?>" href="<?php echo site_url('customer'); ?>">Customer</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'billing')?'active':''; ?>" href="<?php echo site_url('billing'); ?>">Billing</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'partner')?'active':''; ?>" href="<?php echo site_url('partner'); ?>">Partner</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'voucher')?'active':''; ?>" href="<?php echo site_url('voucher'); ?>">Voucher</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'import')?'active':''; ?>" href="<?php echo site_url('import'); ?>">Import Data</a>
						</li>
						<?php if($this->session->userdata('role') === 'admin'): ?>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'user')?'active':''; ?>" href="<?php echo site_url('user'); ?>">User</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo str_starts_with(uri_string(), 'log')?'active':''; ?>" href="<?php echo site_url('log'); ?>">Log</a>
						</li>
						<?php endif; ?>
					</ul>
                    <span class="navbar-text">
						<span class="text-primary">Welcome <?php echo $this->session->userdata('username'); ?>!</span>
                        <a href="<?= site_url('logout'); ?>">Logout</a>
                    </span>
				</div>
                <?php endif; ?>
			</div>
		</nav>
        <div class="container py-4">
		    <?= $content; ?>
        </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script>
		$( document ).ready(function() {
			new DataTable('.datatable', {
				columnDefs: [
					{ orderable: false, targets: 0 }
				],
				order: [[1, 'desc']]
			});

			if ($("#logs").length) {
				new DataTable('#logs', {
					order: [[0, 'desc']]
				});
			}

			$("#checkall").click(function(){
				$('input:checkbox').not(this).prop('checked', this.checked);
				$('#submit').prop('disabled', !this.checked);
			});

			$(".selected").click(function(){
				checked = false;
				$('.selected').each(function(i){
					if(this.checked)
						checked = true;
				})
				$('#submit').prop('disabled', !checked);
			});
		});
	</script>
</body>

</html>
