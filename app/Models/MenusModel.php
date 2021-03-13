<?php

namespace App\Models;

use CodeIgniter\Model;

class MenusModel extends Model
{
  protected $table = 'menus';
  protected $useTimestamps = true;
  protected $allowedFields = ['category_id', 'nama', 'harga', 'deskripsi', 'gambar'];

  public function getAllMenu()
  {
    return $this->findAll();
  }

  public function getMenusById($id_arr)
  {
    return $this->whereIn('id', $id_arr)->findAll();
  }

  public function getMenuById($id)
  {
    return $this->where(['id' => $id])->first();
  }

  public function insertRecord($data)
  {
    $this->save([
      'category_id' => $data['menu_category_id'],
      'nama' => $data['menu_name'],
      'harga' => $data['menu_price'],
      'deskripsi' => $data['menu_desc'],
      'gambar' => $data['menu_img']
    ]);
  }

  public function updateRecord($data)
  {
    $this->save([
      'id' => $data['menu_id'],
      'category_id' => $data['menu_category_id'],
      'nama' => $data['menu_name'],
      'harga' => $data['menu_price'],
      'deskripsi' => $data['menu_desc'],
      'gambar' => $data['menu_img']
    ]);
  }
}
