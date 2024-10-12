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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama UMKM</th>
                                    <th>Alamat</th>
                                    <th>Desa/Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>NIK Pemilik</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat Pemilik</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Tahun Beroperasi</th>
                                    <th>Jenis Usaha</th>
                                    <th>Wilayah Pemasaran</th>
                                    <th>Media Pemasaran</th>
                                    <th>Jumlah Modal Sendiri</th>
                                    <th>Jumlah Modal Pinjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($umkm as $au) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $au['nama_umkm'] ?></td>
                                        <td><?= $au['alamat'] ?></td>
                                        <td><?= $au['desa'] ?></td>
                                        <td><?= $au['kecamatan'] ?></td>
                                        <td><?= $au['kode_pos'] ?></td>
                                        <td><?= $au['telp'] ?></td>
                                        <td><?= $au['email'] ?></td>
                                        <td><?= $au['nik_pemilik'] ?></td>
                                        <td><?= $au['nama_pemilik'] ?></td>
                                        <td><?= $au['alamat_pemilik'] ?></td>
                                        <td><?= $au['pendidikan_terakhir'] ?></td>
                                        <td><?= $au['tahun_beroperasi'] ?></td>
                                        <td><?= $au['jenis_usaha'] ?></td>
                                        <td><?= $au['wilayah_pemasaran'] ?></td>
                                        <td><?= $au['media_pemasaran'] ?></td>
                                        <td><?= $au['jumlah_modal_sendiri'] ?></td>
                                        <td><?= $au['jumlah_modal_pinjaman'] ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Berkas</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1>Judul Dokumen</h1>
                                        <h1>Preview dokumen</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="text-end mt-3">
                        <button type="button" class="btn btn-success" id="downloadBtn">Download Data Terpilih</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.getElementById('checkAll').onclick = function() {
        var checkboxes = document.querySelectorAll('.select-item');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    document.getElementById('downloadBtn').onclick = function() {
        var selected = [];
        var checkboxes = document.querySelectorAll('.select-item:checked');
        for (var checkbox of checkboxes) {
            selected.push(checkbox.value);
        }

        if (selected.length > 0) {
            var url = '<?= site_url('/puskom/pdm/download') ?>/' + selected.join(',');
            window.location.href = url;
        } else {
            alert('Pilih setidaknya satu data untuk di-download.');
        }
    }
</script>

<?= $this->endSection() ?>