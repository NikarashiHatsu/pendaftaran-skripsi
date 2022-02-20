<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'mahasiswas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id',
        'nim',
        'nama',
        'jk',
        'kode_fakultas',
        'kode_prodi',
        'nip_pembimbing1',
        'nip_pembimbing2',
        'foto',
        'alamat',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nim' => 'required|min_length[8]|is_unique[mahasiswas.nim]',
        'nama' => 'required|min_length[3]|max_length[255]',
        'jk' => 'required|in_list[1,0]',
        'kode_fakultas' => 'required|min_length[3]|max_length[3]',
        'kode_prodi' => 'required|min_length[3]|max_length[3]',
        'nip_pembimbing1' => 'required|min_length[8]',
        'nip_pembimbing2' => 'required|min_length[8]',
        'foto' => 'required|min_length[3]|max_length[255]',
        'alamat' => 'required|min_length[3]|max_length[255]',
    ];
    protected $validationMessages   = [
        'nim' => [
            'required' => 'NIM harus diisi',
            'min_length' => 'NIM minimal 8 karakter',
            'max_length' => 'NIM maksimal 8 karakter',
            'is_unique' => 'NIM sudah terdaftar',
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
            'max_length' => 'Nama maksimal 255 karakter',
        ],
        'jk' => [
            'required' => 'Jenis kelamin harus diisi',
            'in_list' => 'Jenis kelamin harus diisi dengan benar',
        ],
        'kode_fakultas' => [
            'required' => 'Kode fakultas harus diisi',
            'min_length' => 'Kode fakultas minimal 3 karakter',
            'max_length' => 'Kode fakultas maksimal 3 karakter',
        ],
        'kode_prodi' => [
            'required' => 'Kode prodi harus diisi',
            'min_length' => 'Kode prodi minimal 3 karakter',
            'max_length' => 'Kode prodi maksimal 3 karakter',
        ],
        'nip_pembimbing1' => [
            'required' => 'NIP pembimbing 1 harus diisi',
            'min_length' => 'NIP pembimbing 1 minimal 16 karakter',
            'max_length' => 'NIP pembimbing 1 maksimal 16 karakter',
        ],
        'nip_pembimbing2' => [
            'required' => 'NIP pembimbing 2 harus diisi',
            'min_length' => 'NIP pembimbing 2 minimal 16 karakter',
            'max_length' => 'NIP pembimbing 2 maksimal 16 karakter',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
