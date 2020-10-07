<?php namespace App\Controllers;

class Home extends Auth
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------
	public function insertUser(){
			$data = [
				"name" => $this->request->getPost('name'),
				"email" => $this->request->getPost('email'),
				"cpf" => $this->request->getPost('cpf'),
			];
			//$this->model->inserGlobal($data);
			return $this->respond(['data'=>'Inserido com sucesso', 200]);
	}
}
