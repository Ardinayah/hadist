<?php namespace App\Models;

use CodeIgniter\Model;

class Penulis_model extends Model
{
	protected $table 		= 'apenulis';
	protected $primaryKey 	= 'penulis_id';
	 protected $allowedFields = ['penulis','penulis_desc'];
	
	// Listing
	public function listing()
	{
		$this->select('*');
		// $this->join('`ajenis`','ajenis.id = apenulis.jenisid');
		$this->orderBy('penulis_id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}

	// Detail
	public function detail($id)
	{
		$this->select('*');
		// $this->join('ajenis','ajenis.id = apenulis.jenisid');
		$this->where(array(	'penulis_id'	=> $id));
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
		$this->where('penulis_id');
		$this->replace($data);
	}

	// Delete
	public function hapus($id)
	{
		$this->where('penulis_id',$id);
		$this->delete();
	}
}