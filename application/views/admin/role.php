<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Role</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Role Management
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('admin/tambahrole'); ?>" class="btn btn-primary">Tambah Data Role</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <td>Menu</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1 ; 
                	foreach($role as $r) : ?>
						<tr>
                         <td><?= $no++; ?></td>
                         <td><?= $r['role']; ?></td>
                         <td>
                             <a href="<?= base_url('admin/roleaccess/') ?><?= $r['id']; ?>" class="btn btn-warning"><i class="fa fa-users"></i></a>
                             <a href="<?= base_url('admin/ubahrole/') ?><?= $r['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                             <a href="<?= base_url('admin/hapusrole/') ?><?= $r['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin ?')"><i class="fa fa-edit"></i></a>
                         </td>                                    
                        </tr>							
                	<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</main>