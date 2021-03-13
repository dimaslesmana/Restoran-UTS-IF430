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

	public function orders()
	{
		if (session()->get('role_id') === 'R0001') {
			return redirect()->to('/');
		}
		
		$user = $this->usersModel->getUserByEmail(session()->get('email'));
		$orders = $this->ordersModel->getOrdersByEmail($user['email'], false);
		$menus = $this->ordersModel->getOrdersByEmail($user['email'], true);

		$orders_name = array_column(array_unique($orders, SORT_REGULAR), 'nama');
		$orders_qty = array_count_values($orders_name);

		$data = [
			'title' => "K-Food 21 | My Orders",
			'nav_title' => "K-Food 21",
			'orders' => [
				'menus' => $menus,
				'qty' => $orders_qty
			],
			'categories' => $this->categoriesModel->getAllCategory()
		];


		return view('home/orders', $data);
	}
}
