<?=$this->extend('layouts/auth_base');?>

<?=$this->section('title')?>Login<?=$this->endSection()?>

<?=$this->section('content')?>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Selamat Datang!</h1>
                        <p class="lead">
                            Silahkan login untuk melanjutkan
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
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
                                <form action="<?=base_url('login')?>" method="post">
                                    <?=csrf_field()?>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Masukkan email anda" value="<?=old('email')?>" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sandi</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Masukkan sandi anda" required />
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        Belum punya akun? <a href="<?=base_url('register')?>">Daftar disini</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?=$this->endSection()?>