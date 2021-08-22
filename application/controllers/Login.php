<?php

class Login extends CI_Controller{
    public function index()
	{
		$data["page"] = "login/v_login";
		$this->load->view('layout/login',$data);
	}

	public function prosesLogin()
	{
		$email = $this->input->post("email", true);
		$password = $this->input->post("password", true);
		$base64auth = base64_encode($email . ":" . $password);
		$result = apiLogin("login",$base64auth);
        $kode = $result["kode"];
		// $this->load->helper('array');
        if ($kode == 200) {
            $dataUser = $result["body"];
			$dataSession = array(
                "token" => $dataUser->token,
            );
            $this->session->set_userdata($dataSession);
            echo "1";
        } else {
            echo "Username dan Password Tidak ditemukan!";
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$data["page"] = "login/v_login";
		$this->load->view('layout/login',$data);
	}
} 