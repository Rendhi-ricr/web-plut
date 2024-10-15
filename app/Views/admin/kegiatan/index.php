<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Kegiatan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Kegiatan</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus fa-sm"></i> Tambah</a>
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
                                    <th>Tanggal Kegiatan</th>
                                    <th>Jenis Kategori Layanan</th>
                                    <th>Deskripsi Layanan</th>
                                    <th>Hasil Kegiatan</th>
                                    <th>Rencana Tindak Lanjut</th>
                                    <th>Foto Kegiatan</th>
                                    <th>Penanggung Jawab Kegiatan</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kegiatan as $key => $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item->tanggal_kegiatan ?></td>
                                        <td><?= $item->jenis_kategori_layanan ?></td>
                                        <td><?= $item->deskripsi_kegiatan ?></td>
                                        <td><?= $item->hasil_kegiatan ?></td>
                                        <td><?= $item->rencana_tindak_lanjut ?></td>
                                        <td><?= $item->foto_kegiatan ?></td>
                                        <td><?= $item->penanggung_jawab_kegiatan ?></td>
                                        <!-- <td>
                                            <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalFoto" data-foto=""><i
                                                    class="fa fa-photo-film me-2"></i>Lihat Foto</a>
                                        </td> -->
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

<!-- Modal FOto -->

<!-- <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFotoLabel">Foto Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid " alt="Foto Produk" id="img-viewer">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#modalDetail">Tutup</button>
            </div>
        </div>
    </div>
</div> -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {

        let table = $('#perkembangan-table').DataTable({
            "responsive": true,
            "autoWidth": true,
        });

        $('#modalFoto').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('foto')
            var modal = $(this)
            var imgViewer = modal.find('#img-viewer')

            imgViewer.attr('src', '<?= base_url() ?>/uploads/' + recipient)
        })
    })
</script>
<?= $this->endSection() ?>