<?php

namespace App\Models;

use CodeIgniter\Model;

class Sidang extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'sidangs';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'nomor_bukti',
        'tanggal_sidang',
        'nip_penguji1',
        'nip_penguji2',
        'ruangan',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nomor_bukti' => 'required|min_length[3]|max_length[255]',
        'tanggal_sidang' => 'required',
        'nip_penguji1' => 'required|min_length[8]',
        'nip_penguji2' => 'required|min_length[8]',
        'ruangan' => 'required|min_length[3]|max_length[255]',
    ];
    protected $validationMessages   = [
        'nomor_bukti' => [
            'required' => 'Nomor Bukti harus diisi',
            'min_length' => 'Nomor Bukti minimal 3 karakter',
            'max_length' => 'Nomor Bukti maksimal 255 karakter',
        ],
        'tanggal_sidang' => [
            'required' => 'Tanggal Sidang harus diisi',
        ],
        'nip_penguji1' => [
            'required' => 'NIP Penguji 1 harus diisi',
            'min_length' => 'NIP Penguji 1 minimal 8 karakter',
        ],
        'nip_penguji2' => [
            'required' => 'NIP Penguji 2 harus diisi',
            'min_length' => 'NIP Penguji 2 minimal 8 karakter',
        ],
        'ruangan' => [
            'required' => 'Ruangan harus diisi',
            'min_length' => 'Ruangan minimal 3 karakter',
            'max_length' => 'Ruangan maksimal 255 karakter',
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
