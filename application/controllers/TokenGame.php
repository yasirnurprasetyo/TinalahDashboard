<?php

class TokenGame extends CI_Controller{
    public function index()
	{
		$result = apiRequest("tokengame","GET");
		$games = $result["body"]->result;
		// echo var_dump($games);
		$data = array(
			"title" => "Data Game",
			"page" => "game/v_list_game",
			"games" => $games 
		);
		$this->load->view('layout/main',$data);
	}

	public function add()
    {
        $data = array(
            "title" => "Form Tambah Game",
            "page" => "game/v_add_game"
        );
        $this->load->view("layout/main", $data);
    }

	public function prosesSimpan()
	{
		$game = $this->input->post();
		$result = apiRequest("tokengame", "POST", $game);
		echo $result["kode"];
	}
}