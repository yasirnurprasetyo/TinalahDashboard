<?php

class Gambar extends CI_Controller{
    public function index()
	{
		$result = apiRequest("gambar","GET");
		$gambars = $result["body"]->result;
		// echo var_dump($gambars);
		$data = array(
			"title" => "Data Gambar",
			"page" => "gambar/v_list_gambar",
			"gambars" => $gambars 
		);
		$this->load->view('layout/main',$data);
	}

	public function add()
    {
        $data = array(
            "title" => "Form Tambah Gambar",
            "page" => "gambar/v_add_gambar"
        );
        $this->load->view("layout/main", $data);
    }

	public function prosesSimpan()
	{
		$gambar = $this->input->post();
		$result = apiRequest("gambar", "POST", $gambar);
		echo $result["kode"];
	}

	// Proses Ubah Data
    public function update($id)
    {
        $result = apiRequest("gambar/$id", "GET");
        $body = $result["body"];
        $gambars = $body;
        $data = array(
			"title" => "Ubah Data Gambar",
            "gambars" => $gambars,
            "page" => "gambar/v_update_gambar"
        );
        $this->load->view("layout/main", $data);
		// echo var_dump($result);
		// echo "===================================";
		// echo var_dump($body);
    }

	public function prosesUbah()
	{
		$gambar = $this->input->post("data");
        $result = apiRequest("gambar" , "PUT", $gambar);
        echo $result["kode"];
	}
}