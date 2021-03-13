<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
  protected $table = 'orders';
  protected $useTimestamps = true;
  protected $allowedFields = ['email', 'nama', 'harga', 'deskripsi', 'gambar'];

  public function insertRecord($data)
  {
    $this->save([
      'email' => $data['email'],
      'nama' => $data['menu']['nama'],
      'harga' => $data['menu']['harga'],
      'deskripsi' => $data['menu']['deskripsi'],
      'gambar' => $data['menu']['gambar'],
    ]);
  }

  public function getOrdersByEmail($email, $groupBy)
  {
    if ($groupBy) {
      return $this->where(['email' => $email])->groupBy('nama')->orderBy('id')->findAll();
    }

    return $this->where(['email' => $email])->findAll();
  }
}
