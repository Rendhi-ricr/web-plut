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
                    <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus fa-sm"></i> Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <div class="alert-message">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <div class="alert-message">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="user-table" style="width: 100%;">
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
                                            <a href="<?= base_url('admin/user/edit/' . $key->id_user) ?>" class="btn btn-warning"><i class="fa fa-edit me-2"></i>Edit</a>
                                            <a href="<?= base_url('admin/user/hapus/' . $key->id_user) ?>" class="btn btn-danger"><i class="fa fa-trash me-2"></i>Hapus</a>
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
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            "responsive": true,
            "autoWidth": true,
        });
    });
</script>
<?= $this->endSection() ?>