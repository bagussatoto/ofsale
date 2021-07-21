<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Role <b><?= $role['role']; ?></b></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Role <b><?= $role['role']; ?></b> Management
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('menu/tambahmenu'); ?>" class="btn btn-primary">Tambah Data Role</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <td>Menu</td>
                        <td>Akses</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1 ; 
                    foreach($menu as $r) : ?>
                        <tr>
                         <td><?= $no++; ?></td>
                         <td><?= $r['menu']; ?></td>
                         <td>
                             <div class="form-checkbox">
                                 <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $r['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $r['id']; ?>">
                             </div>
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