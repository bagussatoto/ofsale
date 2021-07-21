<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Halaman Konsumen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- <div style="height: 100vh;"></div> -->
        <?= $this->session->flashdata('flashdata'); ?>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Konsumen
    </div>
    <form action="<?= base_url('konsumen'); ?>" method="post">
        <div class="col-lg-6">
            <div class="input-group" style="margin-top: 10px;">
              <input type="text" class="form-control" placeholder="Cari konsumen..." name="keyword" autocomplete="off" autofocus="on">
              <span class="input-group-btn">
                <input class="btn btn-primary" name="submit" type="submit" value="Cari">
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
    </form>
    <div class="card-body">
        <div class="table-responsive">
            <a href="<?= base_url('konsumen/tambahkonsumen'); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Data Konsumen</a>
            <h5>Hasil : <?= $total_rows; ?></h5>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Telepon</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($konsumen as $k) : ?>
                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?= $k['konkode']; ?></td>
                        <td><?= $k['konnama']; ?></td>
                        <td><?= $k['konalamat']; ?></td>
                        <td><?= $k['konnotelp']; ?></td>
                        <td>
                            <a href="<?= base_url('konsumen/editkon/') ?><?= $k['konkode']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                            <a href="<?= base_url('konsumen/delkon/') ?><?= $k['konkode']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
            <?php if(empty($konsumen)) : ?>
                <div class="alert alert-danger" role="alert">Data yang anda cari tidak ada.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</main>