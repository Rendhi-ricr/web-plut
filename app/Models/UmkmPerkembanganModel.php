<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmPerkembanganModel extends Model {
    protected $table = 't_umkm_perkembangan';
    protected $primaryKey = 'id_perkembangan';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'kode_umkm',
        'tahun',
        'asset',
        'omzet',
        'produk_unggulan',
        'foto_produk',
        'jumlah_tenaga_kerja',
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

    public function getPerkembanganByUmkm($kode_umkm) {
        return $this->where('kode_umkm', $kode_umkm)->findAll();
    }

    public function getPerkembanganById($id_perkembangan) {
        // find and join
        return $this->join('t_umkm', 't_umkm.kode_umkm = t_umkm_perkembangan.kode_umkm')
            ->find($id_perkembangan);
    }

    public function joinUmkm($kode_umkm) {
        return $this->join('t_umkm', 't_umkm.kode_umkm = t_umkm_perkembangan.kode_umkm')
            ->where('t_umkm_perkembangan.kode_umkm', $kode_umkm)
            ->findAll();
    }

    public function getAllPerkembangan() {
        return $this->join('t_umkm', 't_umkm.kode_umkm = t_umkm_perkembangan.kode_umkm')
            ->findAll();
    }
}