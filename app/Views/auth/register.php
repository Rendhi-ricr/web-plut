<?=$this->extend('layouts/auth_base');?>

<?=$this->section('title')?>Mendaftar<?=$this->endSection()?>

<?=$this->section('content')?>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Mendaftar</h1>
                        <p class="lead">
                            Silahkan mendaftar untuk melanjutkan
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                Ada kesalahan dalam pengisian form:
                                <div class="alert-message">
                                    <ul>
                                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?=$error?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-message">
                                    <?=session()->getFlashdata('error')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <div class="alert-message">
                                    <?=session()->getFlashdata('success')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="m-sm-3">
                                <form action="<?=base_url('register')?>" method="post">
                                    <?=csrf_field()?>
                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input class="form-control form-control-lg" type="number" name="nik"
                                            placeholder="Masukan NIK anda" required value="<?=old('nik')?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input class="form-control form-control-lg" type="text" name="nama"
                                            placeholder="Masukan nama lengkap anda" required value="<?=old('nama')?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Masukan email anda" required value="<?=old('email')?>" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Sandi</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password" placeholder="Masukan sandi anda" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Konfirmasi Sandi</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password_confirm" placeholder="Masukan kembali sandi anda"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        Sudah memiliki akun? <a href="<?=base_url('login');?>">Masuk disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>