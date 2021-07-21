<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Data Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        
				<form action="" method="post">
					<input type="hidden" name="id" value="<?= $katagori['katid']; ?>">
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<input type="text" name="kategori" id="kategori" class="form-control" value="<?= $katagori['katnama']; ?>">
						<small class="muted text-danger"><?= form_error('kategori'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
    </div>
</main>
                
