<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data UMKM<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data UMKM</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <!-- <a href="" class="btn btn-primary"><i class="ti ti-plus ti-sm"></i> Tambah</a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success">
                            <div class="alert-icon">
                                <i class="fa fa-circle-info"></i>
                            </div>
                            <div class="alert-message">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('error')): ?>
                        <div class="alert alert-danger">
                            <div class="alert-icon">
                                <i class="fa fa-circle-exclamation"></i>
                            </div>
                            <div class="alert-message">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataumkm-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama UMKM</th>
                                    <th style="max-width: 200px;">Alamat</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Nama Pemilik</th>
                                    <th>Tahun Beroperasi</th>
                                    <th>Jenis Usaha</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($umkm as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item->nama_umkm ?></td>
                                        <td><?= $item->alamat ?></td>
                                        <td><?= $item->telp ?></td>
                                        <td><?= $item->email ?></td>
                                        <td><?= $item->nama_pemilik ?></td>
                                        <td><?= $item->tahun_beroperasi ?></td>
                                        <td><?= $item->jenis_usaha ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-dokumen_nib="<?= $item->dokumen_nib ?>"
                                                data-dokumen_pirt="<?= $item->dokumen_pirt ?>"
                                                data-dokumen_halal="<?= $item->dokumen_halal ?>"
                                                data-dokumen_npwp="<?= $item->dokumen_npwp ?>"
                                                data-dokumen_lh="<?= $item->dokumen_lh ?>"
                                                data-dokumen_lainnya="<?= $item->dokumen_lainnya ?>"
                                                data-bs-target="#modalBerkas"><i
                                                    class="fa fa-file-circle-check me-2"></i>Lihat
                                                Berkas</button>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalDetail<?= $item->kode_umkm ?>"><i
                                                    class="fa fa-info-circle me-2"></i>Detail</button>
                                            <a href="<?= base_url('admin/umkm/hapus/' . $item->kode_umkm) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash me-2"></i>Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBerkas" tabindex="-1" aria-labelledby="modalBerkasLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBerkasLabel">Daftar Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="dokumen_nib-tab" data-bs-toggle="tab"
                            data-bs-target="#dokumen_nib" type="button" role="tab" aria-controls="dokumen_nib"
                            aria-selected="true">Dokumen NIB</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen_pirt-tab" data-bs-toggle="tab"
                            data-bs-target="#dokumen_pirt" type="button" role="tab" aria-controls="dokumen_pirt"
                            aria-selected="false">Dokumen P-IRT</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen_halal-tab" data-bs-toggle="tab"
                            data-bs-target="#dokumen_halal" type="button" role="tab" aria-controls="dokumen_halal"
                            aria-selected="false">Dokumen Halal</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen_npwp-tab" data-bs-toggle="tab"
                            data-bs-target="#dokumen_npwp" type="button" role="tab" aria-controls="dokumen_npwp"
                            aria-selected="false">Dokumen NPWP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen_lh-tab" data-bs-toggle="tab" data-bs-target="#dokumen_lh"
                            type="button" role="tab" aria-controls="dokumen_lh" aria-selected="false">Dokumen Laik
                            Hygiene</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dokumen_lainnya-tab" data-bs-toggle="tab"
                            data-bs-target="#dokumen_lainnya" type="button" role="tab" aria-controls="dokumen_lainnya"
                            aria-selected="false">Dokumen Lainnya</button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="dokumen_nib" role="tabpanel" aria-labelledby="dokumen_nib-tab"
                        tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_nib">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_nib"></iframe>
                    </div>
                    <div class="tab-pane" id="dokumen_pirt" role="tabpanel" aria-labelledby="dokumen_pirt-tab"
                        tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_pirt">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_pirt"></iframe>
                    </div>
                    <div class="tab-pane" id="dokumen_halal" role="tabpanel" aria-labelledby="dokumen_halal-tab"
                        tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_halal">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_halal"></iframe>
                    </div>
                    <div class="tab-pane" id="dokumen_npwp" role="tabpanel" aria-labelledby="dokumen_npwp-tab"
                        tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_npwp">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_npwp"></iframe>
                    </div>
                    <div class="tab-pane" id="dokumen_lh" role="tabpanel" aria-labelledby="dokumen_lh-tab" tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_lh">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_lh"></iframe>
                    </div>
                    <div class="tab-pane" id="dokumen_lainnya" role="tabpanel" aria-labelledby="dokumen_lainnya-tab"
                        tabindex="0">
                        <img src="" class="img-fluid " alt="Dokumen " id="img-viewer_lainnya">

                        <iframe src="" width="100%" height="600px" class="" id="pdf-viewer_lainnya"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail UMKM -->
<?php foreach ($umkm as $item): ?>
    <div class="modal fade" id="modalDetail<?= $item->kode_umkm ?>" tabindex="-1"
        aria-labelledby="modalDetail<?= $item->kode_umkm ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetail<?= $item->kode_umkm ?>Label">Detail UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab<?= $item->kode_umkm ?>" role="tablist">
                        <li class="nav-item " role="presentation">
                            <button class="nav-link active" id="informasi_umkm<?= $item->kode_umkm ?>-tab" data-bs-toggle="tab"
                                data-bs-target="#informasi_umkm<?= $item->kode_umkm ?>" type="button" role="tab" aria-controls="informasi_umkm<?= $item->kode_umkm ?>"
                                aria-selected="true">Informasi UMKM</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="informasi_perkembangan<?= $item->kode_umkm ?>-tab"
                                data-bs-toggle="tab" data-bs-target="#informasi_perkembangan<?= $item->kode_umkm ?>"
                                type="button" role="tab" aria-controls="informasi_perkembangan<?= $item->kode_umkm ?>"
                                aria-selected="false">Informasi Perkembangan</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="informasi_umkm<?= $item->kode_umkm ?>" role="tabpanel"
                            aria-labelledby="informasi_umkm-tab" tabindex="0">
                            <div class="my-3 border-bottom border-2">
                                <h5 class="mt-3 font-weight-bolder font-italic fs-4">DATA PEMILIK UMKM</h5>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik_pemilik" disabled
                                        value="<?= $item->nik_pemilik ?? old('nik_pemilik') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="np" class="form-label">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="np" name="nama_pemilik" disabled
                                        value="<?= $item->nama_pemilik ?? old('nama_pemilik') ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ap" class="form-label">Alamat Pemilik</label>
                                <textarea name="alamat_pemilik" id="ap" disabled
                                    class="form-control mb-3"><?= $item->alamat_pemilik ?? old('alamat_pemilik') ?></textarea>
                            </div>
                            <div class=" mb-3">
                                <label for="pt" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-select" id="pt" name="pendidikan_terakhir" disabled>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 'sd' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'sd' ? 'selected' : '') ?>
                                        value="sd">SD</option>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 'smp' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'smp' ? 'selected' : '') ?>
                                        value="smp">SMP</option>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 'sma' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 'sma' ? 'selected' : '') ?>
                                        value="sma">SMA</option>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 's1' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's1' ? 'selected' : '') ?>
                                        value="s1">Sarjana (S1)</option>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 's2' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's2' ? 'selected' : '') ?>
                                        value="s2">Magister (S2)</option>
                                    <option
                                        <?= ($item->pendidikan_terakhir == 's3' ? 'selected' : '') ?? (old('pendidikan_terakhir') == 's3' ? 'selected' : '') ?>
                                        value="s3">Doktor (S3)</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-5 border-bottom border-2">
                                <h5 class="mt-3 font-weight-bolder font-italic fs-4">DATA UMKM</h5>
                            </div>
                            <div class="mb-3">
                                <label for="nu" class="form-label">Nama UMKM</label>
                                <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" disabled
                                    value="<?= $item->nama_umkm ?? old('nama_umkm') ?>">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" disabled
                                        value="<?= $item->jenis_usaha ?? old('jenis_usaha') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="to" class="form-label">Tahun Beroperasi</label>
                                    <input type="number" class="form-control" id="to" name="tahun_beroperasi" disabled
                                        value="<?= $item->tahun_beroperasi ?? old('tahun_beroperasi') ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" disabled
                                    class="form-control mb-3"><?= $item->alamat ?? old('alamat') ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="desa_kel" class="form-label">Desa / Kelurahan</label>
                                <input type="text" class="form-control" id="desa_kel" name="desa_kel" disabled
                                    value="<?= $item->desa ?? old('desa_kel') ?>">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kec" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="kec" name="kecamatan" disabled
                                        value="<?= $item->kecamatan ?? old('kecamatan') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="kp" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="kp" name="kode_pos" disabled
                                        value="<?= $item->kode_pos ?? old('kode_pos') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="telp" class="form-label">No. HP UMKM</label>
                                    <input type="text" class="form-control" id="telp" name="telp" disabled
                                        value="<?= $item->telp ?? old('telp') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email UMKM</label>
                                    <input type="email" class="form-control" id="email" name="email" disabled
                                        value="<?= $item->email ?? old('email') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="wp" class="form-label">Wilayah Pemasaran</label>
                                    <input type="text" class="form-control" id="wp" name="wilayah_pemasaran" disabled
                                        value="<?= $item->wilayah_pemasaran ?? old('wilayah_pemasaran') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="mp" class="form-label">Media Pemasaran</label>
                                    <input type="text" class="form-control" id="mp" name="media_pemasaran" disabled
                                        value="<?= $item->media_pemasaran ?? old('media_pemasaran') ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jms" class="form-label">Jumlah Modal Sendiri</label>
                                    <input type="number" class="form-control" id="jms" name="jumlah_modal_sendiri" disabled
                                        value="<?= $item->jumlah_modal_sendiri ?? old('jumlah_modal_sendiri') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="jmp" class="form-label">Jumlah Modal Pinjaman</label>
                                    <input type="number" class="form-control" id="jmp" name="jumlah_modal_pinjaman" disabled
                                        value="<?= $item->jumlah_modal_pinjaman ?? old('jumlah_modal_pinjaman') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="informasi_perkembangan<?= $item->kode_umkm ?>" role="tabpanel"
                            aria-labelledby="informasi_perkembangan<?= $item->kode_umkm ?>-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Asset</th>
                                            <th>Omzet</th>
                                            <th>Produk Unggulan</th>
                                            <th>Jumlah Tenaga Kerja</th>
                                            <th>Foto Produk</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach (model('UmkmPerkembanganModel')->joinUmkm($item->kode_umkm) as $key => $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->tahun ?></td>
                                                <td><?= $row->asset ?></td>
                                                <td><?= $row->omzet ?></td>
                                                <td><?= $row->produk_unggulan ?></td>
                                                <td><?= $row->jumlah_tenaga_kerja ?></td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#modalFoto"
                                                        data-prev-modal="#modalDetail<?= $item->kode_umkm ?>"
                                                        data-foto="<?= $row->foto_produk ?>"><i
                                                            class="fa fa-photo-film me-2"></i>Lihat Foto</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Foto Produk -->

    <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFotoLabel">Foto Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid " alt="Foto Produk" id="img-viewer">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#modalDetail">Tutup</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>


<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#dataumkm-table').DataTable({
            "responsive": true,
            "autoWidth": true,
        });

        $('#modalBerkas').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            var dokumenNIB = button.data('dokumen_nib')
            var dokumenPIRT = button.data('dokumen_pirt')
            var dokumenHalal = button.data('dokumen_halal')
            var dokumenNPWP = button.data('dokumen_npwp')
            var dokumenLH = button.data('dokumen_lh')
            var dokumenLainnya = button.data('dokumen_lainnya')

            var imgViewerNIB = modal.find('#img-viewer_nib')
            var pdfViewerNIB = modal.find('#pdf-viewer_nib')
            var imgViewerPIRT = modal.find('#img-viewer_pirt')
            var pdfViewerPIRT = modal.find('#pdf-viewer_pirt')
            var imgViewerHalal = modal.find('#img-viewer_halal')
            var pdfViewerHalal = modal.find('#pdf-viewer_halal')
            var imgViewerNPWP = modal.find('#img-viewer_npwp')
            var pdfViewerNPWP = modal.find('#pdf-viewer_npwp')
            var imgViewerLh = modal.find('#img-viewer_lh')
            var pdfViewerLh = modal.find('#pdf-viewer_lh')
            var imgViewerLainnya = modal.find('#img-viewer_lainnya')
            var pdfViewerLainnya = modal.find('#pdf-viewer_lainnya')

            if (dokumenNIB) {
                if (dokumenNIB.includes('.pdf')) {
                    imgViewerNIB.hide()
                    pdfViewerNIB.show()
                    pdfViewerNIB.attr('src', '<?= base_url() ?>uploads/' + dokumenNIB)
                } else {
                    imgViewerNIB.show()
                    pdfViewerNIB.hide()
                    imgViewerNIB.attr('src', '<?= base_url() ?>uploads/' + dokumenNIB)
                }
            } else {
                imgViewerNIB.hide()
                pdfViewerNIB.hide()
            }

            if (dokumenPIRT) {
                if (dokumenPIRT.includes('.pdf')) {
                    imgViewerPIRT.hide()
                    pdfViewerPIRT.show()
                    pdfViewerPIRT.attr('src', '<?= base_url() ?>uploads/' + dokumenPIRT)
                } else {
                    imgViewerPIRT.show()
                    pdfViewerPIRT.hide()
                    imgViewerPIRT.attr('src', '<?= base_url() ?>uploads/' + dokumenPIRT)
                }
            } else {
                imgViewerPIRT.hide()
                pdfViewerPIRT.hide()
            }

            if (dokumenHalal) {
                if (dokumenHalal.includes('.pdf')) {
                    imgViewerHalal.hide()
                    pdfViewerHalal.show()
                    pdfViewerHalal.attr('src', '<?= base_url() ?>uploads/' + dokumenHalal)
                } else {
                    imgViewerHalal.show()
                    pdfViewerHalal.hide()
                    imgViewerHalal.attr('src', '<?= base_url() ?>uploads/' + dokumenHalal)
                }
            } else {
                imgViewerHalal.hide()
                pdfViewerHalal.hide()
            }

            if (dokumenNPWP) {
                if (dokumenNPWP.includes('.pdf')) {
                    imgViewerNPWP.hide()
                    pdfViewerNPWP.show()
                    pdfViewerNPWP.attr('src', '<?= base_url() ?>uploads/' + dokumenNPWP)
                } else {
                    imgViewerNPWP.show()
                    pdfViewerNPWP.hide()
                    imgViewerNPWP.attr('src', '<?= base_url() ?>uploads/' + dokumenNPWP)
                }
            } else {
                imgViewerNPWP.hide()
                pdfViewerNPWP.hide()
            }

            if (dokumenLH) {
                if (dokumenLH.includes('.pdf')) {
                    imgViewerLh.hide()
                    pdfViewerLh.show()
                    pdfViewerLh.attr('src', '<?= base_url() ?>uploads/' + dokumenLH)
                } else {
                    imgViewerLh.show()
                    pdfViewerLh.hide()
                    imgViewerLh.attr('src', '<?= base_url() ?>uploads/' + dokumenLH)
                }
            } else {
                imgViewerLh.hide()
                pdfViewerLh.hide()
            }

            if (dokumenLainnya) {
                if (dokumenLainnya.includes('.pdf')) {
                    imgViewerLainnya.hide()
                    pdfViewerLainnya.show()
                    pdfViewerLainnya.attr('src', '<?= base_url() ?>uploads/' + dokumenLainnya)
                } else {
                    imgViewerLainnya.show()
                    pdfViewerLainnya.hide()
                    imgViewerLainnya.attr('src', '<?= base_url() ?>uploads/' + dokumenLainnya)
                }
            } else {
                imgViewerLainnya.hide()
                pdfViewerLainnya.hide()
            }

        })

        $('#modalFoto').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('foto')
            var modal = $(this)
            var fotoProduk = modal.find('#img-viewer')

            var prevModal = button.data('prev-modal')
            //set data-bs-target
            modal.find('.modal-footer button').attr('data-bs-target', prevModal)

            fotoProduk.attr('src', '<?= base_url() ?>uploads/' + recipient)
        })

    });
</script>
<?= $this->endSection() ?>