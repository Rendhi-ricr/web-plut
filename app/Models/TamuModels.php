<?php

namespace App\Models;

use CodeIgniter\Model;

class TamuModels extends Model
{
    protected $table = 't_buku_tamu';
    protected $primaryKey = 'id_buku_tamu';
    protected $allowedFields = ['layanan', 'kategori_layanan', 'jam_kedatangan', 'jam_pulang', 'tanggal_kedatangan', 'tanggal_pulang', 'foto'];

    // public function generateKodeGedung($klasifikasi)
    // {
    //     // Validasi klasifikasi
    //     $klasifikasi = strtoupper($klasifikasi);
    //     $validKlasifikasi = ['REK', 'SAP', 'SKM', 'SHH', 'SPP', 'SIK', 'SPD', 'GBL', 'MAP']; // Tambahkan klasifikasi lain jika diperlukan

    //     if (!in_array($klasifikasi, $validKlasifikasi)) {
    //         throw new \InvalidArgumentException('Klasifikasi tidak valid');
    //     }

    //     $builder = $this->db->table($this->table);
    //     $builder->select('kode_gedung');
    //     $builder->where('kode_gedung LIKE', $klasifikasi . '%');
    //     $builder->orderBy('kode_gedung', 'DESC');
    //     $query = $builder->get();

    //     $result = $query->getRow();
    //     $lastKode = $result ? $result->kode_gedung : $klasifikasi . '000';

    //     // Ekstrak bagian numerik dari kode terakhir setelah huruf
    //     $numericPart = substr($lastKode, strlen($klasifikasi));
    //     $lastNumber = is_numeric($numericPart) ? (int)$numericPart : 0;

    //     // Pecah bagian numerik menjadi digit
    //     $numberStr = sprintf('%03d', $lastNumber);

    //     // Temukan posisi digit pertama yang tidak nol untuk menambah
    //     $leadingDigit = intval(substr($numberStr, 0, 1));

    //     // Generate nomor berikutnya dengan menambahkan 1 pada digit pertama
    //     $newLeadingDigit = $leadingDigit + 1;
    //     $nextNumberStr = sprintf('%01d%s', $newLeadingDigit, substr($numberStr, 1));

    //     // Generate kode berikutnya dengan awalan klasifikasi
    //     $nextKode = $klasifikasi . $nextNumberStr;

    //     return $nextKode;
    // }



    // function getAll()
    // {
    //     $builder = $this->db->table('t_umkm');
    //     $builder->join('t_user', 't_user.id_user = t_umkm.id_user');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function data_buku_tamu($id_buku_tamu)
    {
        return $this->find($id_buku_tamu);
    }
    // public function update_data($data, $id_buku)
    // {
    //     $query = $this->db->table($this->table)->update(
    //         $data,
    //         array('id_buku' => $id_buku)
    //     );
    //     return $query;
    // }
    // public function delete_data($id_buku)
    // {
    //     $query = $this->db->table($this->table)->delete(array('id_buku' => $id_buku));
    //     return $query;
    // }
}
