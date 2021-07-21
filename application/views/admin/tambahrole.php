<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Role</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <form action="<?= base_url('admin/tambahrole'); ?>" method="post">
        	<div class="form-group">
        		<label for="role">Role</label>
        		<input type="text" name="role" id="role" class="form-control">
        		<small class="muted text-danger"><?= form_error('role'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Tambah Role</button>
        	</div>
        </form>
    </div>
</main>
                
