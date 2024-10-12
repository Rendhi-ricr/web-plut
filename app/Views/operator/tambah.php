<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Tamu<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Tamu</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('operator/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select class="form-select" id="layanan">
                            <option>Cari Layanan</option>
                            <option>Produksi</option>
                            <option>Pemasaran</option>
                            <option>Pembiayaan</option>
                            <option>SDM</option>
                            <option>Kelembagaan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="kategori_layanan" class="form-label">Kategori Layanan</label>
                        <select class="form-select" id="kategori_layanan">
                            <option>Cari Kategori Layanan</option>
                            <option>konsultasi dan Pendampingan usaha</option>
                            <option>pendaftaran usaha pada sistem perizinan berusaha
                                terintegrasi secara elektronik</option>
                            <option>pelatihan teknis dan manajerial</option>
                            <option>pemenuhan sertifikasi dan standardisasi produk</option>
                            <option>pengembangan produk unggulan daerah</option>
                            <option>pengembangan kemasan produk</option>
                            <option>promosi dan pemasaran produk serta informasi pasar</option>
                            <option>Inkubasi bisnis</option>
                            <option>pendataan Koperasi dan Usaha Mikro, Kecil, dan
                                Menengah, serta Wirausaha</option>
                            <option>seleksi pelaku usaha dan kurasi produk Usaha Mikro dan
                                Usaha Kecil</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                </div>
                <!-- Akhir Bagian Input File -->

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <!--/ Tambah::End -->
</div>
<?= $this->endSection() ?>