<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="css/login.css" rel="stylesheet" />
<div class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
  <form method="post" action="<?= site_url('login/submit'); ?>">
    <h1 class="h3 mb-3 fw-normal">Voucher System</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="username" name="username" autofocus>
      <label for="username">Username</label>
    <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password">
      <label for="password">Password</label>
    <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>
</div>