<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Tamu<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Tamu</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <!-- <a href="" class="btn btn-primary"><i class="ti ti-plus ti-sm"></i> Tambah</a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Layanan</th>
                                    <th>Kategori Layanan</th>
                                    <th>Deskripsi</th>
                                    <th>Jam Kedatangan</th>
                                    <th>Jam Pulang</th>
                                    <th>Tanggal Kedatangan</th>
                                    <th>Tanggal Pulang</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tamu as $key) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key['layanan'] ?></td>
                                        <td><?= $key['kategori_layanan'] ?></td>
                                        <td><?= $key['deskripsi'] ?></td>
                                        <td><?= $key['jam_kedatangan'] ?></td>
                                        <td><?= $key['jam_pulang'] ?></td>
                                        <td><?= $key['tanggal_kedatangan'] ?></td>
                                        <td><?= $key['tanggal_pulang'] ?></td>
                                        <td><?= $key['foto'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="text-end mt-3">
                        <button type="button" class="btn btn-success" id="downloadBtn">Download Data Terpilih</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>