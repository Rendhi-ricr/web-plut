<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Data Perkembangan UMKM<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Perkembangan UMKM</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="perkembangan/tambah" class="btn btn-primary"><i class="fa fa-plus me-2"></i> Tambah</a>
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
                                    <th>Nama UMKM</th>
                                    <th>Tahun</th>
                                    <th>Asset</th>
                                    <th>Omzet</th>
                                    <th>Produk Unggulan</th>
                                    <th>Jumlah Tenaga Kerja</th>
                                    <th>Foto Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;foreach ($perkembangan as $key => $item): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$item->nama_umkm?></td>
                                    <td><?=$item->tahun?></td>
                                    <td><?=$item->asset?></td>
                                    <td><?=$item->omzet?></td>
                                    <td><?=$item->produk_unggulan?></td>
                                    <td><?=$item->jumlah_tenaga_kerja?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalFoto" data-foto="<?=$item->foto_produk?>"><i
                                                class="fa fa-photo-film me-2"></i>Lihat Foto</a>
                                    </td>
                                    <td>
                                        <a href="perkembangan/edit/<?=$item->id_perkembangan?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit me-2"></i>Edit</a>
                                        <a href="perkembangan/hapus/<?=$item->id_perkembangan?>"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash me-2"></i>Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
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

<!-- ModalFoto -->
<div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFotoLabel">Foto Produk UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="" class="img-fluid" id="fotoProduk">
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
        var fotoProduk = modal.find('#fotoProduk')

        fotoProduk.attr('src', '<?=base_url()?>/uploads/' + recipient)
    })
})
</script>
<?=$this->endSection()?>