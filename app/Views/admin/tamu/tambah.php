<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Tamu<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Tambah Tamu</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <a href="<?= base_url('admin/tamu') ?>" class="btn btn-primary"><i
                            class="fa fa-arrow-left me-2"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <div class="card">
        <form id="editor-form" action="<?= base_url('admin/tamu') ?>" method="post"
            enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select class="form-select" id="layanan" name="layanan">
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
                        <select class="form-select" id="kategori_layanan" name="kategori_layanan">
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

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!--/ Tambah::End -->
</div>
<?= $this->endSection() ?>