<?php  namespace App\Controllers\admin;

// Load model
use App\Models\Riwayat_model;
// End load model

use CodeIgniter\Controller;

class Riwayat extends Controller
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
		$model = new Riwayat_model();
		$riwayat = $model->listing();
		$data = array(	
			'title'		=> 'Data Riwayat',
			'riwayat'	=> $riwayat,
			'content'	=> 'admin/riwayat/index');
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
		// Start validasi
		if (! $this->validate([
			'riwayat' 		=> 'required',
		]))
		{
		// End validasi
			$data = array(	'title'		=> 'Tambah Riwayat',
							'content'	=> 'admin/riwayat/tambah');
			return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'riwayat'		=> $this->request->getVar('riwayat'),
							'riwayat_desc'	=> $this->request->getVar('riwayat_desc'),
						);
			$model = new Riwayat_model();
			$model->save($data);
			$session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/riwayat'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_riwayat)
	{
		helper('form');
		$session	= \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 		= new Riwayat_model();
		$riwayat 		= $model->detail($id_riwayat);
		// Start validasi
		if (! $this->validate([
			'riwayat' 		=> 'required',
		]))
		{
		// End validasi
		$data = array(	'title'		=> 'Edit Kola',
						'riwayat'	=> $riwayat,
						'content'	=> 'admin/riwayat/edit');
					return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'riwayat_id'	=> $this->request->getVar('riwayat_id'),
							'riwayat'		=> $this->request->getVar('riwayat'),
							'riwayat_desc'	=> $this->request->getVar('riwayat_desc'),
						);
			$model->edit($data);
			$session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/riwayat'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_riwayat)
	{
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 	= new Riwayat_model();
		$riwayat = $model->hapus($id_riwayat);
		$session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/riwayat'));
	}

}
