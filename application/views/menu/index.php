<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Menu Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?php if($this->session->flashdata('flashdata')) : ?>
        <div class="alert alert-success" role="alert">Data Menu <?= $this->session->flashdata('flashdata'); ?></div>
        <?php endif; ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Menu Management
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('menu/tambahmenu'); ?>" class="btn btn-primary">Tambah Data Menu</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                	<?php 
                	$no = 1 ; 
                	foreach($menu as $m) : ?>
						<tr>
                         <td><?= $no++; ?></td>
                         <td><?= $m['menu']; ?></td>
                         <td>
                             <a href="<?= base_url('menu/editmenu') ?>/<?= $m['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                             <a href="<?= base_url('menu/hapusmenu') ?>/<?= $m['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin ?')"><i class="fa fa-edit"></i></a>
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