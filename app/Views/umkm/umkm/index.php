<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Perkembangan UMKM<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">
    <div class="card mb-3">
        <div class="card-header">
            DATA PEMILIK
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik">
                </div>
                <div class="col-md-6">
                    <label for="np" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" id="np">
                </div>
            </div>
            <label for="ap" class="form-label">Alamat Pemilik</label>
            <textarea name="alamat" id="ap" class="form-control mb-3"></textarea>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pt" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="pt">
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>Sarjana (S1)</option>
                        <option>Magister (S2)</option>
                        <option>Doktor (S3)</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            DATA UMKM
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nu" class="form-label">Nama UMKM</label>
                    <input type="text" class="form-control" id="nu">
                </div>
                <div class="col-md-6">
                    <label for="kec" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="kec">
                </div>
            </div>
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control mb-3"></textarea>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="desa" class="form-label">Desa</label>
                    <input type="text" class="form-control" id="desa">
                </div>
                <div class="col-md-6">
                    <label for="kp" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="kp">
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telp" class="form-label">No. Hp</label>
                    <input type="text" class="form-control" id="telp">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="to" class="form-label">Tahun Beroperasi</label>
                    <input type="text" class="form-control" id="to">
                </div>
                <div class="col-md-6">
                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                    <input type="text" class="form-control" id="jenis_usaha">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="wp" class="form-label">Wilayah Pemasaran</label>
                    <input type="text" class="form-control" id="wp">
                </div>
                <div class="col-md-6">
                    <label for="mp" class="form-label">Media Pemasaran</label>
                    <input type="text" class="form-control" id="mp">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jms" class="form-label">Jumlah Modal Sendiri</label>
                    <input type="number" class="form-control" id="jms">
                </div>
                <div class="col-md-6">
                    <label for="jmp" class="form-label">Jumlah Modal Pinjaman</label>
                    <input type="number" class="form-control" id="jmp">
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            BERKAS PEMILIK
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dn" class="form-label">Dokumen NIB</label>
                    <input type="file" class="form-control" id="dn">
                </div>
                <div class="col-md-6">
                    <label for="dpirt" class="form-label">Dokumen P-IRT</label>
                    <input type="file" class="form-control" id="diprt">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dh" class="form-label">Dokumen Halal</label>
                    <input type="file" class="form-control" id="dh">
                </div>
                <div class="col-md-6">
                    <label for="npwp" class="form-label">Dokumen NPWP</label>
                    <input type="file" class="form-control" id="npwp">
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="dlh" class="form-label">Dokumen Laik Hygiene</label>
                    <input type="file" class="form-control" id="dlh">
                </div>
                <div class="col-md-6">
                    <label for="lainnya" class="form-label">Dokumen Lainnya</label>
                    <input type="file" class="form-control" id="lainnya">
                </div>

            </div>
        </div>
    </div>

    <!-- Lengkapi Data Anda -->


</div>

<?= $this->endSection() ?>