<?php namespace App\Models;

use CodeIgniter\Model;

class Hadits_model extends Model
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
	
	// Listing
	public function listing($page=0,$maxview=12)
	{
		$start = 0;
	$end = 0;	
	if($page > 0){
		 if ($start>0){
			$end = $start+$maxview;
		} else {
			$start = $maxview * $page; 
		}
	}	
		$this->select('*');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->orderBy('hadits_id','DESC');
		$this->limit($maxview,$start);
		$query = $this->get();
		return $query->getResultArray();
	}

	public function gettotaldata()//$page=0,$start=0,$maxview=12)
	{
		$this->select('COUNT(hadits_kitab_id) AS ttl_datanya');
		 $query = $this->get();
		 return $query->getRowArray();
	}
	// Detail
	public function detail($id)
	{
		$this->select('*');
		// $this->select('hadits.*, kitab.kitab_nama, AS kitabnya, ariwayat.riwayat AS riwayatnya');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->where(array(	'hadits.hadits_id'	=> $id));
		$query = $this->get();
		return $query->getRowArray();
	}
	// Detail
	/*
	public function detailb($id)
	{
		$this->select('hadits.*, kitab.kitab_nama, AS kitabnya ');
		$this->join('kitab','kitab.data_kitab = hadits.hadits_kitab_id');
		// $this->select('*');
		$this->where(array(	'hadits_id'	=> $id));
		$query = $this->get();
		return $query->getResultArray();
	}
	*/
	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	//Cari
	public function get_key($keyword){
		$this->select('*');
		$this->from('hadits');
		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->like('hadits_judul',$keyword);
		$this->orlike('kitab_nama',$keyword);
		$this->orlike('penulis',$keyword);
		$this->orlike('riwayat',$keyword);
		return $this->get()->result();
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
	public function pencarian($cari, $key){
		$this->select('*');
		
		if (strtolower($cari == 'kitab')) {
			$this->like('kitab_nama',$key);
		} elseif (strtolower($cari == 'penulis')) {
			$this->like('penulis',$key);
		} else  {
			$this->like('hadits_judul', $key);
			$this->orlike('hadits_kitab_ayat', $key);
	   }

		$this->join('kitab','kitab.kitab_id = hadits.hadits_kitab_id');
		$this->join('ariwayat','ariwayat.riwayat_id = hadits.hadits_riwayat_id');
		$this->join('apenulis','apenulis.penulis_id = hadits.hadits_penulis_id');
		$this->orderBy('hadits_id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}
}