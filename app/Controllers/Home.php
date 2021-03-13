<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "K-Food 21 | Home",
			'nav_title' => "K-Food 21",
			'menus' => $this->menusModel->getAllMenu(),
			'categories' => $this->categoriesModel->getAllCategory()
		];

		return view('home/index', $data);
	}
}
