<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Data Konsumen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        
				<form action="" method="post">
					<div class="form-group">
						<label for="kode">Kode</label>
						<input type="text" name="kode" id="kode" class="form-control" value="K<?= sprintf("%04s", $kode_konsumen); ?>">
						<small class="text-muted">Maksimal 5 digit.</small>
						<small class="text-muted"><?= form_error('kode'); ?></small>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="form-control">
						<small class="text-muted"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control">
						<small class="text-muted"><?= form_error('alamat'); ?></small>
					</div>
					<div class="form-group">
						<label for="telp">Telpon</label>
						<input type="text" name="telp" id="telp" class="form-control">
						<small class="text-muted"><?= form_error('telp'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tambah Data Konsumen</button>
					</div>
				</form>
    </div>
</main>
                
