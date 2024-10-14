<?=$this->extend('layouts/base')?>
<?=$this->section('title')?>Data Profil UMKM<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container-fluid p-0">
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Profil UMKM</h1>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <form action="<?=base_url('umkm/profil-umkm/update')?>" method="post">
        <?=csrf_field()?>
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <div class="alert-icon">
                <i class="fa fa-circle-info"></i>
            </div>
            <div class="alert-message">
                <?=session()->getFlashdata('success')?>
            </div>
        </div>
        <?php endif;?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <div class="alert-icon">
                <i class="fa fa-circle-exclamation"></i>
            </div>
            <div class="alert-message">
                <?=session()->getFlashdata('error')?>
            </div>
        </div>
        <?php endif;?>
        <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <div class="alert-icon">
                <i class="fa fa-circle-exclamation"></i>
            </div>
            <div class="alert-message">
                Ada kesalahan dalam pengisian form:
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $name => $error): ?>
                    <li><?=esc($error)?></li>
                    <?php endforeach?>
                </ul>
            </div>
        </div>
        <?php endif;?>
        <div class="card mb-3">
            <div class="card-header">
                DATA PEMILIK
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik_pemilik"
                            value="<?=$umkm->nik_pemilik ?? old('nik_pemilik')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="np" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" id="np" name="nama_pemilik"
                            value="<?=$umkm->nama_pemilik ?? old('nama_pemilik')?>">
                    </div>
                </div>
                <label for="ap" class="form-label">Alamat Pemilik</label>
                <textarea name="alamat_pemilik" id="ap"
                    class="form-control mb-3"><?=$umkm->alamat_pemilik ?? old('alamat_pemilik')?></textarea>
                <div class=" mb-3">

                    <label for="pt" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="pt" name="pendidikan_terakhir">
                        <option selected>Pilih Pendidikan Terakhir</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 'sd' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'sd' ? 'selected' : '')?>
                            value="sd">SD</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 'smp' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'smp' ? 'selected' : '')?>
                            value="smp">SMP</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 'sma' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'sma' ? 'selected' : '')?>
                            value="sma">SMA</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 's1' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's1' ? 'selected' : '')?>
                            value="s1">Sarjana (S1)</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 's2' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's2' ? 'selected' : '')?>
                            value="s2">Magister (S2)</option>
                        <option
                            <?=($umkm->pendidikan_terakhir == 's3' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's3' ? 'selected' : '')?>
                            value="s3">Doktor (S3)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                DATA UMKM
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="nu" class="form-label">Nama UMKM</label>
                    <input type="text" class="form-control" id="nama_umkm" name="nama_umkm"
                        value="<?=$umkm->nama_umkm ?? old('nama_umkm')?>">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha"
                            value="<?=$umkm->jenis_usaha ?? old('jenis_usaha')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="to" class="form-label">Tahun Beroperasi</label>
                        <input type="number" class="form-control" id="to" name="tahun_beroperasi"
                            value="<?=$umkm->tahun_beroperasi ?? old('tahun_beroperasi')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat"
                        class="form-control mb-3"><?=$umkm->alamat ?? old('alamat')?></textarea>
                </div>
                <div class="mb-3">
                    <label for="desa_kel" class="form-label">Desa / Kelurahan</label>
                    <input type="text" class="form-control" id="desa_kel" name="desa_kel"
                        value="<?=$umkm->desa ?? old('desa_kel')?>">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kec" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kec" name="kecamatan"
                            value="<?=$umkm->kecamatan ?? old('kecamatan')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="kp" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kp" name="kode_pos"
                            value="<?=$umkm->kode_pos ?? old('kode_pos')?>">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telp" class="form-label">No. HP UMKM</label>
                        <input type="text" class="form-control" id="telp" name="telp"
                            value="<?=$umkm->telp ?? old('telp')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email UMKM</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?=$umkm->email ?? old('email')?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="wp" class="form-label">Wilayah Pemasaran</label>
                        <input type="text" class="form-control" id="wp" name="wilayah_pemasaran"
                            value="<?=$umkm->wilayah_pemasaran ?? old('wilayah_pemasaran')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="mp" class="form-label">Media Pemasaran</label>
                        <input type="text" class="form-control" id="mp" name="media_pemasaran"
                            value="<?=$umkm->media_pemasaran ?? old('media_pemasaran')?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jms" class="form-label">Jumlah Modal Sendiri</label>
                        <input type="number" class="form-control" id="jms" name="jumlah_modal_sendiri"
                            value="<?=$umkm->jumlah_modal_sendiri ?? old('jumlah_modal_sendiri')?>">
                    </div>
                    <div class="col-md-6">
                        <label for="jmp" class="form-label">Jumlah Modal Pinjaman</label>
                        <input type="number" class="form-control" id="jmp" name="jumlah_modal_pinjaman"
                            value="<?=$umkm->jumlah_modal_pinjaman ?? old('jumlah_modal_pinjaman')?>">
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-2"></i> Simpan
                </button>
            </div>
        </div>
    </form>

    <form action="<?=base_url('umkm/profil-umkm/uploadFile')?>" method="post" enctype="multipart/form-data">
        <?=csrf_field()?>
        <div class="card mb-3">
            <div class="card-header">
                BERKAS PEMILIK
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dn" class="form-label">Dokumen NIB</label>
                        <?php if (isset($umkm->dokumen_nib)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_nib, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_nib, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_nib?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_nib, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_nib, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>
                        <?php else: ?>
                        <input type="file" class="form-control" id="dn" name="dok_nib"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>

                    </div>
                    <div class="col-md-6">
                        <label for="dpirt" class="form-label">Dokumen P-IRT</label>
                        <?php if (isset($umkm->dokumen_pirt)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_pirt, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_pirt, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_pirt?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_pirt, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_pirt, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>

                        <?php else: ?>
                        <input type="file" class="form-control" id="diprt" name="dok_pirt"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dh" class="form-label">Dokumen Halal</label>
                        <?php if (isset($umkm->dokumen_halal)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_halal, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_halal, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_halal?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_halal, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_halal, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>

                        <?php else: ?>
                        <input type="file" class="form-control" id="dh" name="dok_halal"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>
                    </div>
                    <div class="col-md-6">
                        <label for="npwp" class="form-label">Dokumen NPWP</label>
                        <?php if (isset($umkm->dokumen_npwp)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_npwp, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_npwp, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_npwp?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_npwp, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_npwp, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>

                        <?php else: ?>
                        <input type="file" class="form-control" id="npwp" name="dok_npwp"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dlh" class="form-label">Dokumen Laik Hygiene</label>
                        <?php if (isset($umkm->dokumen_lh)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_lh, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_lh, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_lh?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_lh, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_lh, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>

                        <?php else: ?>
                        <input type="file" class="form-control" id="dlh" name="dok_lh"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>
                    </div>
                    <div class="col-md-6">
                        <label for="lainnya" class="form-label">Dokumen Lainnya</label>
                        <?php if (isset($umkm->dokumen_lainnya)): ?>
                        <p>
                            <?=pathinfo($umkm->dokumen_lainnya, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_lainnya, PATHINFO_EXTENSION)?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDokumen"
                                data-file="<?=$umkm->dokumen_lainnya?>" class="btn btn-primary btn-sm rounded-circle"><i
                                    class="far fa-eye"></i></a>
                            <a href="<?=base_url('umkm/profil-umkm/hapusFile/' . pathinfo($umkm->dokumen_lainnya, PATHINFO_FILENAME) . '.' . pathinfo($umkm->dokumen_lainnya, PATHINFO_EXTENSION))?>"
                                class="btn btn-danger btn-sm rounded-circle"><i class="fa fa-trash"></i></a>
                        </p>

                        <?php else: ?>
                        <input type="file" class="form-control" id="lainnya" name="dok_lain"
                            accept="image/png,image/jpg,image/jpeg,.doc,.docx,.pdf">
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-file-upload me-2"></i> Upload
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->

<div class="modal fade" id="modalDokumen" tabindex="-1" aria-labelledby="modalDokumenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDokumenLabel">Dokumen </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">

                <img src="" class="img-fluid" alt="Dokumen " id="img-viewer">

                <iframe src="" width="100%" height="600px" id="pdf-viewer"></iframe>

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
    $('#modalDokumen').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('file')
        var modal = $(this)
        var imgViewer = modal.find('#img-viewer')
        var pdfViewer = modal.find('#pdf-viewer')

        if (recipient.includes('.pdf')) {
            imgViewer.hide()
            pdfViewer.show()
            pdfViewer.attr('src', '<?=base_url()?>/uploads/' + recipient)
        } else {
            imgViewer.show()
            pdfViewer.hide()
            imgViewer.attr('src', '<?=base_url()?>/uploads/' + recipient)
        }
    })
})
</script>
<?=$this->endSection()?>