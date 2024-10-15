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
                    <a href="<?=base_url('admin/kegiatan')?>" class="btn btn-primary"><i
                            class="fa fa-arrow-left fa-sm"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <form action="<?=base_url('admin/kegiatan/simpan')?>" method="post" enctype="multipart/form-data">
                    <?=csrf_field()?>
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
                                    <li><?=$error?></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <?php endif;?>
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
                        <div class="mb-3">
                            <label for="pj" class="form-label">Penanggung Jawab Kegiatan</label>
                            <input type="text" name="penanggung_jawab_kegiatan" id="pj" class="form-control" required
                                value="<?=old('penanggung_jawab_kegiatan')?>">
                        </div>
                        <div class="mb-3">
                            <label for="tk" class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tk" class="form-control" required
                                value="<?=old('tanggal_kegiatan')?>">
                        </div>
                        <div class="mb-3">
                            <label for="jkl" class="form-label">Jenis Kategori Kegiatan Layanan</label>
                            <select name="jenis_kategori_layanan" id="jlk" class="form-control">
                                <option selected>Pilih Jenis Kategori Kegiatan Layanan</option>
                                <option <?=old('jenis_kategori_layanan') == '' ? 'selected' : ''?>
                                    value="Konsultasi dan Pendampingan Usaha">Konsultasi dan Pendampingan Usaha
                                </option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pendaftaran Usaha Pada Sistem Perizinan Berusaha Terintegrasi Secara Elektronik' ? 'selected' : ''?>
                                    value="Pendaftaran Usaha Pada Sistem Perizinan Berusaha
                                    Terintegrasi Secara Elektronik">Pendaftaran Usaha Pada Sistem Perizinan Berusaha
                                    Terintegrasi Secara Elektronik</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pelatihan Teknis dan Manajerial' ? 'selected' : ''?>
                                    value="Pelatihan Teknis dan Manajerial">Pelatihan Teknis dan Manajerial</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pemenuhan Sertifikasi dan Standardisasi Produk' ? 'selected' : ''?>
                                    value="Pemenuhan Sertifikasi dan Standardisasi Produk">Pemenuhan Sertifikasi dan
                                    Standardisasi Produk</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pengembangan Produk Unggulan Daerah' ? 'selected' : ''?>
                                    value="Pengembangan Produk Unggulan Daerah">Pengembangan Produk Unggulan Daerah
                                </option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pengembangan Kemasan Produk' ? 'selected' : ''?>
                                    value="Pengembangan Kemasan Produk">Pengembangan Kemasan Produk</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Promosi dan Pemasaran Produk Serta Informasi Pasar' ? 'selected' : ''?>
                                    value="Promosi dan Pemasaran Produk Serta Informasi Pasar">Promosi dan Pemasaran
                                    Produk Serta Informasi Pasar</option>
                                <option <?=old('jenis_kategori_layanan') === 'Inkubasi Bisnis' ? 'selected' : ''?>
                                    value="Inkubasi Bisnis">Inkubasi Bisnis</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Pendataan Koperasi dan Usaha Mikro, Kecil, dan Menengah, Serta Wirausaha' ? 'selected' : ''?>
                                    value="Pendataan Koperasi dan Usaha Mikro, Kecil, dan
                                    Menengah, Serta Wirausaha">Pendataan Koperasi dan Usaha Mikro, Kecil, dan
                                    Menengah, Serta Wirausaha</option>
                                <option
                                    <?=old('jenis_kategori_layanan') === 'Seleksi Pelaku Usaha dan Kurasi Produk Usaha Mikro dan Usaha Kecil' ? 'selected' : ''?>
                                    value="Seleksi Pelaku Usaha dan Kurasi Produk Usaha Mikro dan
                                    Usaha Kecil">Seleksi Pelaku Usaha dan Kurasi Produk Usaha Mikro dan
                                    Usaha Kecil</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dk" class="form-label">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" id="dk" class="form-control"
                                required><?=old('deskripsi_kegiatan')?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hk" class="form-label">Hasil Kegiatan</label>
                            <textarea name="hasil_kegiatan" id="hk"
                                class="form-control"><?=old('hasil_kegiatan')?></textarea>
                            <small class="text-danger">* Dapat di isi nanti bila kegiatan masih berlangsung</small>
                        </div>
                        <div class="mb-3">
                            <label for="rtl" class="form-label">Rencana Tindak Lanjut</label>
                            <textarea name="rencana_tindak_lanjut" id="rtl" class="form-control"
                                required><?=old('rencana_tindak_lanjut')?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fk" class="form-label">Foto Kegiatan</label>
                            <input type="file" name="foto_kegiatan" id="fk" class="form-control" required>
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



<?=$this->endSection()?>

<?=$this->section('script')?>
<script>
$(document).ready(function() {
    $('#tk').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<?=$this->endSection()?>