<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
        	<div class="col-md-6">
        		<a href="<?= base_url('pemasok/tambah'); ?>" style="margin-bottom: 10px;" class="btn btn-primary">Tambah Pemasok</a>
        	</div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
              <i class="fas fa-table mr-1"></i>
              Data Pemasok
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Kode</th>
                              <th>Nama Pemasok</th>
                              <th>Alamat</th>
                              <th>Telepon</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      	<?php foreach($pemasok as $p) : ?>
												<tr>
													<td><?= $p['pemkode']; ?></td>
													<td><?= $p['pemnama']; ?></td>
													<td><?= $p['pemalamat']; ?></td>
													<td><?= $p['pemnotelp']; ?></td>
													<td>
														<a href="<?= base_url('pemasok/edit/'); ?><?= $p['pemkode']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
														<a href="<?= base_url('pemasok/hapus/'); ?><?= $p['pemkode']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
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
                
