<?php

namespace App\Controllers;

class RestaurantMenu extends BaseController
{
  public function index()
  {
    return redirect()->to('/');
  }

  public function newOrder($id)
  {
    if (session()->get('role_id') === 'R0001') {
      return redirect()->to('/');
    }

    $user = $this->usersModel->getUserByEmail(session()->get('email'));
    $menu = $this->menusModel->getMenuById($id);

    $data = [
      'email' => $user['email'],
      'menu' => $menu
    ];

    $this->ordersModel->insertRecord($data);

    $toast_title = "Success";
    $toast_msg = "Order added!";

    session()->setFlashdata('toastr', $this->toastr . '<script type="text/javascript">toastr.success("' . $toast_msg . '", "' . $toast_title . '")</script>');

    return redirect()->to('/');
  }

  public function detail($id)
  {
    $menu = $this->menusModel->getMenuById($id);
    $data = [
      'title' => "K-Food 21 | " . $menu['nama'],
      'nav_title' => "K-Food 21",
      'menu_id' => $menu['id'],
      'menu_name' => $menu['nama'],
      'menu_category' => $this->categoriesModel->getCategoryName($menu['category_id']),
      'menu_desc' => $menu['deskripsi'],
      'menu_price' => $menu['harga'],
      'menu_img' => $menu['gambar']
    ];

    return view('restaurant/detail_menu', $data);
  }
}
