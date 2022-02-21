<?php

namespace App\Controllers;

use App\Models\Dosen;
use App\Models\Pendaftaran;
use App\Models\Sidang;
use CodeIgniter\RESTful\ResourceController;

class SidangController extends ResourceController
{
    protected $modelName = Sidang::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/sidang/index', [
            'sidangs' => $this
                ->model
                ->select('sidangs.*, d1.nama AS penguji1, d2.nama AS penguji2')
                ->join('dosens as d1', 'd1.nip = sidangs.nip_penguji1', 'left')
                ->join('dosens as d2', 'd2.nip = sidangs.nip_penguji2', 'left')
                ->findAll(),
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $sidang_yang_sudah_terpilih = array_map(function($sidang) {
            return $sidang->nomor_bukti;
        }, (new Sidang)->findAll());

        if (count($sidang_yang_sudah_terpilih) == 0) {
            return view('dashboard/sidang/new', [
                'skripsis' => (new Pendaftaran())
                    ->where('is_diterima', Pendaftaran::APPROVED)
                    ->findAll(),
                'dosens' => (new Dosen())->findAll(),
            ]);
        }

        return view('dashboard/sidang/new', [
            'skripsis' => (new Pendaftaran())
                ->where('is_diterima', Pendaftaran::APPROVED)
                ->whereNotIn('nomor_bukti', $sidang_yang_sudah_terpilih)
                ->findAll(),
            'dosens' => (new Dosen())->findAll(),
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try {
            $this->model->insert($this->request->getPost([
                'nomor_bukti',
                'tanggal_sidang',
                'nip_penguji1',
                'nip_penguji2',
                'ruangan',
            ]));

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah Jadwal Sidang.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $sidang_yang_sudah_terpilih = array_map(function($sidang) {
            return $sidang->nomor_bukti;
        }, (new Sidang)->findAll());

        return view('dashboard/sidang/edit', [
            'sidang' => $this->model->find($id),
            'skripsis' => (new Pendaftaran())
                ->where('is_diterima', Pendaftaran::APPROVED)
                ->whereIn('nomor_bukti', $sidang_yang_sudah_terpilih)
                ->findAll(),
            'dosens' => (new Dosen())->findAll(),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        try {
            $this->model->update($id, $this->request->getPost([
                'nomor_bukti',
                'tanggal_sidang',
                'nip_penguji1',
                'nip_penguji2',
                'ruangan',
            ]));

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah Jadwal Sidang.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        try {
            $this->model->where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus Jadwal Sidang.');
    }
}
