<?php

class User extends CI_Controller{
    public function index()
	{
		$result = apiRequest("user","GET");
		$users = $result["body"]->result;
		// echo var_dump($result);
		$data = array(
			"title" => "Data User",
			"page" => "user/v_list_user",
			"users" => $users 
		);
		$this->load->view('layout/main',$data);
		// $this->load->view('user/v_list_user');
	}

	public function add()
    {
        $data = array(
            "title" => "Form Tambah User",
            "page" => "user/v_add_user"
        );
        $this->load->view("layout/main", $data);
    }

	public function prosesSimpan()
	{
		$user = $this->input->post();
		$result = apiRequest("user", "POST", $user);
		echo $result["kode"];
	}
}