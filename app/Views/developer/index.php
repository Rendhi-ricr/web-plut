<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Dashboard<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Dashboard</strong> Developer</h3>
    </div>
</div>
<div class="mb-3 mb-xl-3">
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <div class="alert-icon">
            <i class="fa fa-circle-info"></i>
        </div>
        <div class="alert-message">
            <h4>Selamat Datang, <strong><?=model('UserModel')->getLoginData()->nama?>!</strong></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data UMKM</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_umkm?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Perkembangan</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path
                                    d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_perkembangan?></h1>

            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Kegiatan</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-walking" viewBox="0 0 16 16">
                                <path
                                    d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0M6.44 3.752A.75.75 0 0 1 7 3.5h1.445c.742 0 1.32.643 1.243 1.38l-.43 4.083a1.8 1.8 0 0 1-.088.395l-.318.906.213.242a.8.8 0 0 1 .114.175l2 4.25a.75.75 0 1 1-1.357.638l-1.956-4.154-1.68-1.921A.75.75 0 0 1 6 8.96l.138-2.613-.435.489-.464 2.786a.75.75 0 1 1-1.48-.246l.5-3a.75.75 0 0 1 .18-.375l2-2.25Z" />
                                <path
                                    d="M6.25 11.745v-1.418l1.204 1.375.261.524a.8.8 0 0 1-.12.231l-2.5 3.25a.75.75 0 1 1-1.19-.914zm4.22-4.215-.494-.494.205-1.843.006-.067 1.124 1.124h1.44a.75.75 0 0 1 0 1.5H11a.75.75 0 0 1-.531-.22Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_kegiatan?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data User</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_user?></h1>

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_tamu?></h1>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu dalam Proses</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-fast-forward-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M4.271 5.055a.5.5 0 0 1 .52.038L8 7.386V5.5a.5.5 0 0 1 .79-.407l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 8 10.5V8.614l-3.21 2.293A.5.5 0 0 1 4 10.5v-5a.5.5 0 0 1 .271-.445" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_tamu_proses?></h1>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total Data Tamu Selesai</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3"><?=$total_tamu_selesai?></h1>

            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>