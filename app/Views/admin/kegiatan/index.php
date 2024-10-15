<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Data Kegiatan<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Kegiatan</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?=base_url('admin/kegiatan/tambah')?>" class="btn btn-primary"><i
                            class="fa fa-plus fa-sm"></i> Tambah</a>
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
                        <div class="alert-icon">
                            <i class="fa fa-circle-exclamation"></i>
                        </div>
                        <div class="alert-message">
                            <?=session()->getFlashdata('error')?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <div class="alert-icon">
                            <i class="fa fa-circle-check"></i>
                        </div>
                        <div class="alert-message">
                            <?=session()->getFlashdata('success')?>
                        </div>
                    </div>
                    <?php endif;?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="perkembangan-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">No</th>
                                    <th class="text-center align-middle">Penanggung Jawab Kegiatan</th>
                                    <th class="text-center align-middle">Jenis Kategori Layanan</th>
                                    <th class="text-center align-middle">Tanggal Kegiatan</th>
                                    <th class="text-center align-middle">Foto Kegiatan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
$no = 1;
foreach ($kegiatan as $key => $item): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$item->penanggung_jawab_kegiatan?></td>
                                    <td><?=$item->jenis_kategori_layanan?></td>
                                    <td><?=$item->tanggal_kegiatan?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalFoto" data-foto="<?=$item->foto_kegiatan?>"><i
                                                class="fa fa-photo-film me-2"></i>Lihat Foto</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalDetail"
                                            data-pj="<?=$item->penanggung_jawab_kegiatan?>"
                                            data-tk="<?=$item->tanggal_kegiatan?>"
                                            data-jkl="<?=$item->jenis_kategori_layanan?>"
                                            data-dk="<?=$item->deskripsi_kegiatan?>"
                                            data-hk="<?=$item->hasil_kegiatan?>"
                                            data-rtl="<?=$item->rencana_tindak_lanjut?>"><i
                                                class="fa fa-eye me-2"></i>Detail</a>
                                        <a href="<?=base_url('admin/kegiatan/edit/' . $item->id_kegiatan)?>"
                                            class="btn btn-sm btn-warning"><i class="fa fa-edit me-2"></i>Edit</a>
                                        <a href="<?=base_url('admin/kegiatan/hapus/' . $item->id_kegiatan)?>"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash me-2"></i>Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal FOto -->

<div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFotoLabel">Foto Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid " alt="Foto Kegiatan" id="img-viewer">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Data -->

<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Data Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="pj" class="form-label">Penanggung Jawab Kegiatan</label>
                    <input type="text" name="penanggung_jawab_kegiatan" id="pj" class="form-control" disabled value="">
                </div>
                <div class="mb-3">
                    <label for="tk" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" id="tk" class="form-control" disabled value="">
                </div>
                <div class="mb-3">
                    <label for="jkl" class="form-label">Jenis Kategori Kegiatan Layanan</label>
                    <input type="text" name="jenis_kategori_layanan" id="jkl" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="dk" class="form-label">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" id="dk" class="form-control" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="hk" class="form-label">Hasil Kegiatan</label>
                    <textarea name="hasil_kegiatan" id="hk" class="form-control" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="rtl" class="form-label">Rencana Tindak Lanjut</label>
                    <textarea name="rencana_tindak_lanjut" id="rtl" class="form-control" disabled></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->section('script')?>
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

        imgViewer.attr('src', '<?=base_url()?>/uploads/' + recipient)
    })

    $('#modalDetail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pj = button.data('pj')
        var tk = button.data('tk')
        var jkl = button.data('jkl')
        var dk = button.data('dk')
        var hk = button.data('hk')
        var rtl = button.data('rtl')

        var modal = $(this)
        modal.find('[name=penanggung_jawab_kegiatan]').val(pj)
        modal.find('[name=tanggal_kegiatan]').val(tk)
        modal.find('[name=jenis_kategori_layanan]').val(jkl)
        modal.find('[name=deskripsi_kegiatan]').val(dk)
        modal.find('[name=hasil_kegiatan]').val(hk)
        modal.find('[name=rencana_tindak_lanjut]').val(rtl)
    })
})
</script>
<?=$this->endSection()?>