<?php namespace App\Models;

use CodeIgniter\Model;

class Cek_model extends Model
{
	protected $table 		= 'hadits';
	protected $primaryKey 	= 'hadits_id';
	protected $allowedFields = ['hadits_judul',
								'hadits_sabda',
								'hadits_dari',
								'hadits_kata',
								'hadits_arti_indo',
								'hadits_arti_ing',
								'hadits_arti_arab',
								'hadits_riwayat_id',
								'hadits_kitab_id',
								'hadits_penulis_id',
								'hadits_kitab_ayat',
								'hadits_nasab',
								'hadits_desc'
							];    

	// Listing home
	public function home()
	{
		$this->select('*');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->orderBy('hadits_id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
	// Listing
	public function listing($id)
	{
		$this->select('*');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->where(array(	'hadits_kitab_id'=> $id));		
		$this->orderBy(	'hadits_kitab_id' );		
		$query = $this->get();
		return $query->getResultArray();
	}
	// Read
	public function read($id)
	{
		$this->select('*');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->where(array(	'hadits_kitab_id'	=> $id));		
		$query = $this->get();
		return $query->getRowArray();
	}

	// Detail
	public function detail($id)
	{
		$this->select('*');
		$this->where(array(	'hadits_id'	=> $id));
		$query = $this->get();
		return $query->getRowArray();
	}
    // function search($keyword)
    // {
    //     $this->like('hadits_nama',$keyword);
    //     $query  =   $this->get('hadit');
    //     return $query->result();
	// }
	// public function pencarian($kunci) 
	// {
	// 	return $this->table('hadits')->like('hadits_kitab_id', $kunci);
	// }
	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data)
	{
		$this->where('hadits_id');
		$this->replace($data);
	}

	// Delete
	public function hapus($id)
	{
		$this->where('hadits_id',$id);
		$this->delete();
	}
}