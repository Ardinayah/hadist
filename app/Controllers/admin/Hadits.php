<?php  namespace App\Controllers\admin;

// Load model
use App\Models\Hadits_model;
use App\Models\Kitab_model;
use App\Models\Riwayat_model;
use App\Models\Penulis_model;
// End load model

use CodeIgniter\Controller;

class Hadits extends Controller
{

	// Listing all
	public function index()
	{
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model = new Hadits_model();
		$hadits = $model->listing();
		$data = array(	
			'title'		=> 'Data Hadits',
			'hadits'		=> $hadits,
			'content'	=> 'admin/hadits/index');
		return view('admin/layout/wrapper',$data);
	}

	// Tambah
	public function tambah()
	{
		helper('form');
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$hs 		= new Hadits_model();
		$kb			= new Kitab_model();
		$rb			= new Riwayat_model();
		$pb			= new Penulis_model();
		$hadits 	= $hs->listing();
		$kitab		= $kb->listing();
		$riwayat	= $rb->listing();
		$penulis	= $pb->listing();

		// Start validasi
		if (! $this->validate([
			'hadits_judul' 			=> 'required',
		]))
		{
		// End validasi
			$data = array(	'title'		=> 'Tambah Hadits',
							'riwayat'	=> $riwayat,
							'hadits'	=> $hadits,
							'kitab'		=> $kitab,
							'penulis'	=> $penulis,
							'content'	=> 'admin/hadits/tambah');
			return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'hadits_judul'			=> $this->request->getVar('hadits_judul'),
							'hadits_sabda'			=> $this->request->getVar('hadits_sabda'),
							'hadits_dari'			=> $this->request->getVar('hadits_dari'),
							'hadits_kata'			=> $this->request->getVar('hadits_kata'),
							'hadits_arti_indo'		=> $this->request->getVar('hadits_arti_indo'),
							'hadits_arti_ing'		=> $this->request->getVar('hadits_arti_ing'),
							'hadits_arti_arab'		=> $this->request->getVar('hadits_arti_arab'),
							'hadits_riwayat_id'		=> $this->request->getVar('hadits_riwayat_id'),
							'hadits_kitab_id'		=> $this->request->getVar('hadits_kitab_id'),
							'hadits_penulis_id'		=> $this->request->getVar('hadits_penulis_id'),
							'hadits_kitab_ayat'		=> $this->request->getVar('hadits_kitab_ayat'),
							'hadits_nasab'			=> $this->request->getVar('hadits_nasab'),
							'hadits_desc'			=> $this->request->getVar('hadits_desc'),
						);
			$model = new Hadits_model();
			$model->save($data);
			$session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/hadits'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_hadits)
	{
		helper('form');
		$session	= \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model		= new Hadits_model();
		$km			= new Kitab_model();
		$rm			= new Riwayat_model();
		$lm			= new Penulis_model();
		$kitab		= $km->listing();
		$riwayat	= $rm->listing();
		$penulis	= $lm->listing();
		$hadits 	= $model->detail($id_hadits);

		// Start validasi
		if (!$this->validate([
			'hadits_judul' 				=> 'required',
		]))
		{
		// End validasi

			$data = array(	'title'		=> 'Edit Hadits',
							'kitab'		=> $kitab,
							'hadits'	=> $hadits,
							'riwayat'	=> $riwayat,
							'penulis'	=> $penulis,
							'content'	=> 'admin/hadits/edit');
			return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'hadits_id'				=> $this->request->getVar('hadits_id'),
							'hadits_judul'			=> $this->request->getVar('hadits_judul'),
							'hadits_sabda'			=> $this->request->getVar('hadits_sabda'),
							'hadits_dari'			=> $this->request->getVar('hadits_dari'),
							'hadits_kata'			=> $this->request->getVar('hadits_kata'),
							'hadits_arti_indo'		=> $this->request->getVar('hadits_arti_indo'),
							'hadits_arti_ing'		=> $this->request->getVar('hadits_arti_ing'),
							'hadits_arti_arab'		=> $this->request->getVar('hadits_arti_arab'),
							'hadits_riwayat_id'		=> $this->request->getVar('hadits_riwayat_id'),
							'hadits_kitab_id'		=> $this->request->getVar('hadits_kitab_id'),
							'hadits_penulis_id'		=> $this->request->getVar('hadits_penulis_id'),
							'hadits_kitab_ayat'		=> $this->request->getVar('hadits_kitab_ayat'),
							'hadits_nasab'			=> $this->request->getVar('hadits_nasab'),
							'hadits_desc'			=> $this->request->getVar('hadits_desc'),
						);
			$model->edit($data);
			$session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/hadits'));
		}
		// End masuk database
	}
	// Cari
		public function search(){
			$keyword = $this->input->post('keyword');
			$data['hadits_id']=$this->Cek_model->get_product_keyword($keyword);
			$this->load->view('search',$data);
			return view('home/cari', compact('data'));
		}


	// Delete
	public function delete($id_hadits)
	{
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 	= new Hadits_model();
		$hadits = $model->hapus($id_hadits);
		$session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/hadits'));
	}

}
