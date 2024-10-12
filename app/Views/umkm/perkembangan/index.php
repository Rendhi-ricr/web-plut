<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Perkembangan UMKM<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Perkembangan UMKM</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="perkembangan/tambah" class="btn btn-primary"><i class="ti ti-plus ti-sm"></i> Tambah</a>
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
                                    <th>Nama UMKM</th>
                                    <th>Tahun</th>
                                    <th>Asset</th>
                                    <th>Omzet</th>
                                    <th>Produk Unggulan</th>
                                    <th>Foto Produk</th>
                                    <th>Jumlah Tenaga Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($perkembangan as $key => $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p->nama_umkm ?></td>
                                        <td><?= $p->tahun ?></td>
                                        <td><?= $p->asset ?></td>
                                        <td><?= $p->omzet ?></td>
                                        <td><?= $p->produk_unggulan ?></td>
                                        <td><?= $p->foto_produk ?></td>
                                        <td><?= $p->jumlah_tenaga_kerja ?></td>
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