<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Sidang;

class LaporanController extends BaseController
{
    public function index()
    {
        return view('dashboard/laporan/index', [
            'skripsis' => (new Sidang())
                ->select('sidangs.*, d1.nama AS penguji1, d2.nama AS penguji2, m.nama AS nama_mhs, p.nim AS nim')
                ->join('pendaftarans as p', 'p.nomor_bukti = sidangs.nomor_bukti', 'left')
                ->join('mahasiswas as m', 'm.nim = p.nim', 'left')
                ->join('dosens as d1', 'd1.nip = sidangs.nip_penguji1', 'left')
                ->join('dosens as d2', 'd2.nip = sidangs.nip_penguji2', 'left')
                ->findAll(),
        ]);
    }
}
