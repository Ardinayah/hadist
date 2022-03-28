<?php  namespace App\Controllers\admin;

// Load model
use App\Models\Penulis_model;
// End load model

use CodeIgniter\Controller;

class Penulis extends Controller
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
		$model = new Penulis_model();
		$penulis = $model->listing();
		$data = array(	
			'title'		=> 'Data Penulis',
			'penulis'	=> $penulis,
			'content'	=> 'admin/penulis/index');
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
			'penulis' 		=> 'required',
		]))
		{
		// End validasi
			$data = array(	'title'		=> 'Tambah Penulis',
							'content'	=> 'admin/penulis/tambah');
			return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'penulis'		=> $this->request->getVar('penulis'),
							'penulis_desc'	=> $this->request->getVar('penulis_desc'),
						);
			$model = new Penulis_model();
			$model->save($data);
			$session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/penulis'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_penulis)
	{
		helper('form');
		$session	= \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 		= new Penulis_model();
		$penulis 		= $model->detail($id_penulis);
		// Start validasi
		if (! $this->validate([
			'penulis' 		=> 'required',
			'penulis_id' 		=> 'required',
		]))
		{
		// End validasi
		$data = array(	'title'		=> 'Edit Kola',
						'penulis'	=> $penulis,
						'content'	=> 'admin/penulis/edit');
					return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'penulis_id'	=> $this->request->getVar('penulis_id'),
							'penulis'		=> $this->request->getVar('penulis'),
							'penulis_desc'	=> $this->request->getVar('penulis_desc'),
						);
			$model->edit($data);
			$session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/penulis'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_penulis)
	{
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 	= new Penulis_model();
		$penulis = $model->hapus($id_penulis);
		$session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/penulis'));
	}

}
