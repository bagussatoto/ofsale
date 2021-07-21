<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ganti Password</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
				<?= $this->session->flashdata('pesan'); ?>
				<form action="<?= base_url('user/changepassword'); ?>" method="post">
					<div class="form-group">
						<label for="password_lama">Password Lama</label>
						<input type="password" name="password_lama" id="password_lama" class="form-control">
						<small class="muted text-danger"><?= form_error('password_lama'); ?></small>
					</div>
					<div class="form-group">
						<label for="password_baru1">Password Baru</label>
						<input type="password" name="password_baru1" id="password_baru1" class="form-control">
						<small class="muted text-danger"><?= form_error('password_baru1'); ?></small>
					</div>
					<div class="form-group">
						<label for="password_baru2">Ulangi Password</label>
						<input type="password" name="password_baru2" id="password_baru2" class="form-control">
						<small class="muted text-danger"><?= form_error('password_baru2'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Ganti Password</button>
					</div>
				</form>

    </div>
</main>
                
