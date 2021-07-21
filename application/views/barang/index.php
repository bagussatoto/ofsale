<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Barang
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Data Barang</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($barang as $b) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b['kode_brg']; ?></td>
                        <td><?= $b['nama_brg']; ?></td>
                        <td><?= $b['katnama']; ?></td>
                        <td><?= $b['satnama']; ?></td>
                        <td><?= $b['hrgjual']; ?></td>
                        <td><?= $b['hrgbeli']; ?></td>
                        <td>
                            <a href="<?= base_url('barang/edit/') . $b['kode_brg']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                            <a href="<?= base_url('barang/hapus/') . $b['kode_brg']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
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