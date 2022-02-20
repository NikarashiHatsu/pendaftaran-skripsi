<?php

namespace App\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use CodeIgniter\RESTful\ResourceController;

class MasterProdiController extends ResourceController
{
    protected $modelName = Prodi::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/master_prodi/index', [
            'prodis' => $this
                ->model
                ->select('prodis.*, fakultas.nama AS fakultas')
                ->join('fakultas', 'fakultas.kode_fakultas = prodis.kode_fakultas', 'left')
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
        return view('dashboard/master_prodi/new', [
            'fakultas' => (new Fakultas())->findAll(),
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
            $this->model->insert([
                'kode_fakultas' => $this->request->getPost('kode_fakultas'),
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'nama' => $this->request->getPost('nama'),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah Prodi.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('dashboard/master_prodi/edit', [
            'prodi' => $this->model->find($id),
            'fakultas' => (new Fakultas())->findAll(),
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
            $this->model->update($id, [
                'kode_fakultas' => $this->request->getPost('kode_fakultas'),
                'nama' => $this->request->getPost('nama'),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah Prodi.');
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

        return redirect()->back()->with('success', 'Berhasil menghapus Prodi.');
    }
}
