<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Perkembangan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Perkembangan</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('umkm/perkembangan/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="nama_umkm" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control" value="Nama UMKM Mengambil Nama Dari UMKM Yang Masuk" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="omzet">Omzet</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="pu">Produk Unggulan</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="fp">Foto Produk</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="jtk">Jumlah Tenaga Kerja</label>
                        <input type="number" class="form-control">
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