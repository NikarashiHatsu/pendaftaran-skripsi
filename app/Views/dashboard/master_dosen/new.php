<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/master_dosen') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Tambah Dosen
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/master_dosen/create') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip" class="label">
                        <span class="label-text">NIP</span>
                    </label>
                    <input type="text" name="nip" id="nip" class="input input-bordered w-full" value="<?= old('nip') ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nama" class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="input input-bordered w-full" value="<?= old('nama') ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="jk" class="label">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <select name="jk" id="jk" class="select select-bordered w-full">
                        <option value="0">Perempuan</option>
                        <option value="1">Laki-laki</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="email" class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" value="<?= old('email') ?>" />
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="foto" class="label">
                        <span class="label-text">Foto</span>
                    </label>
                    <input type="file" name="foto" id="foto" class="input input-bordered w-full" />
                </div>
                <div class="col-span-12">
                    <label for="alamat" class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="alamat" id="alamat" rows="3" class="textarea textarea-bordered w-full"><?= old('alamat') ?></textarea>
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