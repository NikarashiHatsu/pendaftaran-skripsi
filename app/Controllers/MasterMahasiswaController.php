<?php

namespace App\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use CodeIgniter\RESTful\ResourceController;

class MasterMahasiswaController extends ResourceController
{
    protected $modelName = Mahasiswa::class;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard/master_mahasiswa/index', [
            'mahasiswas' => $this
                ->model
                ->select('mahasiswas.*, d1.nama AS dospem1, d2.nama AS dospem2')
                ->join('dosens as d1', 'd1.nip = mahasiswas.nip_pembimbing1', 'left')
                ->join('dosens as d2', 'd2.nip = mahasiswas.nip_pembimbing2', 'left')
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
        return view('dashboard/master_mahasiswa/new', [
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
        dd($this->request->getPost());
        
        try {
            $file = $this->request->getFile('foto');

            $this->model->insert([
                'nip' => $this->request->getPost('nip'),
                'nama' => $this->request->getPost('nama'),
                'jk' => $this->request->getPost('jk'),
                'foto' => $file->store(),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            ]);

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambah Mahasiswa.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('dashboard/master_mahasiswa/edit', [
            'mahasiswa' => $this->model->find($id),
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
            $file = $this->request->getFile('foto');

            $this->model->update($id, [
                'nama' => $this->request->getPost('nama'),
                'jk' => $this->request->getPost('jk'),
                'fakultas' => $this->request->getPost('fakultas'),
                'prodi' => $this->request->getPost('prodi'),
                'alamat' => $this->request->getPost('alamat'),
                'nip_pembimbing1' => $this->request->getPost('nip_pembimbing1'),
                'nip_pembimbing2' => $this->request->getPost('nip_pembimbing2'),
            ]);

            if ($file->getName() != "" && !$file->hasMoved()) {
                $this->model->update($id, [
                    'foto' => $file->store(),
                ]);
            }

            if (count($this->model->errors()) > 0) {
                return redirect()->back()->with('errors', $this->model->errors());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah Mahasiswa.');
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

        return redirect()->back()->with('success', 'Berhasil menghapus Mahasiswa.');
    }
}
