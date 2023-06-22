<?php

namespace App\Models;
use CodeIgniter\Model;

class M_klaster extends Model
{
	
	protected $DBGroup              = 'default';
	protected $table                = 'umkm';
	protected $returnType           = 'object';
    protected $primaryKey = 'id_umkm';
	//protected $useTimestamps = true;
	protected $allowedFields        = [
        'id_umkm',
		'id_user',
		'nib',
		'nama_pemilik',
		'nama_usaha',
		'id_sektor',
		'alamat',
		'id_kecamatan',
		'latitude',
		'longitude',
		'foto',
		'modal_usaha',
		'hasil_penjualan',
		'jmlh_tenaga_kerja',
		'tahun',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function get_tahun()
	{
        $builder = $this->db->table('umkm');
        $builder->select('tahun');
        $builder->distinct();
        $query = $builder->get();
        return $query;  
	}

    public function get_umkm_klaster($tahun)
    {
        return $this->db->table('umkm')
        ->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan')
        ->where('tahun', $tahun)
        ->get()
        ->getResult();
    }

    public function get_umkm_rand($tahun, $limit)
    {
        return $this->db->table('umkm')
        ->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan')
        ->where('tahun', $tahun)
        ->orderBy('rand()')
        ->limit($limit)
        ->get()
        ->getResult();

    }

    public function get_hasil()
	{
        return $this->db->table('hasil_klaster')
        ->join('umkm', 'umkm.id_umkm = hasil_klaster.id_umkm')
        // ->join('kecamatan', 'kecamatan.id_kecamatan = hasil_kluster.id_kecamatan')
        ->get()
        ->getResultArray();
	}
	
}