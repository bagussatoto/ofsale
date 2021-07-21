<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <form action="" method="post" enctype="multipart/form-data">
        	<div class="form-group">
            <label class="small mb-1" for="email">Email</label>
            <input class="form-control py-4" id="email" name="email" type="text" readonly="" value="<?= $user['email']; ?>" />
            <div class="small mb-3 muted text-danger"><?= form_error('email'); ?></div>
	        </div>
	        <div class="form-group">
            <label class="small mb-1" for="nama">nama</label>
            <input class="form-control py-4" id="nama" name="nama" type="text" value="<?= $user['nama']; ?>" />
            <div class="small mb-3 muted text-danger"><?= form_error('nama'); ?></div>
	        </div>
	        <div class="form-group">
            <label class="small mb-1" for="fotor">foto</label>
            <input class="form-control-file py-4" id="foto" name="foto" type="file" />
            <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" width="100">
	        </div>
	        <div class="form-group">
	        	<button type="submit" class="btn btn-primary">Edit</button>
	        </div>
        </form>
    </div>
</main>
                
