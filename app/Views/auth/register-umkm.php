<?=$this->extend('layouts/auth_base');?>

<?=$this->section('title')?>Lengkapi Data UMKM<?=$this->endSection()?>

<?=$this->section('content')?>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Data UMKM</h1>
                        <p class="lead">
                            Lengkapi data UMKM anda untuk melanjutkan
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
                                <form action="<?=base_url('register-umkm')?>" method="post">
                                    <?=csrf_field()?>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Usaha / UMKM</label>
                                        <input class="form-control form-control-lg" type="text" name="umkm"
                                            placeholder="Masukan nama usaha / umkm anda" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Usaha</label>
                                        <input class="form-control form-control-lg" type="text" name="jenis_usaha"
                                            placeholder="Masukan jenis usaha" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input class="form-control form-control-lg" type="text" name="alamat"
                                            placeholder="Masukan alamat" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Desa / Kelurahan</label>
                                        <input class="form-control form-control-lg" type="text" name="desa_kelurahan"
                                            placeholder="Masukan desa / kelurahan" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Kecamatan</label>
                                                <input class="form-control form-control-lg" type="text" name="kecamatan"
                                                    placeholder="Masukan kecamatan" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Kode Pos</label>
                                                <input class="form-control form-control-lg" type="text" name="kode_pos"
                                                    placeholder="Masukan kode pos" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input class="form-control form-control-lg" type="email" name="email"
                                                    placeholder="Masukan email" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">No. Telp / No. HP</label>
                                                <input class="form-control form-control-lg" type="tel" name="telepon"
                                                    placeholder="Masukan telepon" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Lanjutkan</button>
                                        <a href="<?=base_url('skip')?>" class="text-center">Lewati langkah ini</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>