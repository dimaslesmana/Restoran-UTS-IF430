<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function index()
  {
    $data = [
      'title' => "Dashboard Admin | Home",
      'nav_title' => "K-Food 21",
      'menus' => $this->menusModel->getAllMenu()
    ];

    return view('admin/index', $data);
  }

  public function add()
  {
    $data = [
      'title' => "Dashboard Admin | Add Menu",
      'nav_title' => "K-Food 21"
    ];

    return view('admin/add', $data);
  }

  public function edit($id = null)
  {
    $data = [
      'title' => "Dashboard Admin | Edit Menu",
      'nav_title' => "K-Food 21",
      'id' => $id
    ];

    if (!is_numeric($id)) {
      return redirect()->to('/dashboard');
    }

    return view('admin/edit', $data);
  }

  public function delete()
  {
    $data = [
      'title' => "Dashboard Admin | Delete Menu",
      'nav_title' => "K-Food 21"
    ];

    return view('admin/delete', $data);
  }

  /*
   * Untuk memproses tambah menu
   */
  public function save()
  {
    $data = $this->request->getVar();

    // check if data is valid then insert & notify
    // $this->usersModel->insertNewUser($data);

    // session()->setFlashdata('alert_msg', 'Data berhasil ditambahkan');

    return redirect()->to('/dashboard');
  }
}
