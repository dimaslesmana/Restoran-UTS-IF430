<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
  protected $table = 'categories';
  protected $primaryKey = 'category_id';
  protected $useAutoIncrement = false;

  public function getAllCategory()
  {
    return $this->findAll();
  }

  public function getCategoryName($category_id)
  {
    return $this->where(['category_id' => $category_id])->first();
  }
}
