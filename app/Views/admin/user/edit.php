<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data User</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?= base_url('admin/user') ?>" class="btn btn-primary"><i class="fa fa-arrow-left fa-sm"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <form action="<?= base_url('admin/user/update/' . $user->id_user) ?>" method="post">
                    <?= csrf_field() ?>
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
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= $user->nama ?? old('nama') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="<?= $user->email ?? old('email') ?>">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="sandi" class="form-label">Sandi</label>
                                <input type="password" name="sandi" id="sandi" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="sandi" class="form-label">Konfirmasi Sandi</label>
                                <input type="password" name="sandi_konfirmasi" id="sandi" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected>Pilih Role</option>
                                <option <?= $user->role == 'admin' ? 'selected ' : old('role') == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                                <option <?= $user->role == 'operator' ? 'selected' : old('role') == 'operator' ? 'selected' : '' ?> value="operator">Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-2"></i>Perbaharui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>