<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/master_fakultas') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Edit Fakultas
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/master_fakultas/update/' . $fakultas->id) ?>" method="post">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="kode_fakultas" class="label">
                        <span class="label-text">Kode Fakultas</span>
                    </label>
                    <input type="text" name="kode_fakultas" id="kode_fakultas" class="input input-bordered w-full" value="<?= $fakultas->kode_fakultas ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nama" class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="input input-bordered w-full" value="<?= $fakultas->nama ?>" />
                </div>
                <div class="col-span-12 flex justify-end">
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>