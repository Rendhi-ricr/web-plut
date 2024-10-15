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
                    <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-primary"><i class="fa fa-arrow-left fa-sm"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <form action="<?= base_url('admin/kegiatan/simpan') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    Ada kesalahan dalam pengisian form:
                                    <ul>
                                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <div class="alert-icon">
                                    <i class="fa fa-circle-exclamation"></i>
                                </div>
                                <div class="alert-message">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="tk" class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="tk" id="tk" class="form-control" required value="<?= old('tanggal_kegiatan') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jkl" class="form-label">Jenis Kategori Layanan</label>
                            <select name="jlk" id="jlk" class="form-control">
                                <option value="" selected>Pilih Jenis Kategori Layanan</option>
                                <option value="Konsultasi dan Pendampingan Usaha">Konsultasi dan Pendampingan Usaha</option>
                                <option value="Pendaftaran Usaha Pada Sistem Perizinan Berusaha
                                    Terintegrasi Secara Elektronik">Pendaftaran Usaha Pada Sistem Perizinan Berusaha
                                    Terintegrasi Secara Elektronik</option>
                                <option value="Pelatihan Teknis dan Manajerial">Pelatihan Teknis dan Manajerial</option>
                                <option value="Pemenuhan Sertifikasi dan Standardisasi Produk">Pemenuhan Sertifikasi dan Standardisasi Produk</option>
                                <option value="Pengembangan Produk Unggulan Daerah">Pengembangan Produk Unggulan Daerah</option>
                                <option value="Pengembangan Kemasan Produk">Pengembangan Kemasan Produk</option>
                                <option value="Promosi dan Pemasaran Produk Serta Informasi Pasar">Promosi dan Pemasaran Produk Serta Informasi Pasar</option>
                                <option value="inkubasi Bisnis">Inkubasi Bisnis</option>
                                <option value="Pendataan Koperasi dan Usaha Mikro, Kecil, dan
                                    Menengah, Serta Wirausaha">Pendataan Koperasi dan Usaha Mikro, Kecil, dan
                                    Menengah, Serta Wirausaha</option>
                                <option value="Seleksi Pelaku Usaha dan Kurasi Produk Usaha Mikro dan
                                    Usaha Kecil">Seleksi Pelaku Usaha dan Kurasi Produk Usaha Mikro dan
                                    Usaha Kecil</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dk" class="form-label">Jenis Kategori Layanan</label>
                            <textarea name="dk" id="dk" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hk" class="form-label">Hasil Kegiatan</label>
                            <textarea name="hk" id="hk" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rtl" class="form-label">Rencana Tindak Lanjut</label>
                            <textarea name="rtl" id="rtl" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fk" class="form-label">Foto Kegiatan</label>
                            <input type="file" name="fk" id="fk" class="form-control">
                        </div>


                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>