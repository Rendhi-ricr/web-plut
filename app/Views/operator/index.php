<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Dashboard</strong> Operator</h3>
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

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?= $total_tamu ?></h1>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu dalam Proses</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fast-forward-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="M4.271 5.055a.5.5 0 0 1 .52.038L8 7.386V5.5a.5.5 0 0 1 .79-.407l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 8 10.5V8.614l-3.21 2.293A.5.5 0 0 1 4 10.5v-5a.5.5 0 0 1 .271-.445" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?= $total_tamu_proses ?></h1>

            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu Selesai</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?= $total_tamu_selesai ?></h1>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>