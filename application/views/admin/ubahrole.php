<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Role</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <form action="" method="post">
            <input type="text" name="id" value="<?= $role['id']; ?>">
        	<div class="form-group">
        		<label for="role">Role</label>
        		<input type="text" name="role" id="role" class="form-control" value="<?= $role['role']; ?>">
        		<small class="muted text-danger"><?= form_error('role'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Ubah Role</button>
        	</div>
        </form>
    </div>
</main>
                
