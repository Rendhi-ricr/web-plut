<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model {
    protected $table = 't_umkm';
    protected $primaryKey = 'kode_umkm';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_umkm',
        'alamat',
        'desa',
        'kecamatan',
        'kode_pos',
        'telp',
        'email',
        'nik_pemilik',
        'nama_pemilik',
        'alamat_pemilik',
        'pendidikan_terakhir',
        'tahun_beroperasi',
        'jenis_usaha',
        'wilayah_pemasaran',
        'media_pemasaran',
        'jumlah_modal_sendiri',
        'jumlah_modal_pinjaman',
        'dokumen_nib',
        'dokumen_pirt',
        'dokumen_halal',
        'dokumen_npwp',
        'dokumen_lh',
        'dokumen_lainnya',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}