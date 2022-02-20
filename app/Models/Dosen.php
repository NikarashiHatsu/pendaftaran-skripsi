<?php

namespace App\Models;

use CodeIgniter\Model;

class Dosen extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'dosens';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'nip',
        'nama',
        'jk',
        'email',
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
        'nip' => 'required|min_length[8]|is_unique[dosens.nip]',
        'nama' => 'required|min_length[3]|max_length[255]',
        'jk' => 'required|in_list[1,0]',
        'email' => 'required|min_length[3]|max_length[255]',
        'foto' => 'required|min_length[3]|max_length[255]',
        'alamat' => 'required|min_length[3]|max_length[255]',
    ];
    protected $validationMessages   = [
        'nip' => [
            'required' => 'NIP harus diisi',
            'min_length' => 'NIP minimal 8 karakter',
            'max_length' => 'NIP maksimal 8 karakter',
            'is_unique' => 'NIP sudah terdaftar',
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
        'email' => [
            'required' => 'Email harus diisi',
            'min_length' => 'Email minimal 3 karakter',
            'max_length' => 'Email maksimal 255 karakter',
        ],
        'foto' => [
            'required' => 'Foto harus diisi',
            'min_length' => 'Foto minimal 3 karakter',
            'max_length' => 'Foto maksimal 255 karakter',
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat minimal 3 karakter',
            'max_length' => 'Alamat maksimal 255 karakter',
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
