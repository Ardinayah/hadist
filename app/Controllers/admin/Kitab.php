<?php  namespace App\Controllers\admin;

// Load model
use App\Models\Kitab_model;
use App\Models\Penulis_model;
// End load model

use CodeIgniter\Controller;

class Kitab extends Controller
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
		$model = new Kitab_model();
		$kitab = $model->listing();
		$data = array(	
			'title'		=> 'Data Kitab',
			'kitab'	=> $kitab,
			'content'	=> 'admin/kitab/index');
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
		$km			= new Kitab_model();
		$bm 		= new Penulis_model();
		$penulis	= $bm->listing();
		$kitab		= $km->listing();
		// Start validasi
		if (! $this->validate([
			'kitab_nama' 			=> 'required',
		]))
		{
		// End validasi
			$data = array(	'title'			=> 'Tambah Kitab',
							'penulis'		=> $penulis,
							'kitab_nama'	=> $kitab,
							'content'		=> 'admin/kitab/tambah');
			return view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'kitab_nama'		=> $this->request->getVar('kitab_nama'),
							'kitab_desc'		=> $this->request->getVar('kitab_desc'),
							'kitab_penulis_id'	=> $this->request->getVar('kitab_penulis_id'),
						);
			$model = new Kitab_model();
			$model->save($data);
			$session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/kitab'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_kitab)
	{
		helper('form');
		$session	= \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model		= new Kitab_model();
		$mb 		= new Penulis_model();
		$penulis	= $mb->listing();
		$kitab 	    = $model->detail($id_kitab);
		// Start validasi
		if (! $this->validate([
            'kitab_nama'        => 'required',
		]))
		{
		// End validasi
		$data = array(	'title'		=> 'Edit Kola',
                        'kitab'	    => $kitab,
                        'penulis'   => $penulis,
						'content'	=> 'admin/kitab/edit');
					return view('admin/layout/wrapper',$data);
		// Masuk database
        }else{
            $data = array(  'kitab_id'			=> $this->request->getVar('kitab_id'),
                        	'kitab_nama'		=> $this->request->getVar('kitab_nama'),
							'kitab_desc'		=> $this->request->getVar('kitab_desc'),
                            'kitab_penulis_id'	=> $this->request->getVar('kitab_penulis_id'),
                        );
			$model->edit($data);
			$session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/kitab'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_kitab)
	{
		$session = \Config\Services::session();
		// Proteksi
		if($session->get('username') =="") {
			$session->setFlashdata('sukses', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		// End proteksi
		$model 	= new Kitab_model();
		$kitab = $model->hapus($id_kitab);
		$session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/kitab'));
	}

}
