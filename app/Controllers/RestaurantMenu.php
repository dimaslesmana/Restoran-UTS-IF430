<?php

namespace App\Controllers;

class RestaurantMenu extends BaseController
{
  public function index()
  {
    return redirect()->to('/');
  }

  public function addToCart()
  {
    echo 'Add To Cart';
    die;
    return redirect()->to('/');
  }

  public function detail($id)
  {
    $menu = $this->menusModel->getMenuById($id);
    $category = $this->categoriesModel->getCategoryName($menu['category_id']);

    $data = [
      'title' => "K-Food 21 | " . $menu['nama'],
      'nav_title' => "K-Food 21",
      'nama_menu' => $menu['nama'],
      'kategori_menu' => $category['category_name'],
      'deskripsi_menu' => $menu['deskripsi'],
      'harga_menu' => $menu['harga'],
      'gambar_menu' => $menu['gambar']
    ];

    return view('restaurant/detail_menu', $data);
  }
}
