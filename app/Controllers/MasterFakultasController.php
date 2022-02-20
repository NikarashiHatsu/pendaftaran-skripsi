<?php

namespace App\Controllers;

use App\Models\Fakultas;
use CodeIgniter\RESTful\ResourceController;

class MasterFakultasController extends ResourceController
{
    protected $modelName = Fakultas::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/master_fakultas/index', [
            'fakultas' => $this->model->findAll(),
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('dashboard/master_fakultas/new');
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
                'nama' => $this->request->getPost('nama'),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah Fakultas.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('dashboard/master_fakultas/edit', [
            'fakultas' => $this->model->find($id),
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
                'nama' => $this->request->getPost('nama'),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah Fakultas.');
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

        return redirect()->back()->with('success', 'Berhasil menghapus Fakultas.');
    }
}
