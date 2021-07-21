<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Halaman Admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
				<div class="row">
          <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                  <div class="card-body"><?= $konsumen; ?> Konsumen</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="<?= base_url('konsumen'); ?>">View Details</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                  <div class="card-body"><?= $pemasok; ?> Pemasok</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="<?= base_url('pemasok'); ?>">View Details</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                  <div class="card-body"><?= $barang; ?> Barang</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="<?= base_url('barang'); ?>">View Details</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                  <div class="card-body"><?= $kategori; ?> Kategori</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="<?= base_url('kategori'); ?>">View Details</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</main>
                
