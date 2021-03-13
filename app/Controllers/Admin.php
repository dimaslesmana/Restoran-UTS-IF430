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
      'nav_title' => "K-Food 21",
      'categories' => $this->categoriesModel->getAllCategory(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/add', $data);
  }

  public function edit($id = null)
  {
    $menu = $this->menusModel->getMenuById($id);

    if (is_null($menu)) {
      return redirect()->to('/dashboard');
    }

    $data = [
      'title' => "Dashboard Admin | Edit Menu",
      'nav_title' => "K-Food 21",
      'menu_id' => $menu['id'],
      'menu_name' => $menu['nama'],
      'menu_category_id' => $menu['category_id'],
      'menu_desc' => $menu['deskripsi'],
      'menu_price' => $menu['harga'],
      'menu_img' => $menu['gambar'],
      'categories' => $this->categoriesModel->getAllCategory(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/edit', $data);
  }

  /*
   * Untuk delete menu
   */
  public function delete($id)
  {
    $menu = $this->menusModel->getMenuById($id);

    // delete menu image from directory
    if ($menu['gambar'] !== 'placeholder.png') {
      unlink('assets/img/menu-restoran/' . $menu['gambar']);
    }

    // delete menu from db
    $this->menusModel->delete($id);

    $toast_title = "Success";
    $toast_msg = "Menu deleted!";

    session()->setFlashdata('toastr', $this->toastr . '<script type="text/javascript">toastr.success("' . $toast_msg . '", "' . $toast_title . '")</script>');

    return redirect()->to('/dashboard');
  }

  /*
   * Untuk memproses tambah menu
   */
  public function save()
  {
    /* Validasi */
    if (!$this->validate([
      'menu_category' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Category is required'
        ]
      ],
      'menu_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Name is required'
        ]
      ],
      'menu_price' => [
        'rules' => 'required|greater_than[0]',
        'errors' => [
          'required' => 'Price is required',
          'greater_than' => 'Price must be greater than 0'
        ]
      ],
      'menu_desc' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Description is required'
        ]
      ],
      'menu_img' => [
        'rules' => 'max_size[menu_img,3072]|is_image[menu_img]|mime_in[menu_img,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => 'Image size is too large. Max 3 MB',
          'is_image' => 'Please choose an image',
          'mime_in' => 'Please choose an image'
        ]
      ]
    ])) {

      return redirect()->to('/dashboard/menu/new')->withInput();
    }

    /* Handle Image */
    $image = $this->request->getFile('menu_img');

    if ($image->getError() == 4) {
      $imageName = 'placeholder.png';
    } else {
      $imageName = $image->getRandomName();
      $image->move('assets/img/menu-restoran', $imageName);
    }

    $data = [
      'menu_category_id' => $this->request->getVar('menu_category'),
      'menu_name' => htmlspecialchars($this->request->getVar('menu_name'), ENT_QUOTES, 'UTF-8'),
      'menu_price' => $this->request->getVar('menu_price'),
      'menu_desc' => htmlspecialchars($this->request->getVar('menu_desc'), ENT_QUOTES, 'UTF-8'),
      'menu_img' => $imageName
    ];

    $this->menusModel->insertRecord($data);

    $toast_title = "Success";
    $toast_msg = "Menu added!";

    session()->setFlashdata('toastr', $this->toastr . '<script type="text/javascript">toastr.success("' . $toast_msg . '", "' . $toast_title . '")</script>');

    return redirect()->to('/dashboard');
  }

  /*
   * Untuk memproses update menu
   */
  public function update($id)
  {
    /* Validasi */
    if (!$this->validate([
      'menu_category' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Category is required'
        ]
      ],
      'menu_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Name is required'
        ]
      ],
      'menu_price' => [
        'rules' => 'required|greater_than[0]',
        'errors' => [
          'required' => 'Price is required',
          'greater_than' => 'Price must be greater than 0'
        ]
      ],
      'menu_desc' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Description is required'
        ]
      ],
      'menu_img' => [
        'rules' => 'max_size[menu_img,3072]|is_image[menu_img]|mime_in[menu_img,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => 'Image size is too large. Max 3 MB',
          'is_image' => 'Please choose an image',
          'mime_in' => 'Please choose an image'
        ]
      ]
    ])) {

      return redirect()->to('/dashboard/menu/edit/' . $id)->withInput();
    }

    /* Handle Image */
    $image = $this->request->getFile('menu_img');
    $oldImage = $this->request->getVar('old_menu_img');

    if ($image->getError() == 4) {
      $imageName = $oldImage;
    } else {
      $imageName = $image->getRandomName();
      $image->move('assets/img/menu-restoran', $imageName);
      unlink('assets/img/menu-restoran/' . $oldImage);
    }

    $data = [
      'menu_id' => $id,
      'menu_category_id' => $this->request->getVar('menu_category'),
      'menu_name' => htmlspecialchars($this->request->getVar('menu_name'), ENT_QUOTES, 'UTF-8'),
      'menu_price' => $this->request->getVar('menu_price'),
      'menu_desc' => htmlspecialchars($this->request->getVar('menu_desc'), ENT_QUOTES, 'UTF-8'),
      'menu_img' => $imageName
    ];

    $this->menusModel->updateRecord($data);

    $toast_title = "Success";
    $toast_msg = "Menu updated!";

    session()->setFlashdata('toastr', $this->toastr . '<script type="text/javascript">toastr.success("' . $toast_msg . '", "' . $toast_title . '")</script>');

    return redirect()->to('/dashboard');
  }
}
