<?php

namespace App\Models;

use CodeIgniter\Model;

class MenusModel extends Model
{
  protected $table = 'menus';
  protected $useTimestamps = true;

  public function getAllMenu()
  {
    return $this->findAll();
  }

  public function getMenuById($id)
  {
    return $this->where(['id' => $id])->first();
  }

  public function deleteMenu($id)
  {
    $this->delete($id);

    return redirect()->to('/admin');
  }
}
