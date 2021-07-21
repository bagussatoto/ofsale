<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Data Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        
				<form action="" method="post">
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<input type="text" name="kategori" id="kategori" class="form-control">
						<small class="muted text-danger"><?= form_error('kategori'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
    </div>
</main>
                
