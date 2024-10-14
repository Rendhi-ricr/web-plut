<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Dashboard</strong> UMKM</h3>
    </div>
</div>
<div class="mb-3 mb-xl-3">
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <div class="alert-icon">
            <i class="fa fa-circle-info"></i>
        </div>
        <div class="alert-message">
            <h4>Selamat Datang, <strong><?= model('UserModel')->getLoginData()->nama ?>!</strong></h4>
        </div>
    </div>
</div>

<?= $this->endSection() ?>