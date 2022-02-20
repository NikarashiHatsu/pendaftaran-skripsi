<?php

namespace App\Models;

use CodeIgniter\Model;

class Prodi extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'prodis';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'kode_fakultas',
        'kode_prodi',
        'nama',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_fakultas' => 'required|min_length[3]|max_length[3]',
        'kode_prodi' => 'required|min_length[3]|max_length[3]|is_unique[prodi.kode_prodi]',
        'nama' => 'required|min_length[3]|max_length[255]',
    ];
    protected $validationMessages   = [
        'kode_fakultas' => [
            'required' => 'Kode Fakultas harus diisi',
            'min_length' => 'Kode Fakultas minimal 3 karakter',
            'max_length' => 'Kode Fakultas maksimal 3 karakter',
        ],
        'kode_prodi' => [
            'required' => 'Kode Prodi harus diisi',
            'min_length' => 'Kode Prodi minimal 3 karakter',
            'max_length' => 'Kode Prodi maksimal 3 karakter',
            'is_unique' => 'Kode Prodi sudah terdaftar',
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter',
            'max_length' => 'Nama maksimal 255 karakter',
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
