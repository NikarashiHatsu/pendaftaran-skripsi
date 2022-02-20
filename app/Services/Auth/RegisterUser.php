<?php

namespace App\Services\Auth;

use App\Models\Mahasiswa;
use App\Models\User;

class RegisterUser {
    public function __construct($request)
    {
        $user = new User;
        $user->insert([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => password_hash($request['password'], PASSWORD_DEFAULT),
            'role' => 'mahasiswa',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->skipValidation();
        $mahasiswa->insert([
            'nim' => $request['username'],
            'nama' => $request['name'],
            'jk' => 0,
            'kode_fakultas' => '',
            'kode_prodi' => '',
            'nip_pembimbing1' => '',
            'nip_pembimbing2' => '',
            'foto' => '',
            'alamat' => '',
        ]);
    }
}