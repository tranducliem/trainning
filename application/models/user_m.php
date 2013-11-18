<?php
/**
* 
*/
class User_m extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}

	public function getAll()
	{
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	public function create($data)
	{
		return $this->db->insert('tbl_user',$data);
	}

	public function delete($id)
	{
		return $this->db->where('id',$id)->delete("tbl_user");
	}

	public function getById($id)
	{
		return $this->db
						->where('id',$id)
						->get('tbl_user')
						->row();
	}

	public function update($id,$arr)
	{
		return $this->db
						->where('id',$id)
						->update('tbl_user',$arr);

	}

	public function check_login($data)
	{
        $this->db-> select('username, password');
        $this->db->from('tbl_user');
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) return true;
        else return false;
	}
}
?>