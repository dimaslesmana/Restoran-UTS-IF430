<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';
  protected $useTimestamps = true;
  protected $allowedFields = ['role_id', 'first_name', 'last_name', 'email', 'password', 'tanggal_lahir', 'jenis_kelamin'];
  private static $role_id = [
    'admin' => 'R0001',
    'user' => 'R0002'
  ];

  public function insertNewUser($data)
  {
    $this->save([
      'role_id' => self::$role_id['user'],
      'first_name' => $data['firstName'],
      'last_name' => $data['lastName'],
      'email' => $data['email'],
      'password' => $data['password'],
      'tanggal_lahir' => $data['tanggalLahir'],
      'jenis_kelamin' => $data['jenisKelamin'],
    ]);
  }

  public function getUserByEmail($email)
  {
    return $this->where(['email' => $email])->first();
  }
}
