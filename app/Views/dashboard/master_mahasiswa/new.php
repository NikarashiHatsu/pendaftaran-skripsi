<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<div class="flex items-center justify-between mb-6">
    <a href="<?= base_url('/dashboard/master_mahasiswa') ?>" class="btn btn-outline">
        Kembali
    </a>
    <h6 class="text-lg font-medium">
        Tambah Mahasiswa
    </h6>
</div>

<div class="card bg-base-100 border">
    <div class="card-body">
        <form action="<?= base_url('dashboard/master_mahasiswa/create') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-12 grid-flow-row gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nim" class="label">
                        <span class="label-text">NIM</span>
                    </label>
                    <input type="text" name="nim" id="nim" class="input input-bordered w-full" value="<?= old('nim') ?>" />
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
                    <label for="fakultas" class="label">
                        <span class="label-text">Fakultas</span>
                    </label>
                    <select name="fakultas" id="fakultas" class="select select-bordered w-full">
                        <option value="">TODO: Master Fakultas</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="prodi" class="label">
                        <span class="label-text">Prodi</span>
                    </label>
                    <select name="prodi" id="prodi" class="select select-bordered w-full">
                        <option value="">TODO: Master Prodi</option>
                    </select>
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
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_pembimbing1" class="label">
                        <span class="label-text">Pembimbing 1</span>
                    </label>
                    <select name="nip_pembimbing1" id="nip_pembimbing1" class="select select-bordered w-full">
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option value="<?= $dosen->id ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Dosen Terdaftar-</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="nip_pembimbing2" class="label">
                        <span class="label-text">Pembimbing 2</span>
                    </label>
                    <select name="nip_pembimbing2" id="nip_pembimbing2" class="select select-bordered w-full">
                        <?php if (count($dosens) > 0): ?>
                            <?php foreach($dosens as $dosen): ?>
                                <option value="<?= $dosen->nip ?>">
                                    (<?= $dosen->nip ?>) <?= $dosen->nama ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>-Belum ada Dosen Terdaftar-</option>
                        <?php endif; ?>
                    </select>
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