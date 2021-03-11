<?php

namespace App\Controllers;

class Signup extends BaseController
{
  public function index()
  {
    $data = [
      'title' => "Signup"
    ];

    return view('signup/index', $data);
  }
}
