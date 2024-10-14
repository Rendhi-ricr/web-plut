<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Edit Perkembangan<?=$this->endSection()?>

<?=$this->section('content')?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Edit Data Perkembangan</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?=base_url('umkm/perkembangan')?>" class="btn btn-primary"><i
                            class="fa fa-arrow-left me-2"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?=base_url('umkm/perkembangan/update/' . $perkembangan->id_perkembangan)?>"
        method="post" enctype="multipart/form-data">
        <?=csrf_field()?>
        <div class="card">
            <div class="card-body">
                <!-- Foto -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <img src="<?=base_url('uploads/' . $perkembangan->foto_produk)?>" class="img-fluid mb-3"
                            width="300" alt="Foto Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="nama_umkm" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control" value="<?=$perkembangan->nama_umkm?>" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="year" class="form-control" id="tahun" name="tahun"
                            value="<?=$perkembangan->tahun ?? old('tahun')?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="asset">Asset</label>
                        <input type="number" class="form-control" id="asset" name="asset"
                            value="<?=$perkembangan->asset ?? old('asset')?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="omzet">Omzet</label>
                        <input type="number" class="form-control" id="omzet" name="omzet"
                            value="<?=$perkembangan->omzet ?? old('omzet')?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="pu">Produk Unggulan</label>
                        <input type="text" class="form-control" id="pu" name="produk_unggulan"
                            value="<?=$perkembangan->produk_unggulan ?? old('produk_unggulan')?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="fp">Foto Produk</label>
                        <input type="file" class="form-control" id="fp" name="foto_produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="jtk">Jumlah Tenaga Kerja</label>
                        <input type="number" class="form-control" id="jtk" name="jumlah_tenaga_kerja"
                            value="<?=$perkembangan->jumlah_tenaga_kerja ?? old('jumlah_tenaga_kerja')?>" required>
                    </div>
                </div>
                <!-- Akhir Bagian Input File -->
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Perbaharui</button>
            </div>
        </div>
    </form>
    <!--/ Tambah::End -->
</div>
<?=$this->endSection()?>

<?=$this->section('script')?>

<script>
$(document).ready(function() {
    $('#tahun').datepicker({
        format: 'yyyy',
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });
});
</script>

<?=$this->endSection()?>