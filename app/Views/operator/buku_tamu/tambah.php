<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Tambah Tamu<?=$this->endSection()?>

<?=$this->section('content')?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Tambah Tamu</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?=base_url('operator/buku-tamu')?>" class="btn btn-primary"><i
                            class="fa fa-arrow-left me-2"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <div class="card">
        <form id="editor-form" action="<?=base_url('operator/buku-tamu/simpan')?>" method="post"
            enctype="multipart/form-data">
            <?=csrf_field()?>
            <div class="card-body">
                <div class=" mb-3">

                    <label for="kategori_tamu" class="form-label">Kategori Tamu</label>
                    <select name="kategori_tamu" id="kategori_tamu" class="form-select select2">
                        <option value="umkm">UMKM</option>
                        <option value="umum">Umum</option>
                    </select>

                </div>
                <div class="mb-3" id="nama_umkm-form">

                    <label for="nama_umkm" class="form-label">Nama UMKM</label>
                    <select name="nama_umkm" id="nama_umkm" class="form-select select2">
                        <option value="">Pilih / Cari UMKM</option>
                        <?php foreach($umkm as $item): ?>
                        <option value="<?= $item->kode_umkm ?>"><?= $item->nama_umkm ?></option>
                        <?php endforeach; ?>
                        <option value="umkm_lainnya">Tidak Terdaftar</option>
                    </select>

                </div>
                <div class="mb-3 d-none" id="nama_tamu-form">
                    <label for="nama_tamu" class="form-label">Nama Tamu</label>
                    <input type="text" name="nama_tamu" id="nama_tamu" class="form-control">
                </div>
                <div class=" mb-3">

                    <label for="layanan" class="form-label">Layanan</label>
                    <select class="form-select select2" id="layanan" name="layanan">
                        <option>Pilih Layanan</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Pembiayaan">Pembiayaan</option>
                        <option value="SDM">SDM</option>
                        <option value="Kelembagaan">Kelembagaan</option>
                    </select>

                </div>

                <div class="mb-3">

                    <label for="kategori_layanan" class="form-label">Kategori Layanan</label>
                    <select class="form-select select2" id="kategori_layanan" name="kategori_layanan">
                        <option>Cari Kategori Layanan</option>
                        <option>Konsultasi dan Pendampingan usaha</option>
                        <option>Pendaftaran usaha pada sistem perizinan berusaha
                            terintegrasi secara elektronik</option>
                        <option>Pelatihan teknis dan manajerial</option>
                        <option>Pemenuhan sertifikasi dan standardisasi produk</option>
                        <option>Pengembangan produk unggulan daerah</option>
                        <option>Pengembangan kemasan produk</option>
                        <option>Promosi dan pemasaran produk serta informasi pasar</option>
                        <option>Inkubasi bisnis</option>
                        <option>Pendataan Koperasi dan Usaha Mikro, Kecil, dan
                            Menengah, serta Wirausaha</option>
                        <option>Seleksi pelaku usaha dan kurasi produk Usaha Mikro dan
                            Usaha Kecil</option>
                    </select>

                </div>

                <div class=" mb-3">

                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>

                </div>
                <!-- Akhir Bagian Input File -->

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!--/ Tambah::End -->
</div>
<?=$this->endSection()?>

<?=$this->section('script')?>
<script>
$(document).ready(function() {
    // kategori tamu change
    $('#kategori_tamu').change(function() {
        var kategori_tamu = $(this).val();
        if (kategori_tamu == 'umum') {
            $('#nama_umkm-form').removeClass('d-block').addClass('d-none');
            $('#nama_tamu-form').removeClass('d-none').addClass('d-block');
            $('#nama_tamu').prop('disabled', false);
        } else {
            $('#nama_umkm-form').removeClass('d-none').addClass('d-block');
            $('#nama_tamu-form').removeClass('d-block').addClass('d-none');
            $('#nama_tamu').prop('disabled', true);
        }
    });
});
</script>
<?=$this->endSection()?>