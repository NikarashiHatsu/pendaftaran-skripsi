<?php

namespace App\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use CodeIgniter\RESTful\ResourceController;

class PendaftaranController extends ResourceController
{
    protected $modelName = Pendaftaran::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/pendaftaran/index', [
            'skripsis' => $this
                ->model
                ->select('pendaftarans.*, d1.nama AS dospem1, d2.nama AS dospem2')
                ->where('nim', session()->user->username)
                ->join('dosens as d1', 'd1.nip = pendaftarans.nip_pembimbing1', 'left')
                ->join('dosens as d2', 'd2.nip = pendaftarans.nip_pembimbing2', 'left')
                ->findAll(),
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('dashboard/pendaftaran/new', [
            'dosens' => (new Dosen())->findAll(),
            'mahasiswa' => (new Mahasiswa())->where('nim', session()->user->username)->first(),
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper('text');

        try {
            $this->model->insert($this->request->getPost([
                'tanggal',
                'nim',
                'judul_skripsi',
                'nip_pembimbing1',
                'nip_pembimbing2',
            ]));

            $file_laporan = $this->request->getFile('file_laporan');
            $file_rekomendasi = $this->request->getFile('file_rekomendasi');

            if ($file_laporan->getName() != "" && !$file_laporan->hasMoved()) {
                $this->model->update($this->model->insertID, [
                    'file_laporan' => $file_laporan->store(),
                ]);
            }

            if ($file_rekomendasi->getName() != "" && !$file_rekomendasi->hasMoved()) {
                $this->model->update($this->model->insertID, [
                    'file_rekomendasi' => $file_rekomendasi->store(),
                ]);
            }

            $this->model->update($this->model->insertID, [
                'nomor_bukti' => random_string('numeric', 16),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mendaftarkan judul.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
