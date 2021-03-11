<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Website : Restoran UTS IF430",
			'menu' => $this->menuModel->getAllMenu()
		];

		return view('home/index', $data);
	}
}
