<?php namespace App\Controllers;

// Load model
use App\Models\Cek_model;
use App\Models\Hadits_model;
use App\Models\Kitab_model;
use App\Models\Penulis_model;
use App\Models\Riwayat_model;
// End load model

class Home extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		helper('text');
		$perPage 	= 12; //offset
		$page = $this->request->getGet('page');
		if($page == null || empty($page)){
			$page = 0;
		}
		$hs			= new Hadits_model();
		$km			= new Kitab_model();
		$rm			= new Riwayat_model();
		$ps			= new Penulis_model();
		$dttotal		= $hs->gettotaldata(); // masuk cek listing
		$total = (int)(($dttotal['ttl_datanya'] !== null) ? $dttotal['ttl_datanya'] : 0);
		$varpage['haltotal']=$total;
		$varpage['halperpage']= $perPage;
		$varpage['halnow']= $page;
		$hadis 		= $hs->listing($page,$perPage);
		$kitab		= $km->listing();
		$penulis	= $ps->listing();
		$riwayat	= $rm->listing();
		$data =[	'title'		=> 'Kumpulan Hadis-Hadis',
					'hadis'		=> $hadis,
					'kitab'		=> $kitab,
					'pager'	=> $pager,
					'varpage' 	=>	$varpage,
					'penulis'	=> $penulis,
					'riwayat'	=> $riwayat,
					'content'	=> 'home/index'];
		return view('layout/wrapper',$data);
	}
	// Read berita
	public function read($id)
	{
		helper('text');
		$model 		= new Cek_model();
		$kl			= new Kitab_model();
		$rl			= new Riwayat_model();
		$pl			= new Penulis_model();
		$kitab		= $kl->listing();
		$penulis	= $pl->listing();
		$riwayat	= $rl->listing();
		$hadits 	= $model->read($id);
		$hadis 	= $model->listing($id);
		$data = array(	'title'		=> $hadits['kitab_nama'],
						'hadits'	=> $hadits,
						'hadis'		=> $hadis,
						'kitab'		=> $kitab,
						'penulis'	=> $penulis,
						'riwayat'	=> $riwayat,
						'content'	=> 'home/read');
		return view('layout/wrapper',$data);
	}
	// Cari
    public function cari()
    {
		$keyword = $this->request->getGet('keyword');
		$cari = $this->request->getGet('search');
		$mh = new Hadits_model();
		$hasilhadits = $mh->pencarian($cari, $keyword);

		$data = array(	'title'		=> 'teile',
						'data'	=> $hasilhadits);
		//return view('home/hasilcari', compact('data'));
		return view('home/hasilcari', $data);
	}	
	//--------------------------------------------------------------------

}
