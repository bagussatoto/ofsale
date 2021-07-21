<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                        </div>

                        <div class="card-body">
                            <form action="<?= base_url('auth/daftar'); ?>" method="post">
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control py-4" id="email" name="email" type="text" placeholder="Masukan email anda" />
                                    <div class="small mb-3 text-muted"><?= form_error('email'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="nama">Nama Lengkap</label>
                                    <input class="form-control py-4" id="nama" name="nama" type="text" placeholder="Masukan nama anda" />
                                    <div class="small mb-3 text-muted"><?= form_error('nama'); ?></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="password1">Password</label>
                                            <input class="form-control py-4" id="password1" name="password1" type="password" placeholder="Masukan password" />
                                            <div class="small mb-3 text-muted"><?= form_error('password1'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="password2">Konfirmasi Password</label>
                                            <input class="form-control py-4" id="password2" name="password2" type="password" placeholder="Konfirmasi password" />
                                            <div class="small mb-3 text-muted"><?= form_error('password2'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Buat Akun</button></div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="<?= base_url('auth') ?>">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>