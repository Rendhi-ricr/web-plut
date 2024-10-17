<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model {
    protected $table = 't_buku_tamu';
    protected $primaryKey = 'id_buku_tamu';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'kategori_tamu',
        'kode_umkm',
        'nama_tamu',
        'layanan',
        'kategori_layanan',
        'deskripsi',
        'jam_kedatangan',
        'jam_pulang',
        'tanggal_bertamu',
        'foto',
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

    // join table with umkm
    public function getTamu() {
        return $this->select('t_umkm.nama_umkm, t_buku_tamu.*')->join('t_umkm', 't_umkm.kode_umkm = t_buku_tamu.kode_umkm', 'left')->orderBy('jam_pulang', 'ASC')->findAll();
    }
}