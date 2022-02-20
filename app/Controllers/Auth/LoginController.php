<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Services\Auth\LogInUser;
use Config\Services;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $validator = Services::validation();
        $validator->run($this->request->getPost(), 'login');

        if ($validator->getErrors()) {
            return redirect()->back()->with('errors', $validator->getErrors());
        }

        try {
            new LogInUser($this->request);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Telah terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->to('/dashboard')->with('success', 'Login berhasil.');
    }
}
