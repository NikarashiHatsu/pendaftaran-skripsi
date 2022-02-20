<?php

namespace App\Models;

use CodeIgniter\Model;

class Fakultas extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'fakultas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'kode_fakultas',
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
        'kode_fakultas' => 'required|min_length[3]|max_length[3]|is_unique[fakultas.kode_fakultas]',
        'nama' => 'required|min_length[3]|max_length[255]',
    ];
    protected $validationMessages   = [
        'kode_fakultas' => [
            'required' => 'Kode Fakultas harus diisi',
            'min_length' => 'Kode Fakultas minimal 3 karakter',
            'max_length' => 'Kode Fakultas maksimal 3 karakter',
            'is_unique' => 'Kode Fakultas sudah terdaftar',
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
