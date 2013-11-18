<?php
/**
* 
*/
class User extends CI_Controller
{
	private $_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('form_validation');
		$this->lang->load('login', 'english');
	}

	public function index()
	{
		$this->_data['user'] = $this->user_m->getAll();
		$this->load->view('user/show',$this->_data);
	}

	public function create()
	{
		$config = array(
            array(
                'field' => 'name',
                'label' =>'',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => '',
                'rules' => 'required'
            ),
        );
		if($this->input->post("btnCreate")!="")
		{
			$this->form_validation->set_rules($config);
            if($this->form_validation->run() != FALSE)
            {
				$user = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				if($this->user_m->create($user))
				{
					redirect(base_url()."index.php/user");
				}
			}
		}
		$this->load->view('user/create');
	}

	public function delete($id)
	{

		if($this->user_m->delete($id))
		{
			redirect(base_url()."index.php/user");
		}
	}

	public function update($id)
	{
		if($this->input->post("btnUpdate"))
		{
			$user = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
			if($this->user_m->update($id,$user))
			{
				redirect(base_url()."index.php/user");
			}
		}
		$this->_data['user'] = $this->user_m->getById($id);
		$this->load->view('user/update',$this->_data);
	}

	public function login()
	{
		if($this->input->post("btnLogin"))
		{
			$user = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			if($this->user_m->check_login($user))
			{
				$this->session->set_userdata($user);
				redirect(base_url()."index.php/user/login_success");
			}
			else
			{
				echo "Please check login";
			}
		}
		$this->load->view('user/login');
	}

	public function login_success()
	{
		$this->session->set_flashdata('status','Login success!');
		echo $this->lang->line('username').$this->session->userdata['username'];
    	echo "<br/>";
    	echo $this->lang->line('password').$this->session->userdata['password'];
    	echo "<br/>";
    	echo '<a href="'.base_url().'index.php/user/logout">Logout</a>';
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

?>