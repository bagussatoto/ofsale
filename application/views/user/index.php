<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Halaman User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <?= $this->session->flashdata('pesan'); ?>
				<div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['nama']; ?></h5>
                  <p class="card-text"><?= $user['email']; ?></p>
                  <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_create']); ?></small></p> -->
                </div>
              </div>
            </div>
          </div>
    </div>
</main>
                
