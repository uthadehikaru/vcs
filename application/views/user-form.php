<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-body">
	<form method="post" action="<?= site_url('user/submit'); ?>">
		<h1 class="h3 mb-3 fw-normal">user</h1>
		<div class="mb-3">
			<label for="username" class="form-label">username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $user?->username; ?>" <?php echo $user?'readonly':''; ?> required />
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">password</label>
			<input type="password" name="password" class="form-control" value="<?php echo $user?->password; ?>" required />
		</div>
		<div class="mb-3">
			<label for="role" class="form-label">Role</label>
			<select name="role" class="form-control" required>
				<?php foreach(['user','admin'] as $role):?>
					<option value="<?php echo $role; ?>" <?php echo $user && $user?->role==$role?'selected':''; ?>><?php echo $role; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?php echo site_url('user'); ?>" class="btn btn-warning">Back</a>
	</form>
	</div>
</div>
