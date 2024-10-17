<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Tamu<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Data Tamu</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="bukutamu-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Tamu</th>
                                    <th>Nama Tamu / Nama UMKM</th>
                                    <th>Layanan</th>
                                    <th>Kategori Layanan</th>
                                    <th>Deskripsi</th>
                                    <th>Jam Kedatangan</th>
                                    <th>Jam Pulang</th>
                                    <th>Tanggal Bertamu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($tamu as $item): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $item->kategori_tamu ?></td>
                                    <td><?= ($item->nama_umkm == null) ? $item->nama_tamu : $item->nama_umkm ?></td>
                                    <td><?= $item->layanan ?></td>
                                    <td><?= $item->kategori_layanan ?></td>
                                    <td><?= $item->deskripsi ?></td>
                                    <td><?= $item->jam_kedatangan ?></td>
                                    <td><?= $item->jam_pulang ?></td>
                                    <td><?= $item->tanggal_bertamu ?></td>
                                    <td>
                                        <?php if ($item->foto == null): ?>
                                        <div class="badge badge-info bg-info">Belum Selesai</div>
                                        <?php endif; ?>
                                        <?php if ($item->foto != null): ?>
                                        <a href="#" class="btn btn-sm btn-primary my-2" id="btnFoto"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFoto<?= $item->id_buku_tamu ?>"><i
                                                class="fa fa-photo-film me-2"></i>Foto Bertamu</a>
                                        <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="modalSelesaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSelesaiLabel">Upload Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('operator/buku-tamu/selesai') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <input type="hidden" id="id_buku_tamu" name="id_buku_tamu" value="" required readonly>
                    <div class="mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check me-2"></i>Selesai
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($tamu as $item): ?>
<div class="modal fade" id="modalFoto<?= $item->id_buku_tamu ?>" tabindex="-1"
    aria-labelledby="modalFoto<?= $item->id_buku_tamu ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFoto<?= $item->id_buku_tamu ?>Label">Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('uploads/foto_tamu/' . $item->foto) ?>" alt="Foto" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
$(document).ready(function() {
    // Initialize DataTable
    if ($.fn.DataTable) {
        $('#bukutamu-table').DataTable({
            "responsive": true,
            "autoWidth": true,
        });
    }

    // Event delegation for 'Selesai' button
    $('#bukutamu-table').on('click', '#btnSelesai', function(event) {
        event.preventDefault();
        const row = $(this).closest('tr');
        $('#id_buku_tamu').val(row.children().eq(0).text());
        $('#modalSelesai').modal('show');
    });
});
</script>

<?= $this->endSection() ?>