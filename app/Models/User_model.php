<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
	protected $table 		= 'admin';
	protected $primaryKey 	= 'id';
	 protected $allowedFields = ['username','password'];
	
	// Listing
	public function listing()
	{
		$this->select('*');
		$query = $this->get();
		return $query->getResultArray();
	}

	// Detail
	public function detail($id_user)
	{
		$this->select('*');
		$this->where(array(	'id'	=> $id_user));
		$query = $this->get();
		return $query->getRowArray();
	}

	// Detail
	public function login($username,$password)
	{
		$this->select('*');
		$this->where(['username'	=> $username,
					//'password'	=> sha1($password)]);
					'password'	=> $password]);
		$query = $this->get();
		return $query->getRowArray();
	}

	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data)
	{
		$this->where('id',$data['id']);
		$this->replace($data);
	}

	// Delete
	public function hapus($id_user)
	{
		$this->where('id',$id_user);
		$this->delete();
	}
}