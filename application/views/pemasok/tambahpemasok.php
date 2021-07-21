<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <form action="" method="post">
        	<div class="form-group">
        		<label for="kode">Kode</label>
        		<input type="text" name="kode" id="kode" value="P<?= sprintf("%04s", $kode_pemasok); ?>" class="form-control" readonly>
                <small class="muted text-danger"><?= form_error('kode'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="nama">Nama</label>
        		<input type="text" name="nama" id="nama" class="form-control">
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="alamat">alamat</label>
        		<input type="text" name="alamat" id="alamat" class="form-control">
                <small class="muted text-danger"><?= form_error('alamat'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="telp">Telpon</label>
        		<input type="text" name="telp" id="telp" class="form-control">
                <small class="muted text-danger"><?= form_error('telp'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Tambah</button>
        	</div>
        </form>
    </div>
</main>
                
