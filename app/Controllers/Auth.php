<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    return redirect()->to('/');
  }

  public function login()
  {
    $data = [
      'title' => "K-Food 21 | Login",
      'validation' => \Config\Services::validation()
    ];

    if (session()->get('logged_in')) {
      return redirect()->to('/');
    }

    return view('auth/login', $data);
  }

  public function register()
  {
    $data = [
      'title' => "K-Food 21 | Register",
      'validation' => \Config\Services::validation()
    ];

    if (session()->get('logged_in')) {
      return redirect()->to('/');
    }

    return view('auth/register', $data);
  }

  public function logout()
  {
    session()->destroy();

    return redirect()->to('/');
  }

  /*
   * Untuk memproses registrasi user
   */
  public function new()
  {
    /* Validasi */
    if (!$this->validate([
      'firstName' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'First Name is required'
        ]
      ],
      'lastName' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Last Name is required'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[users.email]|valid_email',
        'errors' => [
          'required' => 'Email Address is required',
          'is_unique' => 'Email Address already exists',
          'valid_email' => 'Email Address is not valid'
        ]
      ],
      'password' => [
        'rules' => 'required|min_length[8]',
        'errors' => [
          'required' => 'Password is required',
          'min_length' => 'Password must be at least 8 characters long'
        ]
      ],
      'confirmPassword' => [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Confirm Password is required',
          'matches' => 'Password does not match'
        ]
      ],
      'tanggalLahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Birth Date is required'
        ]
      ],
      'jenisKelamin' => [
        'rules' => 'required|in_list[L,P]',
        'errors' => [
          'required' => 'Gender is required',
          'in_list' => 'Choose Male/Female'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();

      return redirect()->to('/auth/register')->withInput()->with('validation', $validation);
    }

    $data = [
      'firstName' => htmlspecialchars($this->request->getVar('firstName'), ENT_QUOTES, 'UTF-8'),
      'lastName' => htmlspecialchars($this->request->getVar('lastName'), ENT_QUOTES, 'UTF-8'),
      'email' => htmlspecialchars($this->request->getVar('email'), ENT_QUOTES, 'UTF-8'),
      'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      'tanggalLahir' => $this->request->getVar('tanggalLahir'),
      'jenisKelamin' => $this->request->getVar('jenisKelamin')
    ];

    $this->usersModel->insertNewUser($data);

    session()->setFlashdata('alert_success', 'Congratulations! Your account has been created!');

    return redirect()->to('/auth/login');
  }

  /*
   * Untuk memproses login user
   */
  public function doLogin()
  {
    /* Validasi */
    if (!$this->validate([
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'Email Address is required',
          'valid_email' => 'Email Address is not valid'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password is required'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();

      return redirect()->to('/auth/login')->withInput()->with('validation', $validation);
    }

    $data = [
      'email' => htmlspecialchars($this->request->getVar('email'), ENT_QUOTES, 'UTF-8'),
      'password' => $this->request->getVar('password')
    ];

    $user = $this->usersModel->getUserByEmail($data['email']);

    if (is_null($user)) {
      session()->setFlashdata('alert_error', 'Email Address does not exist!');
      return redirect()->to('/auth/login');
    }

    if (!password_verify($data['password'], $user['password'])) {
      session()->setFlashdata('alert_error', 'Password incorrect!');
      return redirect()->to('/auth/login');
    }

    $user_session = [
      'email' => $user['email'],
      'role_id' => $user['role_id'],
      'nama_depan' => $user['first_name'],
      'nama_belakang' => $user['last_name'],
      'nama_lengkap' =>  join(" ", array($user['first_name'], $user['last_name'])),
      'tanggal_lahir' => $user['tanggal_lahir'],
      'jenis_kelamin' => ($user['jenis_kelamin'] === 'L') ? 'Laki-Laki' : 'Perempuan',
      'logged_in' => TRUE
    ];

    session()->set($user_session);

    switch ($user['role_id']) {
      case 'R0001':
        return redirect()->to('/dashboard');
      case 'R0002':
        return redirect()->to('/');
    }
  }
}
