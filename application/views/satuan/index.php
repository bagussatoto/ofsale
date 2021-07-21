<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Satuan Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Satuan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('satuan/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Data Satuan</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($satuan as $s) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $s['satnama']; ?></td>
                        <td>
                            <a href="<?= base_url('satuan/edit/') ?><?= $s['satid']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                            <a href="<?= base_url('satuan/hapus/') ?><?= $s['satid']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
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