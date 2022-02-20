<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran extends Model
{
    public const APPROVED = 1;
    public const DISAPPROVED = 2;

    protected $DBGroup              = 'default';
    protected $table                = 'pendaftarans';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'nomor_bukti',
        'tanggal',
        'judul_skripsi',
        'nim',
        'nip_pembimbing1',
        'nip_pembimbing2',
        'file_laporan',
        'file_rekomendasi',
        'is_diterima',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nomor_bukti' => 'permit_empty|min_length[3]|max_length[255]',
        'tanggal' => 'required|min_length[3]|max_length[255]',
        'judul_skripsi' => 'required|min_length[3]|max_length[255]',
        'nim' => 'required|min_length[8]',
        'nip_pembimbing1' => 'required|min_length[8]',
        'nip_pembimbing2' => 'required|min_length[8]',
        'file_laporan' => 'permit_empty|min_length[3]|max_length[255]',
        'file_rekomendasi' => 'permit_empty|min_length[3]|max_length[255]',
        'is_diterima' => 'permit_empty',
    ];
    protected $validationMessages   = [
        'nomor_bukti' => [
            'required' => 'Nomor Bukti harus diisi',
            'min_length' => 'Nomor Bukti minimal 3 karakter',
            'max_length' => 'Nomor Bukti maksimal 255 karakter',
        ],
        'tanggal' => [
            'required' => 'Tanggal harus diisi',
            'min_length' => 'Tanggal minimal 3 karakter',
            'max_length' => 'Tanggal maksimal 255 karakter',
        ],
        'judul_skripsi' => [
            'required' => 'Judul Skripsi harus diisi',
            'min_length' => 'Judul Skripsi minimal 3 karakter',
            'max_length' => 'Judul Skripsi maksimal 255 karakter',
        ],
        'nim' => [
            'required' => 'NIM harus diisi',
            'min_length' => 'NIM minimal 8 karakter',
            'max_length' => 'NIM maksimal 8 karakter',
        ],
        'nip_pembimbing1' => [
            'required' => 'NIP Pembimbing 1 harus diisi',
            'min_length' => 'NIP Pembimbing 1 minimal 8 karakter',
        ],
        'nip_pembimbing2' => [
            'required' => 'NIP Pembimbing 2 harus diisi',
            'min_length' => 'NIP Pembimbing 2 minimal 8 karakter',
        ],
        'file_laporan' => [
            'min_length' => 'File Laporan minimal 3 karakter',
            'max_length' => 'File Laporan maksimal 255 karakter',
        ],
        'file_rekomendasi' => [
            'min_length' => 'File Laporan minimal 3 karakter',
            'max_length' => 'File Laporan maksimal 255 karakter',
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
