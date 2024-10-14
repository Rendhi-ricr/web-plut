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
                    <a href="" class="btn btn-primary"><i class="fa fa-plus fa-sm"></i> Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="perkembangan-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $key): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->email ?></td>
                                        <td><?= $key->role ?></td>
                                        <td>
                                            <a href="" class="btn btn-warning">Edit</a>
                                            <a href="" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>