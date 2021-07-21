<div id="layoutSidenav_content">
<main>
 <div class="container-fluid">
     <h1 class="mt-4">SubMenu Management</h1>
     <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
         <li class="breadcrumb-item active">My Dashboard</li>
     </ol>
     <!-- <div style="height: 100vh;"></div> -->
     <?php if($this->session->flashdata('flashdata')) : ?>
     <div class="alert alert-success" role="alert">Data SubMenu <?= $this->session->flashdata('flashdata'); ?></div>
     <?php endif; ?>
     <div class="card mb-4">
 <div class="card-header">
     <i class="fas fa-table mr-1"></i>
     SubMenu Management
 </div>
 <div class="card-body">
     <div class="table-responsive">
         <a href="<?= base_url('menu/tambahsubmenu'); ?>" class="btn btn-primary">Tambah Data SubMenu</a>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Menu</th>
                     <td>Title</td>
                     <td>Url</td>
                     <td>Icon</td>
                     <td>Active</td>
                     <td>Aksi</td>
                 </tr>
             </thead>
             <tbody>
             	<?php 
             	$no = 1 ; 
             	foreach($submenu as $sm) : ?>
					<tr>
                      <td><?= $no++; ?></td>
                      <td><?= $sm['menu']; ?></td>
                      <td><?= $sm['title']; ?></td>
                      <td><?= $sm['url']; ?></td>
                      <td><?= $sm['icon']; ?></td>
                      <td><?= $sm['is_active']; ?></td>
                      <td>
                          <a href="<?= base_url('menu/editsubmenu') ?>/<?= $sm['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                          <a href="<?= base_url('menu/hapussubmenu') ?>/<?= $sm['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin ?')"><i class="fa fa-trash"></i></a>
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