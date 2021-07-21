<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $pemasok['pemkode'] ?>">
        	<div class="form-group">
        		<label for="kode">Kode</label>
        		<input type="text" name="kode" id="kode" value="<?= $pemasok['pemkode']; ?>" class="form-control" readonly>
                <small class="muted text-danger"><?= form_error('kode'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="nama">Nama</label>
        		<input type="text" name="nama" id="nama" class="form-control" value="<?= $pemasok['pemnama']; ?>">
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="alamat">alamat</label>
        		<input type="text" name="alamat" id="alamat" class="form-control" value="<?= $pemasok['pemalamat']; ?>">
                <small class="muted text-danger"><?= form_error('alamat'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="telp">Telpon</label>
        		<input type="text" name="telp" id="telp" class="form-control" value="<?= $pemasok['pemnotelp']; ?>">
                <small class="muted text-danger"><?= form_error('telp'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Edit</button>
        	</div>
        </form>
    </div>
</main>
                
