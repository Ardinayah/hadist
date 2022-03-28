<?php namespace App\Models;

use CodeIgniter\Model;

class Kitab_model extends Model
{
	protected $table 		= 'kitab';
	protected $primaryKey 	= 'kitab_id';
	protected $allowedFields = ['kitab_nama',
								'kitab_desc',
								'kitab_penulis_id'];
	
	// Listing
	public function listing()
	{
		$this->select('*,LEFT(kitab_desc, 168) AS rmd');
        $this->select('kitab.*, apenulis.penulis AS penulisnya');
		$this->join('apenulis','apenulis.penulis_id = kitab.kitab_penulis_id');
		$this->orderBy('kitab_id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}

	// Detail
	public function detail($id)
	{
		$this->select('*');
        // $this->select('kitab.*, apenulis.penulis AS penulisnya');
		// $this->join('apenulis','apenulis.id = kitab.kitab_penulis_id');
		$this->where(array(	'kitab_id'	=> $id));
		$query = $this->get();
		return $query->getRowArray();


		//$this->where(array(	'status_berita'	=> 'Publish',
		//					'id_berita'		=> $id_berita));


	}
	//Cari
	public function get_product_keyword($keyword){
		$this->select('*');
		$this->from('hadits');
		$this->like('judul',$keyword);
		$this->or_like('kitab',$keyword);
		$this->or_like('penulis',$keyword);
		$this->or_like('riwayat',$keyword);
		return $this->get()->result();
	}
	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data)
	{
		$this->where('kitab_id','penulis_id');
		$this->replace($data);
	}

	// Delete
	public function hapus($id)
	{
		$this->where('kitab_id',$id);
		$this->delete();
	}
}