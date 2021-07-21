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
        		<label for="nama">Satuan</label>
        		<input type="text" name="nama" id="nama" class="form-control">
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Tambah</button>
        	</div>
        </form>
    </div>
</main>
                
