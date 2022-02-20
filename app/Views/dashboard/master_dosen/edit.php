<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/master_dosen') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Edit Dosen
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/master_dosen/update/' . $dosen->id) ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip" class="label">
                        <span class="label-text">NIP</span>
                    </label>
                    <input type="text" name="nip" id="nip" class="input input-bordered w-full" value="<?= $dosen->nip ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nama" class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="input input-bordered w-full" value="<?= $dosen->nama ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="jk" class="label">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <select name="jk" id="jk" class="select select-bordered w-full">
                        <option <?= $dosen->jk == 0 ? "selected" : "" ?> value="0">Perempuan</option>
                        <option <?= $dosen->jk == 1 ? "selected" : "" ?> value="1">Laki-laki</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="email" class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" value="<?= $dosen->email ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="foto" class="label">
                        <span class="label-text">Foto (tidak diubah)</span>
                    </label>
                    <img src="<?= base_url('/writable/uploads/'.$dosen->foto) ?>" alt="<?= $dosen->nama ?>" class="w-32 h-32 border rounded object-cover mb-4" />
                    <input type="file" name="foto" id="foto" class="input input-bordered w-full" />
                </div>
                <div class="col-span-12">
                    <label for="alamat" class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="alamat" id="alamat" rows="3" class="textarea textarea-bordered w-full"><?= $dosen->alamat ?></textarea>
                </div>
                <div class="col-span-12 flex justify-end">
                    <button class="btn btn-primary">
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>