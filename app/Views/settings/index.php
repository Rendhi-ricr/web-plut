<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Pengaturan<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Pengaturan</h1>

    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pengaturan Akun</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account"
                        role="tab" aria-selected="true">
                        Akun
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password" role="tab"
                        aria-selected="false" tabindex="-1">
                        Sandi
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#" role="tab"
                        aria-selected="false" tabindex="-1">
                        Hapus Akun
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Informasi Akun</h5>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    Ada kesalahan dalam pengisian form:
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
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    <?=session()->getFlashdata('error')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-check"></i>
                                </div>
                                <div class="alert-message">
                                    <?=session()->getFlashdata('success')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <form action="<?=base_url('settings/update-profil')?>" method="post"
                                enctype="multipart/form-data">
                                <?=csrf_field()?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap"
                                                placeholder="Nama Lengkap" name="nama"
                                                value="<?=model('UserModel')->getLoginData()->nama?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" id="Email" placeholder="Email"
                                                name="email" value="<?=model('UserModel')->getLoginData()->email?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="<?=model('UserModel')->getLoginData()->nama?>"
                                                src="<?=base_url('uploads/' . model('UserModel')->getLoginData()->foto)?>"
                                                class="rounded-circle img-responsive mt-2" width="128" height="128"
                                                id="fotoProfil">
                                            <div class="mt-2">
                                                <input style="display:none" type="file" id="my-file" accept="image/*"
                                                    name="foto" />
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="document.getElementById('my-file').click()"><i
                                                        class="fa fa-upload me-2"></i>Upload</button>
                                            </div>
                                            <small class="text-info">Untuk hasil terbaik, gunakan gambar minimal 128px x
                                                128px dalam
                                                format .jpg</small><br>
                                            <small class="text-danger">Klik simpan perubahan untuk menyimpan foto
                                                profil</small>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Simpan
                                    perubahan</button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Pengaturan Sandi</h5>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    Ada kesalahan dalam pengisian form:
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
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    <?=session()->getFlashdata('error')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-check"></i>
                                </div>
                                <div class="alert-message">
                                    <?=session()->getFlashdata('success')?>
                                </div>
                            </div>
                            <?php endif;?>
                            <form action="<?=base_url('settings/update-sandi')?>" method="post">
                                <?=csrf_field()?>
                                <div class="mb-3">
                                    <label class="form-label" for="sandi_saat_ini">Sandi saat ini</label>
                                    <input type="password" class="form-control" id="sandi_saat_ini"
                                        name="current_password">
                                    <small><a href="#">Lupa sandi
                                            anda?</a></small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="sandi_baru">Sandi Baru</label>
                                    <input type="password" class="form-control" id="sandi_baru" class="password"
                                        name="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="konfirmasi_sandi_baru">Konfirmasi Sandi</label>
                                    <input type="password" class="form-control" id="konfirmasi_sandi_baru"
                                        name="password_confirm">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Simpan
                                    Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?=$this->endSection()?>

<?=$this->section('script')?>

<script>
$(document).ready(function() {
    // after file opened, change img to uploaded image
    $('#my-file').change(function() {
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#fotoProfil').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    });

});
</script>

<?=$this->endSection()?>