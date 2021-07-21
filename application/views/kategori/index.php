<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Kategori
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('kategori/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Data Kategori</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($kategori as $k) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $k['katnama']; ?></td>
                        <td>
                            <a href="<?= base_url('kategori/edit/') ?><?= $k['katid']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                            <a href="<?= base_url('kategori/hapus/') ?><?= $k['katid']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
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