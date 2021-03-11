<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
  protected $table = 'menu';
  protected $useTimestamps = true;

  public function getAllMenu()
  {
    return $this->findAll();
  }
}
